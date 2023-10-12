<?php

namespace App\Services;

class BookingRequestService
{
    public function getRegion($lat, $lng)
    {
        $regionService = new RegionService();
        $region = $regionService->getRegionByLatLng($lat, $lng);
        if($region){
            return $region;
        }else{
            return false;
        }
    }

}
