<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VehicleMake;
use App\Models\VehicleModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class VehicleModelController extends Controller
{
    public function index()
    {
        $cacheKey = 'vehicle_models_index';

        $minutes = 60 * 60; // Cache data for 60 minutes

        $data = Cache::remember($cacheKey, $minutes, function () {
            return VehicleModel::all();
        });

        $makes = Cache::remember('vehicle_makes_index', $minutes, function () {
            return VehicleMake::all();
        });

        $title = "Vehicle models listing";
        return view('admin.vehicle.models', compact('data','title','makes'));
    }

    public function getByMake(Request $request): JsonResponse
    {
        $id = $request->get('make_id');
        $make = VehicleMake::where('name', $id)->first();
        $data = VehicleModel::where('make_id', $make?->id)->get();
        return $this->successResponse('fetched models', $data);
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $validatedData = $this->validateData($request);

        VehicleModel::create($validatedData);

        Cache::forget('vehicle_models_index');


        return redirect()->back()->with('success', 'Vehicle model created successfully.');
    }


    public function update(Request $request, $id)
    {
        $make = VehicleModel::findOrFail($id);
        $validatedData = $this->validateData($request);

        $make->update($validatedData);

        Cache::forget('vehicle_models_index');

        return redirect()->back()->with('success', 'Vehicle model updated successfully.');
    }

    public function destroy(VehicleModel $service)
    {
        $service->delete();

        Cache::forget('vehicle_models_index');


        return redirect()->back()->with('success', 'Vehicle model deleted successfully.');
    }

    private function validateData(Request $request): array
    {
        $rules = [
            'name' => 'required',
            'make_id' => 'required',
        ];

        return $request->validate($rules);
    }
}
