<?php

namespace App\Services;

use App\Models\Region;

class RegionService
{
    public function getRegionByLatLng($lat, $lng){
        return Region::first();
    }
}
