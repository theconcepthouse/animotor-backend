<?php

namespace App\Listeners;

use App\Events\NewTrip;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

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
        if(in_array($trip->status,['cancelled_booker','cancelled_by_driver','driver_accepted'])){
            if($trip->temp_driver_id){
                DB::table('users')
                    ->where('id', $trip->temp_driver_id)
                    ->update([
                        'ride_status' => 'available',
                    ]);
            }
        }


        info('tripStatusChanged : ' . $trip->status);
    }
}
