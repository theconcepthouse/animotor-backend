<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Models\TripRequest;
use App\Models\User;
use App\Services\Firebase\FirestoreService;
use App\Services\RegionService;
use App\Services\WalletService;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    public function updateLatLng(Request $request, RegionService $regionService, FirestoreService $firestoreService): JsonResponse
    {
        DB::transaction(function () use ($request, $regionService, $firestoreService) {

            $user = DB::table('users')
                ->lockForUpdate() // Apply pessimistic locking
                ->where('id', auth()->id())
                ->first();

            $data = $request->validate([
                'lat' => 'required',
                'lng' => 'required',
                'address' => 'nullable',
            ]);

            if ($user){
                $lat = $request['lat'];
                $lng = $request['lng'];
                $address = $request['address'] ?? $user->address;

                $region = $regionService->getRegionByLatLng($lat, $lng);

                if(!$region){

                    DB::table('users')
                        ->where('id', auth()->id())
                        ->update([
                            'is_online' => false,
                    ]);

                    $firestoreService->updateUser($user);

                    $error_data['title'] = $address.' is not supported by our service';
                    $error_data['message'] = settings('unsupported_region_msg',config('app.messages.unsupported_region_msg'));
                    return $this->errorResponse($error_data);
                }

                DB::table('users')
                    ->where('id', auth()->id())
                    ->update([
                        'map_lat' => $data['lat'],
                        'map_lng' => $data['lng'],
                        'last_notification' => null,
                        'region_id' => $region->id,
                        'address' => $data['address'] ?? $user->address,
                        'last_location_update' => now()->addMinutes(2),
                    ]);

                if($user->last_notification){
                    $firestoreService->updateDriverNotification(auth()->id(), null);
                }

            }

            return $this->successResponse('updated lat & lng', $user);


        }, 5);

        return $this->successResponse('updated lat & lng', []);
    }

    public function getTransactions(Request $request): JsonResponse
    {
        $page_number = $request->has('page');
        $user = User::find(auth()->id());
        if($page_number){
            $transactions = $user->transactions()->latest()->paginate(100);
        }else{
            $transactions = $user->transactions()->latest()->paginate(4);
        }
        return $this->successResponse('transactions', $transactions);
    }

    public function getNotification(): JsonResponse
    {
        $notifications = auth()->user()->notifications()->latest()->paginate(50);
        foreach ($notifications as $notification) {
            $notification->formatted_created_at = $notification->created_at->diffForHumans();
        }
        return $this->successResponse('notifications', $notifications);
    }

    public function getEarnings(Request $request): JsonResponse
    {
        $user_id = auth()->id();
        $today = Carbon::today()->toDateString();
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();

        $query = TripRequest::select('driver_id','id','ride_type','region_id', 'completed', 'driver_earn', 'started_at')
            ->where('driver_id', $user_id)
            ->where('completed', true);

//        $total_earned_today = $query->whereDate('started_at', $today)->sum('driver_earn');
//
//        $total_earned_wk = $query->whereBetween('started_at', [$startOfWeek, $endOfWeek])->sum('driver_earn');

        $paginationLimit = $request->has('page') ? 100 : 10;

        $data = $query->latest()->paginate($paginationLimit);

        $meta = [
            'total_earned_wk' => $query->whereBetween('started_at', [$startOfWeek, $endOfWeek])->sum('driver_earn'),

            'total_earned_today' => $query->whereDate('started_at', $today)->sum('driver_earn'),
        ];

        $data = (object) [
            'data' => $data,
            'meta' => $meta,
        ];

//        $data = (object) [
//            'data' => $data,
//            'meta' => [
//                'total_earned_wk' => $total_earned_wk,
//                'total_earned_today' => $total_earned_today,
//            ],
//        ];

        return response()->json($data);
    }



    public function getLats(Request $request){
        $city = $request->get('city');
        // Retrieve the latitude and longitude range for the given city
        $response = Http::get("https://maps.googleapis.com/maps/api/geocode/json", [
            'address' => $city,
            'key' => env('MAP_API_KEY'),
        ]);

        $data = $response->json();

        // Extract the latitude and longitude bounds from the API response
        $bounds = $data['results'][0]['geometry']['bounds'];

        $latitudeRange = [
            'min' => $bounds['southwest']['lat'],
            'max' => $bounds['northeast']['lat'],
        ];

        $longitudeRange = [
            'min' => $bounds['southwest']['lng'],
            'max' => $bounds['northeast']['lng'],
        ];

        return $bounds;
    }


    public function webhook(Request $request)
    {

        $input = $request->getContent();

        if($input){

            // parse event (which is json string) as object
            $event = json_decode($input, true);

            $reference = $event['eventData']['transactionReference'];

            $email = $event['eventData']['customer']['email'];
            $amount = $event['eventData']['amountPaid'];

        }else{

            return response()->json(['Nothing in the request!!']);
        }

//        $transaction = Transaction::where('trx', $reference)->first();
//
//        if(!is_null($transaction)){
//            return response()->json(['failed!!']);
//        }


        $user = User::whereEmail($email)->first();

        if(!$user){
            return response()->json(['No User Existing']);
        }

        $wallet = new WalletService();

        $wallet->fundWallet($user, $amount, 'virtual account deposit of '.$amount);


//        $transaction = new Transaction();
//        $transaction->user_id = $user->id;
//        $transaction->amount = $amount;
//        $transaction->post_balance = $user->wallet;
//        $transaction->charge = $amount;
//        $transaction->trx_type = '-';
//        $transaction->status = 'Success';
//        $transaction->details = 'Requested for wallet service';
//        $transaction->trx =  $reference;
//        $transaction->save();


        return response()->json(['success']);
    }
}
