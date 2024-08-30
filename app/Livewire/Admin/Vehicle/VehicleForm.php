<?php

namespace App\Livewire\Admin\Vehicle;

use App\Models\Car;
use App\Models\FleetEvent;
use App\Models\MailTracker;
use App\Models\Vehicle;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithFileUploads;
class VehicleForm extends Component
{
    use WithFileUploads;

    public $vehicle;
    public $vehicleId;
    public $vehicle_details = [];
    public $transmission = [];
    public $specification = [];
    public $mot = [];
    public $road_tax = [];
    public $service = [];
    public $driver = [];
    public $documents = [];
    public $finance = [];
    public $damage_history = [];
    public $repair = [];

    public array $steps = [
        'Vehicle Details',
        'Transmission',
        'Specification',
        'MOT',
        'Road Tax',
        'Services',
        "Driver Details",
        "Documents",
        "Finance",
        "Damage History",
        "Repairs",
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

     public function saveVehicleDetails()
    {
        if ($this->step == 1){
            $this->saveVehicle();
            return $this->step++;
        }
        if ($this->step == 2){
            $this->saveTransmission();
            return $this->step++;
        }
        if ($this->step == 3){
            $this->saveSpecification();
            return $this->step++;
        }
        if ($this->step == 4){
            $this->saveMOT();
            return $this->step++;
        }
        if ($this->step == 5){
            $this->saveRoadTax();
            return $this->step++;
        }
        if ($this->step == 6){
            $this->saveServices();
            return $this->step++;
        }
        if ($this->step == 7){
            $this->saveDriver();
            return $this->step++;
        }
        if ($this->step == 8){
            $this->saveDocuments();
            return $this->step++;
        }
        if ($this->step == 9){
            $this->saveFinance();
            return $this->step++;
        }if ($this->step == 10){
            $this->saveDamage();
            return $this->step++;
        }
        if ($this->step == 11){
            $this->saveRepair();
            $this->redirectRoute('admin.vehicle.index');
        }
        $this->successMsg();
    }

    private function storeImageWithOriginalName($file, $path)
    {
        $fullPath = storage_path('app/public/' . $path);

        if (!File::exists($fullPath)) {
            File::makeDirectory($fullPath, 0755, true);
        }

        $filename = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('public/'.$path, $filename);
        return asset('storage/'.$path.'/'.$filename);
    }

    public function saveVehicle()
    {
        // Populate the vehicle details array with data from the Livewire properties
        $this->vehicle_details = [
            'vehicle_name' => $this->vehicle_details['vehicle_name'],
            'registration_number' => $this->vehicle_details['registration_number'] ,
            'make' => $this->vehicle_details['make'] ?? null,
            'model' => $this->vehicle_details['model'] ?? null,
            'mileage' => $this->vehicle_details['mileage'] ?? null,
            'license_number' => $this->vehicle_details['license_number'] ?? null,
            'tracker_number' => $this->vehicle_details['tracker_number'] ?? null,
            'car_type' => $this->vehicle_details['car_type'] ?? null,
            'vehicle_description' => $this->vehicle_details['vehicle_description'] ?? null,
            'transmission' => $this->transmission['type'] ?? null,
        ];

        $vehicle = Vehicle::find($this->vehicle?->id);
        if ($vehicle)
        {
            $vehicle->update(['vehicle_details' => $this->vehicle_details]);
        }

        if (!$vehicle)
        {
            $vehicle = new Vehicle();
            $vehicle->vehicle_details = $this->vehicle_details;
            $vehicle->transmission = [];
            $vehicle->specification = [];
            $vehicle->mot = [];
            $vehicle->road_tax = [];
            $vehicle->service = [];
            $vehicle->driver = [];
            $vehicle->save();
            $this->vehicleId = $vehicle->id;
        }
        $this->successMsg();


    }

   public function saveTransmission()
    {
        $this->transmission = [
            'gear_box' => $this->transmission['gear_box'] ?? null,
        ];

        $vehicle = Vehicle::find($this->vehicle?->id ?? $this->vehicleId);
        if ($vehicle)
        {
            $vehicle->update(['transmission' => $this->transmission]);
        }

    }
    public function saveSpecification()
    {
        $this->specification = [
            'number_of_seats' => $this->specification['number_of_seats'] ?? null,
            'air_conditioning' => $this->specification['air_conditioning'] ?? null,
        ];

        $vehicle = Vehicle::find($this->vehicle?->id ?? $this->vehicleId);
        if ($vehicle)
        {
            $vehicle->update(['specification' => $this->specification]);
        }
    }
    public function saveMOT()
    {
        $this->mot = [
            'test_date_1' => $this->mot['test_date_1'] ?? null,
            'expiry_date_1' => $this->mot['expiry_date_1'] ?? null,
            'mot_reports' => $this->mot['mot_reports'] ?? null,
            'test_date_2' => $this->mot['test_date_2'] ?? null,
            'expiry_date_2' => $this->mot['expiry_date_2'] ?? null,
            'result' => $this->mot['result'] ?? null,
            'failure_details' => $this->mot['failure_details'] ?? null,
        ];

        $vehicle = Vehicle::find($this->vehicle?->id ?? $this->vehicleId);
        if ($vehicle)
        {
            $vehicle->update(['mot' => $this->mot, 'updated_at' => now()]);

            $event = new FleetEvent();
            $event->title = "MOT Event";
            $event->start_date = $vehicle->updated_at;
            $event->end_date = Carbon::parse($vehicle['mot']['expiry_date_2']);
            $event->category = 'MOT-event';
            $event->save();
        }

    }
    public function saveRoadTax()
    {
        $this->road_tax = [
            'is_taxed' => $this->road_tax['is_taxed'] ?? null,
            'expiry_date' => $this->road_tax['expiry_date'] ?? null,
            'tax_type' => $this->road_tax['tax_type'] ?? null,
            'amount' => $this->road_tax['amount'] ?? null,
        ];

        $vehicle = Vehicle::find($this->vehicle?->id ?? $this->vehicleId);
        if ($vehicle)
        {
            $vehicle->update(['road_tax' => $this->road_tax]);
        }
    }
    public function saveServices()
    {
        $this->service = [
            'is_serviced' => $this->service['is_serviced'] ?? null,
            'last_service_date' => $this->service['last_service_date'] ?? null,
            'last_service_mileage' => $this->service['last_service_mileage'] ?? null,
            'next_service_date' => $this->service['next_service_date'] ?? null,
            'next_service_mileage' => $this->service['next_service_mileage'] ?? null,
        ];

        $vehicle = Vehicle::find($this->vehicle?->id ?? $this->vehicleId);
        if ($vehicle)
        {
            $vehicle->update(['service' => $this->service]);
        }

    }
   public function saveDriver()
    {
        $validated = $this->validate([
            'driver.file' => 'required|image|mimes:jpg,jpeg,png|max:5024',

        ]);
        $this->driver = [
            'name' => $this->driver['name'] ?? null,
            'photo' => $validated ? $this->storeImageWithOriginalName($this->driver['photo'], 'files') : null,
            'years_experience' => $this->driver['years_experience'] ?? null,
            'special_skills' => $this->driver['special_skills'] ?? null,
            'primary_language' => $this->driver['primary_language'] ?? null,
            'additional_languages' => $this->driver['additional_languages'] ?? null,
            'area_expertise' => $this->driver['area_expertise'] ?? null,
            'tour_guide_experience' => $this->driver['tour_guide_experience'] ?? null,
            'driving_licenses' => $this->driver['driving_licenses'] ?? null,
            'certifications' => $this->driver['certifications'] ?? null,
            'customer_reviews' => $this->driver['customer_reviews'] ?? null,
            'overall_rating' => $this->driver['overall_rating'] ?? null,
            'work_hours' => $this->driver['work_hours'] ?? null,
            'days_off' => $this->driver['days_off'] ?? null,
            'phone_number' => $this->driver['phone_number'] ?? null,
            'email_address' => $this->driver['email_address'] ?? null,
            'working_hours' => $this->driver['working_hours'] ?? null,
            'driver_breaks' => $this->driver['driver_breaks'] ?? null,
            'accommodation' => $this->driver['accommodation'] ?? null,
            'food' => $this->driver['food'] ?? null,
            'toll_tax' => $this->driver['toll_tax'] ?? null,
            'dropoff_location' => $this->driver['dropoff_location'] ?? null,
            'miscellaneous' => $this->driver['miscellaneous'] ?? null,
        ];

        $vehicle = Vehicle::find($this->vehicle?->id ?? $this->vehicleId);
        if ($vehicle)
        {
            $vehicle->update(['driver' => $this->driver]);
        }

    }



    public function saveDocuments()
    {
        $validated = $this->validate([
            'documents.file' => 'required|image|mimes:jpg,jpeg,png|max:5024',

        ]);
        $this->documents = [
            'type' => $this->documents['type'] ?? null,
            'name' => $this->documents['name'] ?? null,
            'file' => $validated ? $this->storeImageWithOriginalName($this->documents['file'], 'files') : null,
            'upload_date' => $this->documents['upload_date'] ?? null,
            'expiry_date' => $this->documents['expiry_date'] ?? null,
            'action_type' => $this->documents['action_type'] ?? null,
            'action_date' => $this->documents['action_date'] ?? null,
        ];

        $vehicle = Vehicle::find($this->vehicle?->id ?? $this->vehicleId);
        if ($vehicle) {
            $vehicle->update(['documents' => $this->documents]);
        }

        $this->successMsg();

    }

    public function saveFinance()
    {

        $validated = $this->validate([
            'finance.file' => 'required|image|mimes:jpg,jpeg,png|max:5024',

        ]);

        $this->finance = [
            'add_finance_info' => $this->finance['add_finance_info'] ?? null,
            'type' => $this->finance['type'] ?? null,
            'purchase_price' => $this->finance['purchase_price'] ?? null,
            'agreement_number' => $this->finance['agreement_number'] ?? null,
            'funder_name' => $this->finance['funder_name'] ?? null,
            'agreement_start_date' => $this->finance['agreement_start_date'] ?? null,
            'agreement_end_date' => $this->finance['agreement_end_date'] ?? null,
            'loan_amount' => $this->finance['loan_amount'] ?? null,
            'repayment_frequency' => $this->finance['repayment_frequency'] ?? null,
            'amount' => $this->finance['amount'] ?? null,
            'file' => $validated ? $this->storeImageWithOriginalName($this->finance['file'], 'files') : null,
        ];


        $vehicle = Vehicle::find($this->vehicle?->id ?? $this->vehicleId);
        if ($vehicle) {
            $vehicle->update(['finance' => $this->finance]);
        }

        $this->successMsg();
    }
    public function saveDamage()
    {
        $this->damage_history = [
            'reported_date' => $this->damage_history['reported_date'] ?? null,
            'incident_date' => $this->damage_history['incident_date'] ?? null,
            'insurance_reference_no' => $this->damage_history['insurance_reference_no'] ?? null,
            'total_claim_cost' => $this->damage_history['total_claim_cost'] ?? null,
            'status' => $this->damage_history['status'] ?? null,
        ];

        $vehicle = Vehicle::find($this->vehicle?->id ?? $this->vehicleId);
        if ($vehicle) {
            $vehicle->update(['damage_history' => $this->damage_history]);
        }

        $this->successMsg();
    }

    public function saveRepair()
    {
        $validated = $this->validate([
            'repair.invoice' => 'required|image|mimes:jpg,jpeg,png|max:5024',

        ]);
        $this->repair = [
            'booking_id' => $this->repair['booking_id'] ?? null,
            'booking_date' => $this->repair['booking_date'] ?? null,
            'work_carried_out_date' => $this->repair['work_carried_out_date'] ?? null,
            'mileage_at_repair' => $this->repair['mileage_at_repair'] ?? null,
            'workshop_name' => $this->repair['workshop_name'] ?? null,
            'repair_type' => $this->repair['repair_type'] ?? null,
            'total_cost' => $this->repair['total_cost'] ?? null,
            'vat' => $this->repair['vat'] ?? null,
            'invoice' => $validated ? $this->storeImageWithOriginalName($this->repair['invoice'], 'files') : null,
        ];

        $vehicle = Vehicle::find($this->vehicle?->id ?? $this->vehicleId);
        if ($vehicle) {
            $vehicle->update(['repair' => $this->repair]);
        }

        $this->successMsg();
    }



    public function mount($vehicle = null)
    {
        if ($vehicle) {
            $this->vehicle = $vehicle;
            $this->fill($vehicle->toArray());
        }
    }

    public function render()
    {
        return view('livewire.admin.vehicle.vehicle-form');
    }



}
