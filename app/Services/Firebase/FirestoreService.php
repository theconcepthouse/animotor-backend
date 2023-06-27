<?php

namespace App\Services\Firebase;

use MrShan0\PHPFirestore\FirestoreClient;

class FirestoreService
{

    protected FirestoreClient $firestoreClient;

    public function __construct()
    {
        $this->firestoreClient = new FirestoreClient(env("FIREBASE_PROJECT_ID"), "AIzaSyD91KH7BV9eDq09xWEGFAMi32XEzzkRc8I",
            [ 'database' => '(default)']);
    }

    public function updateDriver($user_data)
    {
        $firestoreClient = $this->firestoreClient;

        $data = [
            'email' => $user_data->email,
            'name' => $user_data->name,
            'id' => $user_data->id,
            'is_online' => $user_data->is_online,
            'full_phone' => $user_data->full_phone,
            'status' => $user_data->status,
            'unapproved_documents' => $user_data->unapproved_documents,
//            'map_lat' => $user_data->map_lat,
//            'map_lng' => $user_data->map_lng,
            'region_id' => $user_data->region_id,
            'account_balance' => $user_data->account_balance,
            'avatar' => $user_data->avatar,

            'title' => $user_data->car?->title,
            'model' => $user_data->car?->model,
            'make' => $user_data->car?->make,
            'color' => $user_data->car?->color,
            'type' => $user_data->car?->type,
            'year' => $user_data->car?->year,
            'gear' => $user_data->car?->gear,
            'vehicle_no' => $user_data->car?->vehicle_no,
        ];

//        $documentRef->set($data);

        return $firestoreClient->updateDocument("drivers/".$user_data->id, $data);
    }

    public function updateTripRequest($trip_data): void
    {
        $firestoreClient = $this->firestoreClient;

        $data = [
            'region_id' => $trip_data->region_id,
            'driver_id' => $trip_data->driver_id,
            'id' => $trip_data->id,
            'status' => $trip_data->status,
            'customer_id' => $trip_data->customer_id,
            'fee' => $trip_data->fee,
            'origin' => $trip_data->origin,
            'destination' => $trip_data->destination,
            'payment_status' => $trip_data->payment_status,
            'payment_method' => $trip_data->payment_method,
            'origin_lat' => $trip_data->origin_lat,
            'origin_lng' => $trip_data->origin_lng,
            'destination_lat' => $trip_data->destination_lat,
            'destination_lng' => $trip_data->destination_lng,
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
//            'commission' => $trip_data->commission,
        ];

        $firestoreClient->updateDocument("rideRequests/".$trip_data->id, $data);

    }

    public function deleteTrip($trip): array
    {
        try {
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

}
