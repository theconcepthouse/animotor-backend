<?php

namespace App\Listeners;

use App\Events\NewTrip;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class TripStatusChangeListener
{
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
    public function handle($event): void
    {
        $trip = $event->trip;
        info('tripStatusChanged : ' . $trip->status);
    }
}
