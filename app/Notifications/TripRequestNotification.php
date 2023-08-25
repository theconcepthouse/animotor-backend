<?php

namespace App\Notifications;

use App\Models\TripRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TripRequestNotification extends Notification
{
    use Queueable;



    protected TripRequest $trip;


    public function __construct($trip)
    {
        $this->trip = $trip;
    }

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('You have a new trip request!')
            ->line('Trip Location: ' . $this?->trip?->origin)
            ->line('Thank you for using our service!');
    }

    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
