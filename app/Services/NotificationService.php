<?php

namespace App\Services;

use App\Models\User;
use App\Notifications\AccountNotification;
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
            "channelId" => "bookings-repeat",
            "body" => $data['message']
        ]);


        return $response->body();
    }

    public function notify($message, $type, $title, User $user, $sendSms = false, $sendEmail = false): void
    {
        $data['type'] = $type;
        $data['message'] = $message;
        $data['title'] = $title;

        $user->notify(new AccountNotification($data));

        if($user->push_token){
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
            ])->post('https://exp.host/--/api/v2/push/send', [
                'to' => $user->push_token,
                'title' => $title,
                'body' => $message,
            ]);
            $response->body();
        }

    }


}
