<?php

namespace App\Services;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class DistanceService
{
    public function getDistance($origin_lat, $origin_lng, $des_lat, $des_lng){

        $cacheKey = 'distance-' . $origin_lat . '-' . $origin_lng . '-' . $des_lat . '-' . $des_lng;

        // Try to retrieve the result from cache first
        $result = Cache::get($cacheKey);

        if ($result) {
            return $result;
        }

        // If the result is not in cache, make the API call
        $response = Http::get('https://maps.googleapis.com/maps/api/distancematrix/json?origins=' . $origin_lat . ',' . $origin_lng . '&destinations=' . $des_lat . ',' . $des_lng . '&key=' . env('MAP_API_KEY') . '&mode=driving');

        $result = $response['rows'][0]['elements'][0];
        // Store the result in cache for 24 hours
        Cache::put($cacheKey, $result, 1440);
        return $result;
    }

    public function getLocalDistance($order_lat, $order_lng, $user_lat, $user_lng): float|int
    {
        $earth_radius = 6371;

        $dLat = deg2rad($order_lat - $user_lat);
        $dLon = deg2rad($order_lng - $user_lng);

        $a = sin($dLat/2) * sin($dLat/2) +
            cos(deg2rad($user_lat)) * cos(deg2rad($order_lat)) *
            sin($dLon/2) * sin($dLon/2);

        $c = 2 * asin(sqrt($a));

        return $earth_radius * $c;
    }

    public function getFormattedAddress($lat, $lng)
    {
        try {
            $url = "https://maps.googleapis.com/maps/api/geocode/json?address=".$lat.",".$lng."&key=".config('app.MAP_API_KEY');
            $response = Http::get($url);
            $data = $response->json();
            return $data['results'][0]['formatted_address'] ?? null;
        } catch (\Exception $e) {
            // Handle exception if needed
            return null;
        }
    }

    public function getDriversByDistance($lat, $lng, $region_id, $service_id, $local = false, $notify = true)
    {
        $max_drivers_notify = (int)settings('max_drivers_notify', 2) * 5;

        $distanceService = new DistanceService();

        $restrict_drivers = settings('restrict_rides_to_service_type','no');

        if($restrict_drivers != 'yes') {
            $users = User::whereHasRole('driver')->select('last_location_update','id','push_token','is_online','region_id','email','map_lat','map_lng','service_id')
                ->where('is_online', true)
                ->where('region_id', $region_id)
                ->whereNotNull('push_token')
                ->whereNotNull('map_lng')
                ->whereNotNull('map_lat')
                ->whereNotNull('last_location_update')
                ->orderBy('last_location_update', 'desc')
                ->limit($max_drivers_notify);

            info('drivers by distance : '. count($users));
        }
        else{
            $query = User::whereHasRole('driver')->select('last_location_update','id','push_token','is_online','region_id','email','map_lat','map_lng','service_id')
                ->where('is_online', true)
                ->where('region_id', $region_id)
                ->whereNotNull('push_token')
                ->whereNotNull('map_lng')
                ->whereNotNull('last_location_update')
                ->orderBy('last_location_update', 'desc')
                ->whereNotNull('map_lat');

            $users = $query->where(function ($query) use ($service_id) {
                $query->where('service_id', $service_id)
                    ->orWhereJsonContains('services', $service_id);
            })->limit($max_drivers_notify);

            info('drivers by distance & service_type : '. count($users));

        }

//        info('region_id :'.$region_id);
//        info('drivers by distance : '. count($users));

        // Calculate the distance between each user's coordinates and the supplied coordinates
        foreach ($users as $user) {
            if($local){
                $distance = $distanceService->getDistance($user->map_lat, $user->map_lng, $lat, $lng);
//            $user->distance = $distanceService->getLocalDistance($user->map_lat, $user->map_lng, $lat, $lng);

                if(isset($distance['distance'])) {
                    $dist = $distance['distance']['value'] / 1000;
                    $user->distance = $dist > 0 ? $dist : 1;
                }else{
                    $user->distance = 0;
                }
            }else{
                $user->distance = $distanceService->getLocalDistance($user->map_lat, $user->map_lng, $lat, $lng);
            }

        }
//
//        foreach ($users as $user){
//            info('driver init:'.$user->email.' _ '.$user->distance);
//        }

        if(!$notify){
            return $users;
        }

        // Sort the users by distance
        $users = $users->sortBy('distance')->take((int)settings('max_drivers_notify', 2));

        $current_user = auth()->user();

        $closetDrivers = $users->filter(function ($user) {
            return $user->distance < (int)settings('max_distance_drivers_notify', 5);
        });


        if($closetDrivers->count() < 1){
            log_activity('driver_trip_notification', 'no close drivers available, notified '.count($users).' drivers outside set radius');
            return $users;
        }

        foreach ($closetDrivers as $user) {
            $msg = 'Trip request by '.$current_user?->email. ' sent to '.$user->email.' last_seen_at '.$user->last_location_update.' at '.Carbon::now().' while '.$user->distance.'km away from pickup location';
            log_activity('driver_trip_notification', $msg);
//            info('driver returned:'.$user->email.' _ '.$user->distance);
        }

        return $closetDrivers;

    }


}
