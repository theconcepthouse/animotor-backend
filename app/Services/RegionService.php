<?php

namespace App\Services;

use App\Models\Region;
use MatanYadaev\EloquentSpatial\Objects\Point;

class RegionService
{
    public function getRegionByLatLng($lat, $lng){

        $zones = Region::whereContains('coordinates', new Point($lat, $lng, env('POINT_SRID',0)))->latest()->get(['id', 'name']);
//        if(count($zones) < 1)
//        {
//            return
//        }
//        $data = array_filter($zones->toArray(), function($zone){
//            if($zone['status'] == 1) {
//                return $zone;
//            }
//        });
//
//        if (count($data) > 0) {
//            return response()->json(['zone_id' => json_encode(array_column($data, 'id')), 'zone_data'=>array_values($data)], 200);
//        }
//        return Region::first();

        return $zones;
    }
}
