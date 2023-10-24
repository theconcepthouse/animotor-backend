<?php

namespace App\Notifications;


use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AccountNotification extends Notification
{
    use Queueable;

    public $message;

    public function __construct($message)
    {
        $this->message = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject($this->message['title'])
            ->markdown('emails.account_notify', [
                'message' => $this->message,
                'user' => $notifiable
            ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            "title"      =>  $this->message['title'],
            "message"      =>  $this->message['message'],
            "type"      =>  isset($this->message['type']) ? $this->message['type'] : 'notification',
            "time"   =>  Carbon::now()
        ];
    }
}
