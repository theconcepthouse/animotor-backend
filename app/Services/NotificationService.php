<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class NotificationService
{
    public function notifyMany($users, $data){

//        return $users;
//        Notification::send($users, new OrderStatusUpdate($data));

        $push_tokens = $users->pluck('push_token');

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post('https://exp.host/--/api/v2/push/send', [
            "to" => $push_tokens,
            "title" => $data['title'],
            "body" => $data['message']
        ]);


        return $response->body();
    }

    public function notifyOne($user, $data)
    {

        if($user->push_token){
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


}
