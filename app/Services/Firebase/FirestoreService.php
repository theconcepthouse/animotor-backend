<?php

namespace App\Services\Firebase;

use MrShan0\PHPFirestore\FirestoreClient;

class FirestoreService
{

    public function updateDriver($user_data)
    {
        $firestoreClient = new FirestoreClient(env("FIREBASE_PROJECT_ID"), env("FIREBASE_API_KEY"),
            [ 'database' => '(default)']);

//        $documentRef = $firestore->collection('drivers')->document($user_data->id);

        $data = [
            'email' => $user_data->email,
            'name' => $user_data->name,
            'id' => $user_data->id,
            'is_online' => $user_data->is_online,
            'status' => $user_data->status,
            'title' => $user_data->car?->title,
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

//        $documentRef->set($data);

        $collections = $firestoreClient->listDocuments('drivers');

        return $collections;
    }

}
