<?php

namespace App\Services;

use App\Models\User;
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

    public function getDriversByDistance($lat, $lng, $region_id)
    {
        $distanceService = new DistanceService();

        $users = User::whereHasRole('driver')->select('id','push_token','is_online','region_id','email')
            ->where('is_online', true)
            ->where('region_id', $region_id)
            ->whereNotNull('push_token')
            ->get();

        info('region_id :'.$region_id);
        info('drivers by distance : '. count($users));

        // Calculate the distance between each user's coordinates and the supplied coordinates
        foreach ($users as $user) {
            $user->distance = $distanceService->getLocalDistance($user->map_lat, $user->map_lng, $lat, $lng);

            info('driver :'.$user->email.'_'.$user->distance);
        }

        // Sort the users by distance
        $users = $users->sortBy('distance')->take(settings('max_drivers_notify', 2));


        $closetDrivers = $users->filter(function ($user) {
            return $user->distance < (int)settings('max_distance_drivers_notify', 5);
        });

        info('closetDrivers : '. count($closetDrivers));


        if($closetDrivers->count() < 1){
            info('returned users : '. count($users));
            return $users;
        }

        return $closetDrivers;

    }


}
