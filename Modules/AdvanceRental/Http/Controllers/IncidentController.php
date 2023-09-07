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

        $incident = Incident::where('booking_id', $booking_id)->first();


        $step = request()->get('page') ?? 1;
        return view('advancerental::report_incident', compact('booking','steps','incident','step','booking_id'));
    }


    public function store(Request $request){
        $incident = Incident::where('booking_id', $request->input('booking_id'))->first();
        $step = $request->input('step');

        if($step == 1){
            $validatedData = $this->validateData($request);

            if($incident){
                $incident->update($validatedData);
            }else{
                Incident::create($validatedData);
            }
        }

        if($step == 2){
            $incident->update(['witnesses' => $request->input('witnesses')]);
        }

        if($step == 3){
            $incident->update(['third_party' => $request->input('third_party')]);
        }

        if($step == 4){
            $incident->update(['police_details' => $request->input('police_details')]);
        }
        if($step == 5){
            $incident->update(['accident_details' => $request->input('accident_details')]);
        }
        if($step == 6){
            $incident->update([
                'weather' => $request->input('weather'),
                'diagrams' => $request->input('diagrams'),
                'date' => $request->input('date'),
                'signature' => $request->input('signature'),
            ]);

            return redirect()->route('booking.view',$incident->booking_id)->with('success','Incident report successfully submitted');
        }

        $booking_id = $request->input('booking_id');
        return redirect()->route('rental.report_incident',['id' => $booking_id, 'page' => $step+1]);
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
