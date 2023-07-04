<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\VehicleMake;
use App\Models\VehicleModel;
use App\Models\VehicleType;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        $data = Car::paginate(100);
        $title = "Cars listing";
        return view('admin.cars.list', compact('data','title'));
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $validatedData = $this->validateData($request);

        Car::create($validatedData);

        return redirect()->back()->with('success', 'Car created successfully.');
    }

    public function edit($id){
        $car = Car::findOrFail($id);
        $car_makes = VehicleMake::all();
        $car_types = VehicleType::all();
        if($car->model){
            $car_models = VehicleModel::where('name', $car?->model)->get();
        }else{
            $car_models = VehicleModel::where('name', $car_makes?->first()?->id)->get();
        }

        return view('admin.cars.edit', compact('car','car_types','car_models','car_makes'));

    }

    public function create(){
        $car_makes = VehicleMake::all();
        $car_types = VehicleType::all();
        $car_models = [];
        return view('admin.cars.create', compact('car_types','car_models','car_makes'));
    }


    public function update(Request $request, $id)
    {
        $car = Car::findOrFail($id);
        $validatedData = $this->validateData($request);

        $car->update($validatedData);

        return redirect()->back()->with('success', 'Car updated successfully.');
    }

    public function destroy($id)
    {
        $car = Car::findOrFail($id);

        $car->delete();

        return redirect()->back()->with('success', 'Car deleted successfully.');
    }

    private function validateData(Request $request): array
    {
        $rules = [
            'make' => 'required',
            'type' => 'required',
            'driver_id' => 'nullable',
            'region_id' => 'nullable',
            'regional_packages' => 'nullable',
            'door' => 'required',
            'year' => 'nullable',
            'color' => 'required',
            'model' => 'required',
            'vehicle_no' => 'required',
            'image' => 'nullable',
            'gear' => 'nullable',
            'title' => 'required',
        ];

        return $request->validate($rules);
    }
}
