<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\CarExtra;
use App\Models\Company;
use App\Models\Region;
use App\Models\User;
use App\Models\VehicleMake;
use App\Models\VehicleModel;
use App\Models\VehicleType;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        return view('admin.cars.list');
    }

    public function extras($id)
    {
        $car = Car::findOrFail($id);

        $title = $car->title. " extras";

        return view('admin.cars.extras', compact('car','title'));
    }

    public function store(Request $request)
    {
       $validatedData = $this->validateData($request);

       $ani_motor = Company::where('contact_name', 'animotor')->first();

        if(isOwner()){
            $validatedData['company_id'] = companyId();
        }

        if(auth()->user()->hasRole('superadmin|admin')){
            $validatedData['company_id'] = $ani_motor->id;
        }

        $car = Car::create($validatedData);
        $message = $car->title." created successfully.";

        if(settings('enable_rental') == 'yes'){
            return redirect()->route('admin.cars.edit', $car->id)->with('success', $message );
        }
        return redirect()->route('admin.cars.index')->with('success', $message);
    }

    public function edit($id){
        $car = Car::findOrFail($id);

            if(!$car->carExtra){
                CarExtra::create([
                    'car_id' => $car->id
                ]);
            }

            $car_makes = VehicleMake::all();
            $car_types = VehicleType::all();
            if($car->model){
                $car_models = VehicleModel::where('name', $car?->model)->get();
            }else{
                $car_models = VehicleModel::where('name', $car_makes?->first()?->id)->get();
            }
            $drivers = User::whereHasRole('rider')->get();

            return view('admin.cars.edit', compact('car','car_types','car_models','car_makes', 'drivers'));

    }

    public function create(){
        $car_makes = VehicleMake::all();
        $car_types = VehicleType::all();
        $regions = Region::withoutAirport()->select('id','name')->get();
        $car_models = [];
        return view('admin.cars.create', compact('regions','car_types','car_models','car_makes'));
    }


    public function update(Request $request, $id)
    {
        $photos = removeDuplicatePhotos($request->input('images_array'), $request->input('photos'));
        $car = Car::findOrFail($id);
        $validatedData = $this->validateData($request);
        $validatedData['photos'] = $photos;
        $car->update($validatedData);

        return redirect()->route('admin.cars.index')->with('success', 'Car updated successfully.');
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
            'registration_number' => 'nullable',
            'license_no' => 'nullable',
            'model' => 'required',
            'vehicle_no' => 'required',
            'image' => 'nullable',
            'photos' => 'nullable',
            'youtube_link' => 'nullable',
            'gear' => 'nullable',
            'title' => 'required',

            'deposit' => 'nullable',
            'bags' => 'required',
            'cancellation_fee' => 'nullable',
            'price_per_mileage' => 'nullable',
            'mileage' => 'nullable',
            'map_lat' => 'nullable',
            'map_lng' => 'nullable',

            'air_condition' => 'nullable',
            'seats' => 'nullable',
            'pick_up_location' => 'nullable',
            'insurance_fee' => 'nullable',
        ];

        return $request->validate($rules);
    }
}
