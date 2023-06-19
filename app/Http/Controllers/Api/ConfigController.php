<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CancellationReason;
use App\Models\Country;
use App\Models\Region;
use App\Models\VehicleMake;
use App\Models\VehicleModel;
use App\Models\VehicleType;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function getRegions(): JsonResponse
    {
        $regions = Region::where('is_active', true)->get();
        return $this->successResponse('regions', $regions);
    }

    public function getVehicleTypes(): JsonResponse
    {
        $data = VehicleType::where('is_active', true)->get();
        return $this->successResponse('vehicle types', $data);
    }

    public function getVehicleMakes(): JsonResponse
    {
        $data = VehicleMake::where('is_active', true)->get();
        return $this->successResponse('vehicle makes', $data);
    }

    public function getVehicleModels($id): JsonResponse
    {
        $data = VehicleModel::where('is_active', true)->where('make_id', $id)->get();
        return $this->successResponse('vehicle models', $data);
    }

    public function getCountries(): JsonResponse
    {
        $data = Country::where('is_active', true)->get();
        return $this->successResponse('countries', $data);
    }

    public function getDriversCancellationReasons(): JsonResponse
    {
        $data = CancellationReason::where('is_active', true)->where('user_type','driver')->get();
        return $this->successResponse('Driver cancellation reasons', $data);
    }

    public function getRidersCancellationReasons(): JsonResponse
    {
        $data = CancellationReason::where('is_active', true)->where('user_type','rider')->get();
        return $this->successResponse('Rider cancellation reasons', $data);
    }

    public function getSettings(): JsonResponse
    {
        $data['country_id'] = settings('country_id');
        $data['country_code'] = settings('country_code','+1');
        $data['country'] = settings('country','United state');
        $data['app_name'] = settings('site_name');
        return $this->successResponse('config settings', $data);
    }
}
