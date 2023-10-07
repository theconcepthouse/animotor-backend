<?php

namespace App\Listeners;

use App\Events\NewTrip;
use App\Services\DistanceService;
use App\Services\Firebase\FirestoreService;
use App\Services\NotificationService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifyOnlineDrivers
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
    public function handle(NewTrip $event): void
    {

        $distanceService = new DistanceService();
        $firestoreService = new FirestoreService();

        $trip = $event->trip;

        $drivers = $distanceService->getDriversByDistance($trip->origin_lat, $trip->origin_lng, $trip->region_id);

        $data['title'] = "New ride request";
        $data['message'] = "There is a new ride request within your current location";

        $notificationService = new NotificationService();

        if(count($drivers) > 0){

//            info('notified : '. json_encode($drivers->pluck('id')->toArray()));

            $fire = $firestoreService->updateTripRequest($trip, $drivers->pluck('id')->toArray());

//            info('fire : '. json_encode($fire));

            $notificationService->notifyMany($drivers, $data);
        }


    }
}
