<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\User;
use App\Services\CarService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DriverController extends Controller
{

    public function vehicleUpdate(Request $request, CarService $carService): JsonResponse
    {
        $data = $this->vehicleData($request);
        $userId = auth()->user()->id;

        $user = User::find($userId);
        $carService->createOrUpdate($user->car, $data);

        return $this->successResponse('Vehicle information updated', $user);
    }

    protected function vehicleData(Request $request): array
    {
        $rules = [
            'driver_id' => 'required',
            'title' => 'nullable',
            'make' => 'nullable',
            'model' => 'nullable',
            'type' => 'nullable',
            'year' => 'nullable',
            'color' => 'nullable',
            'gear' => 'nullable',
            'door' => 'nullable',
            'vehicle_no' => 'nullable',
            'image' => 'nullable',
        ];
        return $request->validate($rules);
    }
}
