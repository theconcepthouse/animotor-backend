<?php

namespace App\Services\Firebase;

use App\Models\User;
use MrShan0\PHPFirestore\Fields\FirestoreGeoPoint;
use MrShan0\PHPFirestore\FirestoreClient;

class FirestoreService
{

    protected FirestoreClient $firestoreClient;

    public function __construct()
    {
        $this->firestoreClient = new FirestoreClient(env("FIREBASE_PROJECT_ID"), "AIzaSyD91KH7BV9eDq09xWEGFAMi32XEzzkRc8I",
            [ 'database' => '(default)']);
    }


    public function updateTripRequest($trip_data, $drivers_id = null, $drivers = null, $reset = false):void
    {
        try {
            $firestoreClient = $this->firestoreClient;

            $data = [
                'region_id' => $trip_data->region_id,
                'driver_id' => $trip_data->driver_id,
                'id' => $trip_data->id,
                'status' => $trip_data->status,
                'customer_id' => $trip_data->customer_id,
//                'fee' => $trip_data->fee,
                'fee' => $trip_data->grand_total,
                'origin' => $trip_data->origin,
                'destination' => $trip_data->destination,
                'payment_status' => $trip_data->payment_status,
                'payment_method' => $trip_data->payment_method,
                'origin_lat' => floatval($trip_data->origin_lat),
                'origin_lng' => floatval($trip_data->origin_lng),
                'destination_lat' => floatval($trip_data->destination_lat),
                'destination_lng' => floatval($trip_data->destination_lng),
                'started_at' => $trip_data->started_at_val,
                'end_at' => $trip_data->end_at_val,
                'current_lat' => $trip_data->current_lat,
                'current_lng' => $trip_data->current_lng,
                'distance' => $trip_data->distance,
                'distance_text' => $trip_data->distance_text,
                'duration' => $trip_data->duration,
                'duration_text' => $trip_data->duration_text,
                'car_id' => $trip_data->car_id,
                'completed' => $trip_data->completed,
                'cancelled' => $trip_data->cancelled,
                'rating' => $trip_data->rating,
                'driver_rating' => $trip_data->driver_rating,
                'rating_comment' => $trip_data->rating_comment,
                'driver_rating_comment' => $trip_data->driver_rating_comment,
                'driver_feedback' => $trip_data->driver_feedback,
                'rider_feedback' => $trip_data->rider_feedback,
                'base_price' => $trip_data->base_price,
                'time_price' => $trip_data->time_price,
                'distance_price' => $trip_data->distance_price,
                'discount' => $trip_data->discount,
                'tax' => $trip_data->tax,
                'grand_total' => $trip_data->grand_total,
                'service_id' => $trip_data->service_id,
                'ride_type' => $trip_data->ride_type,

                'currency' => $trip_data->currency,
                'drivers' => $drivers_id ?? [],

                'customer_avatar' => $trip_data?->customer?->avatar,
                'customer_name' => $trip_data?->customer?->name,
                'customer_phone' => $trip_data?->customer?->full_phone,
            ];

            if($trip_data->driver){
                $extra = [
                    'driver_avatar' => $trip_data?->driver?->avatar,
                    'driver_name' => $trip_data?->driver?->name,
                    'driver_phone' => $trip_data?->driver?->full_phone,
                    'car_title' => $trip_data?->driver?->car?->title,
                    'car_vehicle_no' => $trip_data?->driver?->car?->vehicle_no,
                    'car_year' => $trip_data?->driver?->car?->year,
                    'car_model' => $trip_data?->driver?->car?->model,
                    'car_type' => $trip_data?->service?->name,
                    'car_color' => $trip_data?->driver?->car?->color,
                ];


                $data = array_merge($data, $extra);
            }else{
                if($drivers && count($drivers) > 0){
                    $driver = $drivers->first();
                    $extra = [
                        'driver_avatar' => $driver?->avatar,
                        'driver_name' => $driver?->name,
                        'message' => "The driver will be on their way as soon as they confirm"
                    ];

                    $data = array_merge($data, $extra);

                    $trip_data->temp_driver_id = $driver->id;

                    $trip_data->save();
                }

                if($reset){
                    $extra = [
                        'driver_avatar' => null,
                        'driver_name' => null,
                        'message' => "None of our drivers are currently within your location, we are still searching ..."
                    ];

                    $data = array_merge($data, $extra);

                    $trip_data->temp_driver_id = null;

                    $trip_data->save();
                }

            }

            if(!env('APP_DEBUG')) {
                $firestoreClient->updateDocument("rideRequests/" . $trip_data->id, $data);
            }
        }catch (\Exception $e) {
            info('fire error : '. $e->getMessage());
        }

    }

    public function deleteTrip($trip): array
    {

        try {
            if(env('APP_DEBUG')){
                $data['status'] = false;
                $data['message'] ="you are in dev mood";
            }
            $collection = 'rideRequests/'.$trip->id;

            $data['response'] = $this->firestoreClient->deleteDocument($collection);
            $data['status'] = true;
            $data['message'] = "succesfull";

            return $data;
        }catch (\Exception $e) {
            $data['status'] = false;
            $data['message'] = $e->getMessage();
            return $data;
        }

    }

    public function updateUser($user_data){
        if(env('APP_DEBUG')) {
            return null;
        }
        if($user_data->hasRole('driver')){
            return $this->updateDriver($user_data);
        }else{
            return $this->updateRider($user_data);
        }
    }

    private function updateDriver($user_data)
    {
        $firestoreClient = $this->firestoreClient;

        $data = [
            'email' => $user_data->email,
            'name' => $user_data->name,
            'id' => $user_data->id,
            'is_online' => boolval($user_data->is_online),
            'full_phone' => $user_data->full_phone,
            'status' => $user_data->status,
            'unapproved_documents' => $user_data->unapproved_documents,
//            'map_lat' => $user_data->map_lat,
//            'map_lng' => $user_data->map_lng,
            'region_id' => $user_data->region_id,
            'account_balance' => $user_data->account_balance,
            'avatar' => $user_data->avatar,
            'last_notification' => $user_data->last_notification,

            'title' => $user_data->car?->title,
            'model' => $user_data->car?->model,
            'make' => $user_data->car?->make,
            'color' => $user_data->car?->color,
            'type' => $user_data->car?->type,
            'year' => $user_data->car?->year,
            'gear' => $user_data->car?->gear,
            'vehicle_no' => $user_data->car?->vehicle_no,
        ];

        return $firestoreClient->updateDocument("drivers/".$user_data->id, $data);

    }

    private function updateRider($user_data)
    {
        $firestoreClient = $this->firestoreClient;

        $data = [
            'email' => $user_data->email,
            'name' => $user_data->name,
            'id' => $user_data->id,
            'is_online' => boolval($user_data->is_online),
            'full_phone' => $user_data->full_phone,
            'status' => $user_data->status,
            'last_notification' => $user_data->last_notification,
            'region_id' => $user_data->region_id,
            'account_balance' => $user_data->account_balance,
            'avatar' => $user_data->avatar,
        ];

        return $firestoreClient->updateDocument("riders/".$user_data->id, $data);

    }


}
