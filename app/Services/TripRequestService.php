<?php

namespace App\Services;

use App\Models\TripRequest;
use App\Services\Firebase\FirestoreService;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

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

    public function getSpecialPlaceFee($lat, $lng, $grandTotal): float|int
    {
        $regionService = new RegionService();
        $region = $regionService->getSpecialPlaceByLatLng($lat, $lng);
        if($region){
            if($region->airport_fee_type == 'percent'){
                $percent = floatval($region->airport_amount) / 100;
                $value = $grandTotal * $percent;
            }else{
                $value = floatval($region->airport_amount);
            }

            if($region->airport_fee_mode == 'increment'){
                $final_val = $value;
            }else{
                $final_val = -1 * $value;
            }
            return $final_val ?? 0.00;
        }else{
            return 0;
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

            $driverIds = $tripsToDelete->pluck('driver_id');

            if ($driverIds->isNotEmpty()) {
                DB::table('users')
                    ->whereIn('id', $driverIds->toArray())
                    ->update(['ride_status' => 'available']);
            }



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
