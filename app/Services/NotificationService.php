<?php

namespace App\Services;

use App\Events\UserNotification;
use App\Mail\NewAccountDeposit;
use App\Mail\SendMessage;
use App\Mail\VerifyAccount;
use App\Models\User;
use App\Notifications\AccountNotification;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;


class NotificationService
{

    public function sendEmailMessage($title, $message, User $user): void
    {
        $data['message'] = $message;
        $data['title'] = $title;
        $data['user'] = [
            'id' => $user->id,
            'name' => $user->name,
        ];

        Mail::to($user->email)->send(new SendMessage($data));
    }


    public function send_template_email(string $template, array $variables = []): string
    {
        try {

            if (!$template) {
                return false;
            }

            // Replace variables in template
            foreach ($variables as $key => $value) {
                $template = str_replace('{' . $key . '}', $value, $template);
            }

            return $template;


        } catch (\Exception $e) {
            \Log::error("Email send failed: " . $e->getMessage());
            return false;
        }
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
                "priority" => 'high'
            ]);
            $response->body();
        }

    }
}
