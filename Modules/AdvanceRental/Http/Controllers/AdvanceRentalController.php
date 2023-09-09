<?php

namespace Modules\AdvanceRental\Http\Controllers;

use App\Models\Car;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\AdvanceRental\Entities\VehicleDefect;

class AdvanceRentalController extends Controller
{

    public function index()
    {
        return view('advancerental::index');
    }


    public function create()
    {
        return view('advancerental::create');
    }



    public function store(Request $request)
    {
        $validated = $this->validateData($request);
        $validated['user_id'] = auth()->id();
        $report = VehicleDefect::where('booking_id',$validated['booking_id'])->first();
        if($report){
            $report->update($validated);
            return redirect()->route('booking.view', $validated['booking_id'])->with('success','vehicle defect report successfully updated');
        }else{
            VehicleDefect::create($validated);

            return redirect()->route('booking.view', $validated['booking_id'])->with('success','vehicle defect report successfully submited');
        }

    }

    private function validateData(Request $request): array
    {
        $rules = [
            'car_id' => 'required',
            'booking_id' => 'required',
            'company_id' => 'nullable',
            'date' => 'required',
            'location_of_vehicle' => 'required',
            'postal_code' => 'required',
            'location_of_defect' => 'required',
            'impact' => 'required',
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

    public function show($id)
    {
        return view('advancerental::show');
    }


}
