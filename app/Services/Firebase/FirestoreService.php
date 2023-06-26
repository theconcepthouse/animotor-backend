<?php

namespace App\Services\Firebase;

use MrShan0\PHPFirestore\FirestoreClient;

class FirestoreService
{

    public function updateDriver($user_data)
    {
        $firestoreClient = new FirestoreClient(env("FIREBASE_PROJECT_ID"), "AIzaSyCxyiF3q_1wfZQ0uTIprvxov9zjWBObuhM",
            [ 'database' => '(default)']);

//        $documentRef = $firestoreClient->collection('drivers')->document($user_data->id);

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
            'gear' => $user_data->car?->year,
            'vehicle_no' => $user_data->car?->vehicle_no,
        ];

//        $documentRef->set($data);

        return $firestoreClient->updateDocument("drivers/".$user_data->id, $data);
    }

}
