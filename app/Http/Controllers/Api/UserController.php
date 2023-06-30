<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Models\TripRequest;
use App\Models\User;
use App\Services\RegionService;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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
            return $this->errorResponse($address.' is not supported by our service');
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

        $query = TripRequest::select('driver_id', 'completed', 'driver_earn', 'started_at');
//            ->where('driver_id', $user_id)
//            ->where('completed', true);

//        $total_earned_today = $query->whereDate('started_at', $today)->sum('driver_earn');
//
//        $total_earned_wk = $query->whereBetween('started_at', [$startOfWeek, $endOfWeek])->sum('driver_earn');

        $paginationLimit = $request->has('page') ? 100 : 10;

        $data = $query->latest()->paginate($paginationLimit);

        $data = (object) [
            'data' => $data,
//            'meta' => [
//                'total_earned_wk' => $total_earned_wk,
//                'total_earned_today' => $total_earned_today,
//            ],
        ];

        return response()->json($data);
    }
}
