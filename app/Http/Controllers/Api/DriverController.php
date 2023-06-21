<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\DriverDocument;
use App\Models\User;
use App\Services\CarService;
use App\Services\ImageService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DriverController extends Controller
{

    public function vehicleUpdate(Request $request, CarService $carService): JsonResponse
    {
        $userId = auth()->user()->id;

        $request['driver_id'] = $userId;

        $data = $this->vehicleData($request);

        $user = User::find($userId);
        $carService->createOrUpdate($user->car, $data);

        return $this->successResponse('Vehicle information updated', $user);
    }

    public function vehicleUpdateDocument(Request $request, ImageService $imageService){
        $request->validate([
            'file' => 'required',
            'id' => 'required',
        ]);

        $id = auth()->id();

        $driver_document = DriverDocument::find($request['id']);
        $file = $imageService->uploadImage($request['file'], 'drivers_document/'.$id);
        $driver_document->file = $file;
        if($file){
            $driver_document->status = "uploaded & awaiting approval";
        }
        $driver_document->save();
        return $this->successResponse('Driver document uploaded', $driver_document);
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
