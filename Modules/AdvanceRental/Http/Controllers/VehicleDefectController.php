<?php

namespace Modules\AdvanceRental\Http\Controllers;

use App\Models\Booking;
use App\Models\Car;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\AdvanceRental\Entities\VehicleDefect;

class VehicleDefectController extends Controller
{

    public function reportDefect($car_id)
    {
        $car = Car::findOrFail($car_id);
        return view('advancerental::report_vehicle_defect', compact('car'));
    }


    public function store(Request $request){
        $validatedData = $this->validateData($request);
        VehicleDefect::create($validatedData);
        return redirect()->back()->with('success', 'Vehicle defect successfully submitted.');
    }

    private function validateData(Request $request): array
    {
        $rules = [
            'user_type' => 'required',
            'reason' => 'required',
            'car_id' => 'required',
            'booking_id' => 'required',
            'date' => 'required',
            'location_of_vehicle' => 'required',
            'postal_code' => 'required',
            'location_of_defect' => 'required',
            'impact' => 'nullable',
            'description' => 'required',
            'actions_taken' => 'nullable',
            'recommendations' => 'nullable',
            'witnesses' => 'nullable',
            'reporter_name' => 'required',
            'reporter_phone' => 'required',
            'reporter_email' => 'required',
            'severity' => 'required',
        ];

        return $request->validate($rules);
    }
}
