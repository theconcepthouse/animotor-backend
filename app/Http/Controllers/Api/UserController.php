<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Models\TripRequest;
use App\Models\User;
use App\Services\RegionService;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    public function updateLatLng(Request $request, RegionService $regionService): JsonResponse
    {
        $user = User::find(auth()->id());
        $request->validate([
            'lat' => 'required',
            'lng' => 'required',
            'address' => 'nullable',
        ]);

        $lat = $request['lat'];
        $lng = $request['lng'];
        $address = $request['address'] ?? 'Your current location ';

        $region = $regionService->getRegionByLatLng($lat, $lng);

        if(!$region){
            $error_data['title'] = $address.' is not supported by our service';
            $error_data['message'] = settings('unsupported_region_msg',config('app.messages.unsupported_region_msg'));
            return $this->errorResponse($error_data);
        }

        $user->update([
            'map_lat' => $request['lat'],
            'map_lng' => $request['lng'],
            'region_id' => $region->id,
        ]);

        return $this->successResponse('updated lat & lng', $user);
    }

    public function getTransactions(Request $request): JsonResponse
    {
        $page_number = $request->has('page');
        $user = User::find(auth()->id());
        if($page_number){
            $transactions = $user->transactions()->latest()->paginate(100);
        }else{
            $transactions = $user->transactions()->latest()->paginate(4);
        }
        return $this->successResponse('transactions', $transactions);
    }

    public function getEarnings(Request $request): JsonResponse
    {
        $user_id = auth()->id();
        $today = Carbon::today()->toDateString();
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();

        $query = TripRequest::select('driver_id','id','ride_type','region_id', 'completed', 'driver_earn', 'started_at')
            ->where('driver_id', $user_id)
            ->where('completed', true);

//        $total_earned_today = $query->whereDate('started_at', $today)->sum('driver_earn');
//
//        $total_earned_wk = $query->whereBetween('started_at', [$startOfWeek, $endOfWeek])->sum('driver_earn');

        $paginationLimit = $request->has('page') ? 100 : 10;

        $data = $query->latest()->paginate($paginationLimit);

        $meta = [
            'total_earned_wk' => $query->whereBetween('started_at', [$startOfWeek, $endOfWeek])->sum('driver_earn'),

            'total_earned_today' => $query->whereDate('started_at', $today)->sum('driver_earn'),
        ];

        $data = (object) [
            'data' => $data,
            'meta' => $meta,
        ];

//        $data = (object) [
//            'data' => $data,
//            'meta' => [
//                'total_earned_wk' => $total_earned_wk,
//                'total_earned_today' => $total_earned_today,
//            ],
//        ];

        return response()->json($data);
    }



    public function getLats(Request $request){
        $city = $request->get('city');
        // Retrieve the latitude and longitude range for the given city
        $response = Http::get("https://maps.googleapis.com/maps/api/geocode/json", [
            'address' => $city,
            'key' => env('MAP_API_KEY'),
        ]);

        $data = $response->json();

        // Extract the latitude and longitude bounds from the API response
        $bounds = $data['results'][0]['geometry']['bounds'];

        $latitudeRange = [
            'min' => $bounds['southwest']['lat'],
            'max' => $bounds['northeast']['lat'],
        ];

        $longitudeRange = [
            'min' => $bounds['southwest']['lng'],
            'max' => $bounds['northeast']['lng'],
        ];

        return $bounds;
    }
}
