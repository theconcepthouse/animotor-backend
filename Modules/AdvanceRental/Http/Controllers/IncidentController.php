<?php

namespace Modules\AdvanceRental\Http\Controllers;

use App\Models\Booking;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\AdvanceRental\Entities\Incident;

class IncidentController extends Controller
{

    public function reportIncident($booking_id)
    {
        $booking = Booking::findOrFail($booking_id);
        $steps = [
            'Our Driver','Witness Details','Third Party','Police Details','Accident Details','Weather & Diagram'
        ];

        $step = request()->get('page') ?? 1;
        return view('advancerental::report_incident', compact('booking','steps','step','booking_id'));
    }


    public function store(Request $request){
//        $validatedData = $this->validateData($request);
//        Incident::create($validatedData);
        $step = $request->input('step');
        $booking_id = $request->input('booking_id');
        return redirect()->route('rental.report_incident',['id' => $booking_id, 'page' => $step+1])->with('success', ' successfully submitted.');
    }

    protected function validateData(Request $request): array {
        $rules = [
            'booking_id' => 'required',
            'owner_name' => 'required',
            'title' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'date_of_birth' => 'required',
            'phone' => 'required',
            'postal_code' => 'required',
            'email' => 'required',
            'address' => 'required',
            'policy_number' => 'required',
            'insurer' => 'required',
            'cover_type' => 'required',
            'witnesses' => 'nullable',
            'third_party' => 'nullable',
            'police_details' => 'nullable',
            'accident_details' => 'nullable',
            'weather' => 'nullable',
            'diagrams' => 'nullable',
            'date' => 'nullable',
            'signature' => 'nullable',
        ];

        return $request->validate($rules);
    }
}
