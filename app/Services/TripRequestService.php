<?php

namespace App\Services;

use App\Models\TripRequest;
use App\Services\Firebase\FirestoreService;
use Carbon\Carbon;

class TripRequestService
{
    public function getRegion($user, $lat, $lng)
    {
        $regionService = new RegionService();
        $region = $regionService->getRegionByLatLng($lat, $lng);
        if($region){
            $user->region_id = $region->id;
            $user->save();

            return $region;
        }else{
            return false;
        }
    }


    public function deletePendingTrips(): void
    {

        $interval = settings('delete_pending_orders_after', 3600);
        $time = Carbon::now()->subMinutes($interval);

        $tripsToDelete = TripRequest::where('status', 'pending')
            ->whereDate('updated_at', '<', $time)
            ->get();

        $countToDelete = $tripsToDelete->count();

        if($countToDelete > 0){
            $firestoreService = new FirestoreService();

            $msg = "deleted $countToDelete pending trips after $interval minutes of being pending";

            log_activity('deleted_pending_trips', $msg);


            foreach ($tripsToDelete as $item){
                $firestoreService->deleteTrip($item);
                $item->delete();
            }
        }


    }
}
