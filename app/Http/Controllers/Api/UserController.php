<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Models\User;
use App\Services\RegionService;
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
}
