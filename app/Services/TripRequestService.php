<?php

namespace App\Services;

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


    public function deletePendingTrips(){

    }
}
