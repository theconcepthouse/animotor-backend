<?php

namespace App\Services;

use App\Models\Region;
use MatanYadaev\EloquentSpatial\Objects\Point;

class RegionService
{
    public function getRegionByLatLng($lat, $lng){

        $firstRegionWithParentId = Region::withoutAirport()->whereContains('coordinates', new Point($lat, $lng, (int)env('POINT_SRID', 0)))
            ->whereNotNull('parent_id')
            ->where('is_active', true)
            ->latest()
            ->get(['id','name','parent_id','is_active','type'])
            ->first();

        if (!$firstRegionWithParentId) {
            $firstRegionWithParentId = Region::withoutAirport()->whereContains('coordinates', new Point($lat, $lng, (int)env('POINT_SRID', 0)))
                ->where('is_active', true)
                ->latest()
                ->get(['id', 'name','parent_id','is_active','type'])
                ->first();
        }

        if($firstRegionWithParentId){
            return $firstRegionWithParentId;
        }else{
            return null;
        }

    }

    public function getSpecialPlaceByLatLng($lat, $lng){
        return Region::withAirport()->whereContains('coordinates', new Point($lat, $lng, (int)env('POINT_SRID', 0)))
            ->where('is_active', true)
            ->latest()
            ->get(['id','name','parent_id','type','is_active','airport_amount','airport_fee_type','airport_fee_mode'])
            ->first();
    }
}
