<?php

namespace App\Livewire\Admin\ReportIncident;

use App\Models\ReportIncident;
use Illuminate\Support\Str;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Form extends Component
{
    public $user;
    public $report;
    public $incidentId;

    public $reference_no;
    public $title;
    public $first_name;
    public $last_name;
    public $driver_license_issuing_country;
    public $driver_license_number;
    public $date_of_birth;
    public $occupation;
    public $phone_number;
    public $email;
    public $address_line_1;
    public $address_line_2;
    public $city;
    public $country;
    public $postcode;
    public $registration_number;
    public $make;
    public $model;
    public $color_of_vehicle;
    public $number_of_passengers;
    public $insurer;
    public $type_of_cover;
    public $policy_number;
    public $owner;
    public $damage_type;
    public $tp_vehicle_damage_description;
    public $tp_party_damage_description;
    public $accident_date;
    public $accident_time;
    public $accident_location;
    public $accident_impact_point;
    public $accident_description;


     public array $steps = [
        'Our Driver',
        'Third Party',
        'Accident Details',
    ];

     public function successMsg()
    {
        $this->js("NioApp.Toast('Successfully updated', 'success', {
                                position: 'top-right'
                            });");
    }

    #[Computed]
    public int $step = 1;

    public function goBack(){
        if($this->step > 1){
            $this->step--;
        }
    }

    public function setStep($step)
    {
        $this->step = $step;
    }

     public function saveReportClaim()
    {
        if ($this->step == 1){
            $this->saveDriver();
            return $this->step++;
        }
        if ($this->step == 2){
            $this->save3rdParty();
            return $this->step++;
        }
        if ($this->step == 3){
            $this->saveAccident();
            return $this->step++;
        }
        $this->successMsg();

    }

    public function saveDriver()
    {
        $data = $this->validateData();
        $data['reference_no'] = "123".Str::random(7);
        $incident = ReportIncident::create($data);
        $this->incidentId = $incident->id;
        $this->successMsg();
    }

    public function save3rdParty()
    {
        $data = $this->validateData();
        if ($this->incidentId) {
            $incident = ReportIncident::find($this->incidentId);
            if ($incident) {
                $incident->update($data);
            } else {
                // If no incident is found, create a new one
                $data['reference_no'] = "123".Str::random(7);
                $incident = ReportIncident::create($data);
                $this->incidentId = $incident->id;
            }
        } else {
            // If incidentId does not exist, create a new incident
            $data['reference_no'] = "123".Str::random(7);
            $incident = ReportIncident::create($data);
            $this->incidentId = $incident->id;
        }
        $this->successMsg();
    }
    public function saveAccident()
    {
        $data = $this->validateData();
        $incident = ReportIncident::find($this->incidentId);
        $incident->update($data);
        $this->successMsg();
        $this->redirectRoute('admin.incident.index');
    }

    public function mount($report = null)
    {
        if ($report) {
            $this->report = $report;
            $this->fill($report->toArray());
        }
    }
    public function render()
    {
        return view('livewire.admin.report-incident.form');
    }

    protected function validateData()
    {
        $rules = [
            'title' => 'nullable|string',
            'first_name' => 'nullable|string',
            'last_name' => 'nullable|string',
            'driver_license_issuing_country' => 'nullable|string',
            'driver_license_number' => 'nullable|string',
            'date_of_birth' => 'nullable|date',
            'occupation' => 'nullable|string',
            'phone_number' => 'nullable|string',
            'email' => 'nullable|email',
            'address_line_1' => 'nullable|string',
            'address_line_2' => 'nullable|string',
            'city' => 'nullable|string',
            'country' => 'nullable|string',
            'postcode' => 'nullable|string',
            'registration_number' => 'nullable|string',
            'make' => 'nullable|string',
            'model' => 'nullable|string',
            'color_of_vehicle' => 'nullable|string',
            'number_of_passengers' => 'nullable|integer',
            'insurer' => 'nullable|string',
            'type_of_cover' => 'nullable|string',
            'policy_number' => 'nullable|string',
            'owner' => 'nullable|string',
            'damage_type' => 'nullable|string',
            'tp_vehicle_damage_description' => 'nullable|string',
            'tp_party_damage_description' => 'nullable|string',
            'accident_date' => 'nullable|date',
            'accident_time' => 'nullable',
            'accident_location' => 'nullable|string',
            'accident_impact_point' => 'nullable|string',
            'accident_description' => 'nullable|string',
        ];
        return $this->validate($rules);
    }
}
