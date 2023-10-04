<?php

namespace App\Listeners;

use App\Events\BookingConfirmed;
use App\Notifications\BookingConfirmation;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class BookingConfirmationListener implements ShouldQueue
{
    use InteractsWithQueue;
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(BookingConfirmed $event): void
    {
        $booking = $event->booking;

        $user = $booking->customer;

        $user->notify(new BookingConfirmation($booking));
    }
}
