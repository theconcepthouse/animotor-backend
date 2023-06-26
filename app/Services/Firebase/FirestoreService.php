<?php

namespace App\Services\Firebase;

use Kreait\Laravel\Firebase\Facades\Firebase;

class FirestoreService
{
    public function updateDriver($user_data)
    {
        $data = [
            'email' => $user_data->email,
            'name' => $user_data->name,
            'id' => $user_data->id,
            'is_online' => $user_data->is_online,
            'status' => $user_data->status,
            'title' => $user_data?->car?->title,
            'map_lat' => $user_data->map_lat,
            'map_lng' => $user_data->map_lng,
            'slug' => $user_data->car?->slug,
            'location_id' => $user_data->region_id,
            'model' => $user_data->car?->model,
            'make' => $user_data->car?->make,
            'color' => $user_data->car?->color,
            'vehicle_type' => $user_data->car?->type,
            'vehicle_no' => $user_data->car?->vehicle_no,
            'avatar' => $user_data->avatar,
        ];

//        $firestore = app('firebase.firestore')
//            ->database()
//            ->collection('drivers')
//            ->document($user_data->id);

        $document = Firebase::firestore()
            ->database()
            ->collection('drivers')
            ->document($user_data->id);

        return $document->set($data);
    }

}
