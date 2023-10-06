<?php

namespace App\Services;

use App\Models\Region;
use MatanYadaev\EloquentSpatial\Objects\Point;

class RegionService
{
    public function getRegionByLatLng($lat, $lng){

        $firstRegionWithParentId = Region::whereContains('coordinates', new Point($lat, $lng, env('POINT_SRID', 0)))
            ->whereNotNull('parent_id')
            ->where('is_active', true)
            ->latest()
            ->get(['id', 'name','parent_id','is_active'])
            ->first();

        if (!$firstRegionWithParentId) {
            $firstRegionWithParentId = Region::whereContains('coordinates', new Point($lat, $lng, env('POINT_SRID', 0)))
                ->where('is_active', true)
                ->latest()
                ->get(['id', 'name','parent_id','is_active'])
                ->first();
        }

        if($firstRegionWithParentId){
            return $firstRegionWithParentId;
        }else{
            return null;
        }

    }
}
