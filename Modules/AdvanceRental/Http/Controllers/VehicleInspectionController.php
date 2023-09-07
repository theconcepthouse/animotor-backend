<?php

namespace Modules\AdvanceRental\Http\Controllers;

use App\Models\Booking;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\AdvanceRental\Entities\VehicleInspection;

class VehicleInspectionController extends Controller
{
    public function create($id)
    {
        $booking = Booking::findOrFail($id);
        return view('advancerental::vehicle_inspection', compact('booking'));
    }


    public function store(Request $request){
        $validatedData = $this->validateData($request);
        VehicleInspection::create($validatedData);
        return redirect()->back()->with('success', 'Vehicle inspection successfully submitted.');
    }

    private function validateData(Request $request): array
    {
        $rules = [
            'booking_id' => 'required',
            'car_id' => 'required',
            'inspections.*' => 'required',
        ];

        return $request->validate($rules);
    }
}
