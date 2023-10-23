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

        if(count($trip->driver_rejected) > 0){
            $driver_rejected = $trip->driver_rejected->pluck('driver_id')->toArray();
        }else{
            $driver_rejected = [];
        }

        if($trip->temp_driver_id){
            $drivers = $distanceService->getDriversByDistance($trip->origin_lat, $trip->origin_lng, $trip->region_id,
                $trip->service_id, false, true, $trip->temp_driver_id, $driver_rejected);
        }else{
            $drivers = $distanceService->getDriversByDistance($trip->origin_lat, $trip->origin_lng, $trip->region_id,
                $trip->service_id, false, true, null, $driver_rejected);
        }


        $data['title'] = "New ride request";
        $data['message'] = "There is a new ride request within your current location";

        $notificationService = new NotificationService();

        if(count($drivers) > 0){

            info('notified : '. json_encode($drivers->pluck('id')->toArray()));

            $firestoreService->updateTripRequest($trip, $drivers->pluck('id')->toArray(), $drivers);

            $notificationService->notifyMany($drivers, $data);
        }else{
            if($trip->temp_driver_id){
                $firestoreService->updateTripRequest($trip, [], $drivers,true);
            }
        }


    }
}
