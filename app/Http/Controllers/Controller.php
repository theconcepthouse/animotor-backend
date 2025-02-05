<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserCollection;
use App\Models\DriverForm;
use App\Models\User;

use App\Notifications\OrderStatusUpdate;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use SendinBlue\Client\Api\ContactsApi;
use SendinBlue\Client\Api\TransactionalEmailsApi;
use SendinBlue\Client\ApiException;
use SendinBlue\Client\Configuration;
use SendinBlue\Client\Model\CreateContact;
use SendinBlue\Client\Model\SendSmtpEmail;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function successResponse($message, $data = [], $code = 200): JsonResponse
    {
        $response = [
            'status' => 'success',
            'message' => $message,
        ];

        if (!empty($data)) {
            $response['data'] = $data;
        }

        return response()->json($response, $code);
    }

    public function errorResponse($error, $code = 404): JsonResponse
    {
        return response()->json([
            'status' => 'failed',
            'error' => $error,
            'message' => $error,
        ], $code);
    }

    public function notify($user, $data)
    {
        $user->notify(new OrderStatusUpdate($data));

//        if($user->push_token){
//            $user->notify(new ExpoNotify($data,$user));
//        }

        if ($user->push_token) {
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
            ])->post('https://exp.host/--/api/v2/push/send', [
                'to' => $user->push_token,
                'title' => $data['title'],
                'body' => $data['message'],
            ]);
            $response->body();
        }

    }


    public function userRes($message = "")
    {
        $user = User::withCount(['washes'])->where('id', auth()->id())->first();

        $data['user'] = new UserCollection($user);

        return $this->successResponse($message ?: 'user', $data);
    }


    public function getDistanceOld($origin_lat, $origin_lng, $des_lat, $des_lng)
    {

        $response = Http::get('https://maps.googleapis.com/maps/api/distancematrix/json?origins=' . $origin_lat . ',' . $origin_lng . '&destinations=' . $des_lat . ',' . $des_lng . '&key=' . env('MAP_API_KEY') . '&mode=driving');

        return $response['rows'][0]['elements'][0];

    }

    public function getDistance($origin_lat, $origin_lng, $des_lat, $des_lng)
    {
        $cacheKey = 'distance-' . $origin_lat . '-' . $origin_lng . '-' . $des_lat . '-' . $des_lng;

        // Try to retrieve the result from cache first
        $result = Cache::get($cacheKey);

        if ($result) {
            return $result;
        }

        // If the result is not in cache, make the API call
        $response = Http::get('https://maps.googleapis.com/maps/api/distancematrix/json?origins=' . $origin_lat . ',' . $origin_lng . '&destinations=' . $des_lat . ',' . $des_lng . '&key=' . env('MAP_API_KEY') . '&mode=driving');

        $result = $response['rows'][0]['elements'][0];

        // Store the result in cache for 24 hours
        Cache::put($cacheKey, $result, 1440);
        $result['new'] = 'yes';
        return $result;
    }

    public function getLocalDistance($order_lat, $order_lng, $user_lat, $user_lng): float|int
    {
        $earth_radius = 6371;

        $dLat = deg2rad($order_lat - $user_lat);
        $dLon = deg2rad($order_lng - $user_lng);

        $a = sin($dLat / 2) * sin($dLat / 2) +
            cos(deg2rad($user_lat)) * cos(deg2rad($order_lat)) *
            sin($dLon / 2) * sin($dLon / 2);

        $c = 2 * asin(sqrt($a));

        return $earth_radius * $c;
    }


    public function getUsersByDistance($lat, $lng, $booker_id, $city)
    {
        // Get all users from the users table
        $users = User::select('id', 'push_token', 'full_name', 'lat', 'lng', 'address', 'email', 'is_online')
            ->where('id', '!=', $booker_id)
            ->where('city', $city)
            ->where('is_online', 1)
            ->whereNotNull('lat')
            ->whereNotNull('lng')
            ->whereNotNull('push_token')
            ->get();


        // Calculate the distance between each user's coordinates and the supplied coordinates
        foreach ($users as $user) {
            $user->distance = $this->getLocalDistance($user->lat, $user->lng, $lat, $lng);
//            $user->distanceL = $this->getDistance($user->lat, $user->lng, $lat, $lng);
        }

        // Sort the users by distance
        $users = $users->sortBy('distance')->take(5);


        $closetUsers = $users->filter(function ($user) {
            return $user->distance < 5;
        });

        if ($closetUsers->count() < 1) {
            return $users;
        }

        return $closetUsers;

    }

    public function sendAgentWelcome()
    {

    }


    protected function addUserToSendinblue($user, $type)
    {
        // Initialize the Sendinblue API configuration
        $config = Configuration::getDefaultConfiguration()->setApiKey('api-key', env("SENDINBLUE_API_KEY"));

        // Initialize the ContactsApi client
        $contactsApi = new ContactsApi(null, $config);

        $transactionalEmailsApi = new TransactionalEmailsApi(null, $config);


        // Create a new contact
        $contact = new CreateContact();
        $contact['email'] = $user->email;
        $contact['listIds'] = $type == "customer" ? [9] : [8];
        $contact['attributes'] = [
            'FIRSTNAME' => $user->name
        ];

        try {
            // Try to create the contact
            $contactsApi->createContact($contact);

            $user->in_crm = true;

            $user->save();


            //        // Send the welcome email

            $sendSmtpEmail = new SendSmtpEmail();
            $sendSmtpEmail['to'] = [['email' => $user->email]];
            $sendSmtpEmail['templateId'] = $type == "customer" ? 4 : 3;
            $sendSmtpEmail['params'] = [
                'FIRSTNAME' => $user->name
            ];
            $sendSmtpEmail['smtpTemplateSensitivity'] = 'normal';
            $transactionalEmailsApi->sendTransacEmail($sendSmtpEmail);

            return $user;

        } catch (ApiException $e) {
            // Catch the exception and check if it's a duplicate contact error
            if ($e->getCode() === 400) {

                $user->in_crm = false;
                $user->save();


                //        // Send the welcome email

                $sendSmtpEmail = new SendSmtpEmail();
                $sendSmtpEmail['to'] = [['email' => $user->email]];
                $sendSmtpEmail['templateId'] = $type == "customer" ? 4 : 3;
                $sendSmtpEmail['params'] = [
                    'FIRSTNAME' => $user->name
                ];
                $sendSmtpEmail['smtpTemplateSensitivity'] = 'normal';
                $transactionalEmailsApi->sendTransacEmail($sendSmtpEmail);

                return $user;

                // The contact already exists, so we don't need to do anything
//                return $user;
            } else {
                // Re-throw the exception if it's not a duplicate contact error
//                throw $e;
            }
        }

        return $user;

    }


    public function verifyTransfer($reference)
    {
        // Set up a new HTTP client
        try {
            $client = new Client([
                'base_uri' => 'https://api.paystack.co/',
                'headers' => [
                    'Authorization' => 'Bearer ' . env('PAYSTACK_SECRET_KEY'),
                    'Content-Type' => 'application/json',
                ],
            ]);

            // Make an HTTP GET request to the transfer verification API endpoint
            $response = $client->get('transfer/verify/' . $reference);

            // Check if the request was successful
            if ($response->getStatusCode() !== 200) {
                return null;
            }

            // Parse the response body as JSON
            $data = json_decode($response->getBody(), true);

            // Return the transfer verification data
            return $data['data'];
        } catch (ClientException $e) {
            if ($e->getResponse()->getStatusCode() === 404) {
                // The transfer was not found
                return null;
            }

            // Re-throw the exception for other HTTP errors
            throw $e;
        }
    }

    public function createDriverForm($driverId)
    {
        $formNames = [
            'Customer Registration',
            'Onboarding Form',
            'Hire Agreement',
            'Proposal Form',
            'Checklist Form',
            'Payment Sheet',
        ];
        $actionFormNames = [
            'Return Vehicle',
            'Report Vehicle Defect',
            'Report Accident',
            'Change of Address',
            'Monthly Maintenance',
            'Submit Mileage',
        ];

        // Only exclude fields that are strictly necessary
        $excludeFields = ['id', 'driver_id', 'name', 'status', 'sending_method', 'state', 'action'];
        $columns = Schema::getColumnListing('driver_forms');

        // Identify JSON fields by excluding the necessary fields
        $jsonFields = array_diff($columns, $excludeFields);

        foreach ($formNames as $name) {
            $data = [
                'driver_id' => $driverId,
                'name' => $name,
                'status' => 'pending',
                'sending_method' => null,
                'state' => 'Generated',
                'action' => 0,
            ];

            // Explicitly set only the intended JSON fields to null
            foreach ($jsonFields as $field) {
                $data[$field] = null;
            }

            DriverForm::create($data);
        }

        foreach ($actionFormNames as $name) {
            $data = [
                'driver_id' => $driverId,
                'name' => $name,
                'status' => 'pending',
                'sending_method' => null,
                'state' => 'Generated',
                'action' => 1,
            ];

            foreach ($jsonFields as $field) {
                $data[$field] = null;
            }

            DriverForm::create($data);
        }

        return $form ?? null;
    }


}
