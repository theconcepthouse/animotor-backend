<?php

namespace Modules\AdvanceRental\Http\Controllers;

use App\Models\Booking;
use App\Models\Car;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\AdvanceRental\Entities\CarDamageReport;
use Modules\AdvanceRental\Entities\VehicleDefect;

class VehicleDefectController extends Controller
{

    public function reportDefect($id)
    {
        $booking = Booking::findOrFail($id);
        $report = VehicleDefect::where('booking_id',$id)->first();
        return view('advancerental::report_vehicle_defect', compact('booking','report'));
    }

    public function all()
    {
        if(isOwner()){
            $data = VehicleDefect::where('company_id', companyId())->latest()->paginate(100);
        }else if (isAdmin()){
            $data = VehicleDefect::latest()->paginate(100);
        }else{
            $data = [];
        }

        return view('advancerental::admin.vehicle_defect_reports', compact('data'));
    }

    public function vehicleChecks()
    {
        if(isOwner()){
            $data = CarDamageReport::where('company_id', companyId())->latest()->paginate(100);
        }else if (isAdmin()){
            $data = CarDamageReport::latest()->paginate(100);
        }else{
            $data = [];
        }

        return view('advancerental::admin.vehicle_checks', compact('data'));
    }


//    public function store(Request $request){
//        $validatedData = $this->validateData($request);
//        $validatedData['user_id'] = auth()->id();
//        return $validatedData;
//        VehicleDefect::create($validatedData);
//        return redirect()->back()->with('success', 'Vehicle defect successfully submitted.');
//    }

    private function validateData(Request $request): array
    {
        $rules = [
            'user_type' => 'required',
            'reason' => 'required',
            'car_id' => 'required',
            'booking_id' => 'required',
            'company_id' => 'required',
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
