<?php

namespace App\Livewire\Admin\Cars;

use App\Models\Addons\pcn;
use App\Models\Car;
use App\Models\DriverPcn;
use App\Models\Region;
use App\Models\VehicleMake;
use App\Models\VehicleModel;
use App\Services\FileUploadService;
use Illuminate\Support\Facades\File;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithFileUploads;

class Form extends Component
{
    use WithFileUploads;


    public Car $car;
    public  $pcns;

    public ?string $thumbnail;
    public ?string $title;
    public ?string $type;
    public ?string $make;
    public ?string $model;
    public ?string $gear;
    public ?string $air_condition;
    public ?string $cancellation_fee;
    public ?string $color;
    public ?string $year;
    public ?string $registration_number;
    public ?string $license_no;
    public ?string $tracker_no;
    public ?string $vehicle_no;
    public ?string $description;
    public ?string $mileage;
    public ?string $seats;
    public ?string $door;
    public ?string $requirements;
    public ?string $security_deposit;
    public ?string $damage_excess;
    public ?string $mileage_text;
    public ?string $fuel_type = "Diesel";
    public ?string $engine_size;
    public ?string $body_type = "convertible";

    public array $extras = ['title' => '', 'price' => ''];


//    TAX
    public ?string $is_taxed = "1";
    public ?string $tax_amount = null;
    public ?string $tax_type = "monthly";
    public ?string $tax_expiry_date = null;

    public array $service = [
        'last_service_date' => '',
        'next_service_date' => '',
        'last_service_mileage' => '',
        'next_service_mileage' => '',
    ];

    public array $subscription = [
        'tfl_congestion_charge' => '',
        'heathrow_airport' => '',
        'dartford_charge' => '',
        'gatwick_airport' => '',
    ];

    public array $mots = [
        'test_date' => '',
        'expiry_date' => '',
        'result' => 'pass',
        'details' => '',
    ];
    public array $damage = [
        'reported_date' => '',
        'incident_date' => '',
        'insurance_reference_no' => '',
        'total_claim_cost' => '',
        'status' => 'open',
    ];
    public array $repair = [
        'booking_id' => '',
        'booking_date' => '',
        'date_time' => '',
        'mileage_at_repair' => '',
        'workshop_name' => '',
        'repair_type' => '',
        'total_cost' => '',
        'vat' => '',
        'invoice' => '',
    ];

    public array $finance = [
        'finance_type' => '',
        'purchase_price' => '',
        'agreement_number' => '',
        'funder_name' => '',
        'agreement_start_date' => '',
        'agreement_end_date' => '',
        'loan_amount' => '',
        'repayment_frequency' => '',
        'amount' => '',
    ];

    public array $document = [
        'document_type' => '',
        'document_name' => '',
        'upload_date' => '',
        'expiry_date' => '',
        'action_type' => '',
        'action_date' => '',
        'file' => '',
    ];

    public array $steps = [
        'Vehicle',
        'Transmission',
        'Specifications',
        'MOT',
        'Road Tax',
        'Service',
        'Driver Details',
        'Addons',
        'Booking Information',
        'Documents',
        'Finance',
        'Damage History',
        'Add repair',
        'PCN Listing',
        'Reports',
        'Subscriptions',
    ];

    public array $full_types = [
        'Diesel',
        'Petrol',
        'Diesel hybrid',
        'Petrol Hybrid',
        'Electric',
        'Plug in hybrid',
        'Diesel Plug in Hybrid',
        'Petrol Plug in Hybrid',
        'Hydrogen',
    ];

    public $car_types = null;
    public $car_makes;
    public $car_models;
    public $drivers;

    public $pcn_no;
    public $date_time;
    public $offence_type;
    public $location;
    public $notice_issue_date;
    public $payment_dead_line;
    public $appeal_dead_line;
    public $status = "Representation made";
    public $booking_id;
    public $region_id;
    public $regions;
    public $driver = [];



    #[Computed]
    public int $step = 1;


    public function updatedMake()
    {
        $make = VehicleMake::select('name', 'id')->where('name', $this->make)->first();
        $make_id = $make->id ?? null;
        if ($make_id) {
            $this->car_models = VehicleModel::where('make_id', $make_id)->get();
        }
    }

    public function goBack(){
        if($this->step > 1){
            $this->step--;
        }
    }

    public function updatedGear()
    {
        $this->car->update(['gear', $this->gear]);
        $this->successMsg();
    }

    public function updatedThumbnail()
    {
        dd($this->thumbnail);
    }

    public function rendered(){
        $this->regions = Region::withoutAirport()->select('id','name')->get();
    }

    public function mount(Car $car, $car_types, $car_makes, $car_models)
    {
        $this->regions = Region::withoutAirport()->select('id','name')->get();
        $this->car_types = $car_types;
        $this->car_makes = $car_makes;
        $this->car_models = $car_models;
        if ($car) {
            $this->car = $car;

            if(!$this->car->region_id){
                $region = $this->regions->first();
                if($region){
                    $this->car->region_id = $region?->id;
                }
            }

            $this->booking_id = $car?->bookings?->first()?->id;


                $this->fill($car->toArray());

            if ($car->carExtra) {
                $carExtra = $car->carExtra;
                $this->is_taxed = $carExtra->is_taxed;
                $this->finance = $carExtra->finance;
                $this->subscription = $carExtra->subscriptions;
                $this->tax_amount = $carExtra->tax_amount;
                $this->tax_type = $carExtra->tax_type;
                $this->tax_expiry_date = $carExtra->tax_expiry_date;
            }
        }
    }

    public function render()
    {
        return view('livewire.admin.cars.form');
    }


    public function saveUpdate()
    {

//        if($this->step == 6){
//            return $this->addService();
//        }
//

        if ($this->step == 5) {
            $this->saveTax();
            return $this->step++;
        }
        if ($this->step == 7) {
            $this->saveDriver();
            return $this->step++;
        }

        if ($this->step == 16) {
           return $this->updateSubscription();
        }


        if ($this->step == 11) {
            $this->updateFinance();
            return $this->step++;
        }


        if ($this->step == 3) {
            $this->saveSpec();
            return $this->step++;
        }

        if ($this->step == 8) {
            if(isset($this->extras['title'])){
                $this->addExtras();
            }
            return $this->step++;
        }

        if ($this->step == 9) {
            return $this->updateBookingInfo();
        }

        $validated = $this->validate([
            'title' => ['required', 'string'],
            'type' => ['required', 'string'],
            'make' => ['required', 'string'],
            'model' => ['required', 'string'],
            'gear' => ['required', 'string'],
//            'air_condition' => ['required', 'string'],
            'cancellation_fee' => ['required', 'string'],
//            'color' => ['required', 'string'],
//            'year' => ['required', 'string'],
            'registration_number' => ['required', 'string'],
            'license_no' => ['required', 'string'],
            'tracker_no' => ['required', 'string'],
            'vehicle_no' => ['required', 'string'],
            'description' => ['required', 'string'],
            'region_id' => ['nullable'],
            'mileage' => ['required', 'string'],
        ]);

        $this->car->update($validated);

        $this->step++;

        $this->successMsg();

    }

    public function saveSpec()
    {
        $validated = $this->validate([
            'engine_size' => ['required', 'string'],
            'fuel_type' => ['required', 'string'],
            'body_type' => ['required', 'string'],
            'color' => ['required', 'string'],
            'door' => ['required', 'string'],
            'air_condition' => ['required', 'string'],
            'year' => ['required', 'string'],
            'seats' => ['required', 'string'],
        ]);

        $this->car->update($validated);

        $this->successMsg();

    }

    public function setStep($step)
    {
        $this->step = $step;
    }

    public function updateBookingInfo(): bool
    {
        $validated = $this->validate([
            'requirements' => ['required', 'string'],
            'security_deposit' => ['required', 'string'],
            'damage_excess' => ['required', 'string'],
            'mileage_text' => ['required', 'string'],
        ]);

        $this->car->update($validated);

        $this->successMsg();

        return true;
    }

    public function updateDamage(): bool
    {
        $validated = $this->validate([
            'damage.reported_date' => ['required', 'string'],
            'damage.incident_date' => ['required', 'string'],
            'damage.insurance_reference_no' => ['required', 'string'],
            'damage.total_claim_cost' => ['required', 'string'],
            'damage.status' => ['required', 'string'],
        ]);

        $newData = [
            'reported_date' => $this->damage['reported_date'],
            'incident_date' => $this->damage['incident_date'],
            'insurance_reference_no' => $this->damage['insurance_reference_no'],
            'total_claim_cost' => $this->damage['total_claim_cost'],
            'status' => $this->damage['status'],
        ];

        $carExtra = $this->car->carExtra;

        if ($carExtra) {
            $damage_history = $carExtra->damage_history;
            $damage_history[] = $newData;
            $carExtra->update(['damage_history' => $damage_history]);
        }

        $this->successMsg();

        $this->damage = [
            'reported_date' => '',
            'incident_date' => '',
            'insurance_reference_no' => 'pass',
            'total_claim_cost' => '',
            'status' => '',
        ];

        return true;
    }

    public function updateRepair(): bool
    {
        $validated = $this->validate([
            'repair.booking_id' => ['required', 'string'],
            'repair.booking_date' => ['required', 'string'],
            'repair.date_time' => ['required', 'string'],
            'repair.mileage_at_repair' => ['required', 'string'],
            'repair.workshop_name' => ['required', 'string'],
            'repair.repair_type' => ['required', 'string'],
            'repair.total_cost' => ['required', 'string'],
            'repair.vat' => ['required', 'string'],
            'repair.invoice' => ['required', 'mimes:jpeg,png,jpg,pdf', 'max:2048'],
        ]);


        if ($this->repair['invoice']) {
            $uploadService = new FileUploadService();
            $file = $uploadService->userFileUpload($this->repair['invoice']);
        }


        $newData = [
            'booking_id' => $this->repair['booking_id'],
            'booking_date' => $this->repair['booking_date'],
            'date_time' => $this->repair['date_time'],
            'mileage_at_repair' => $this->repair['mileage_at_repair'],
            'workshop_name' => $this->repair['workshop_name'],
            'repair_type' => $this->repair['repair_type'],
            'total_cost' => $this->repair['total_cost'],
            'vat' => $this->repair['vat'],
            'invoice' => $file ?? '',
        ];

        $carExtra = $this->car->carExtra;

        if ($carExtra) {
            $repairs = $carExtra->repairs;
            $repairs[] = $newData;
            $carExtra->update(['repairs' => $repairs]);
        }

        $this->successMsg();

        $this->damage = [
            'booking_id' => '',
            'booking_date' => '',
            'date_time' => 'pass',
            'mileage_at_repair' => '',
            'workshop_name' => '',
            'repair_type' => '',
            'total_cost' => '',
        ];

        return true;
    }
    public function addPCN(): bool
    {
        $validated = $this->validate([
            'pcn_no' => ['required', 'string'],
            'booking_id' => ['required', 'string'],
            'date_time' => ['required', 'string'],
            'offence_type' => ['required', 'string'],
            'location' => ['required', 'string'],
            'notice_issue_date' => ['required', 'string'],
            'payment_dead_line' => ['required', 'string'],
            'appeal_dead_line' => ['required', 'string'],
            'status' => ['required', 'string'],
        ]);

        $validated['car_id'] = $this->car->id;
        $validated['vrm'] = $this->car->registration_number;

        pcn::create($validated);

        $this->successMsg();

        $this->pcn_no  = '';
        $this->date_time = '';
        $this->offence_type = '';
        $this->location = '';
        $this->notice_issue_date = '';
        $this->payment_dead_line = '';
        $this->appeal_dead_line = '';

        return true;
    }

    public function updateDocument(): bool
    {

        $this->validate([
            'document.document_type' => ['required', 'string'],
            'document.document_name' => ['required', 'string'],
            'document.upload_date' => ['required', 'string'],
            'document.expiry_date' => ['required', 'string'],
            'document.action_type' => ['required', 'string'],
            'document.action_date' => ['required', 'string'],
            'document.file' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
        ]);


        if ($this->document['file']) {
            $uploadService = new FileUploadService();
            $image = $uploadService->userPhotoUpload($this->document['file']);
        }


        $newData = [
            'document_type' => $this->document['document_type'],
            'document_name' => $this->document['document_name'],
            'upload_date' => $this->document['upload_date'],
            'expiry_date' => $this->document['expiry_date'],
            'action_type' => $this->document['action_type'],
            'action_date' => $this->document['action_date'],
            'file' => $image ?? '',
        ];

        $carExtra = $this->car->carExtra;

        if ($carExtra) {
            $documents = $carExtra->documents;
            $documents[] = $newData;
            $carExtra->update(['documents' => $documents]);
        }

        $this->successMsg();

        $this->document = [
            'document_type' => '',
            'document_name' => '',
            'upload_date' => '',
            'expiry_date' => '',
            'action_type' => '',
            'action_date' => '',
            'file' => '',
        ];

        return true;
    }

    public function updateFinance(): bool
    {
        $this->validate([
            'finance.finance_type' => ['required', 'string'],
            'finance.purchase_price' => ['required', 'string'],
            'finance.agreement_number' => ['required', 'string'],
            'finance.funder_name' => ['required', 'string'],
            'finance.agreement_start_date' => ['required', 'string'],
            'finance.agreement_end_date' => ['required', 'string'],
            'finance.loan_amount' => ['required', 'string'],
            'finance.repayment_frequency' => ['required', 'string'],
            'finance.amount' => ['required', 'string'],
        ]);

        $newData = [
            'finance_type' => $this->finance['finance_type'],
            'purchase_price' => $this->finance['purchase_price'],
            'agreement_number' => $this->finance['agreement_number'],
            'funder_name' => $this->finance['funder_name'],
            'agreement_start_date' => $this->finance['agreement_start_date'],
            'agreement_end_date' => $this->finance['agreement_end_date'],
            'loan_amount' => $this->finance['loan_amount'],
            'repayment_frequency' => $this->finance['repayment_frequency'],
            'amount' => $this->finance['amount'],
        ];

        $carExtra = $this->car->carExtra;

        if ($carExtra) {
            $carExtra->update(['finance' => $newData]);
        }

        $this->successMsg();

        return true;
    }

    public function updateSubscription(): bool
    {
        $this->validate([
            'subscription.tfl_congestion_charge' => ['required', 'string'],
            'subscription.heathrow_airport' => ['required', 'string'],
            'subscription.dartford_charge' => ['required', 'string'],
            'subscription.gatwick_airport' => ['required', 'string'],
        ]);

        $newData = [
            'tfl_congestion_charge' => $this->subscription['tfl_congestion_charge'],
            'heathrow_airport' => $this->subscription['heathrow_airport'],
            'dartford_charge' => $this->subscription['dartford_charge'],
            'gatwick_airport' => $this->subscription['gatwick_airport'],
        ];

        $carExtra = $this->car->carExtra;

        if ($carExtra) {
            $carExtra->update(['subscriptions' => $newData]);
        }

        $this->successMsg();

        return true;
    }

    public function saveTax()
    {
        $this->validate([
            'is_taxed' => ['required'],
            'tax_amount' => ['required_if:is_taxed,1'],
            'tax_type' => ['required_if:is_taxed,1'],
            'tax_expiry_date' => ['required_if:is_taxed,1'],
        ]);


        $carExtra = $this->car->carExtra;

        if ($carExtra) {
            $carExtra->update([
                'is_taxed' => $this?->is_taxed,
                'tax_amount' => $this?->tax_amount ?? 0,
                'tax_type' => $this?->tax_type,
                'tax_expiry_date' => $this?->tax_expiry_date,
            ]);
        }

        $this->successMsg();

    }

    public function addService()
    {
        $this->validate([
            'service.last_service_date' => ['required', 'date'],
            'service.next_service_date' => ['required', 'date', 'after:service.last_date'],
            'service.last_service_mileage' => ['required', 'numeric'],
            'service.next_service_mileage' => ['required', 'numeric'],
        ]);

        $newService = [
            'last_service_date' => $this->service['last_service_date'],
            'next_service_date' => $this->service['next_service_date'],
            'last_service_mileage' => $this->service['last_service_mileage'],
            'next_service_mileage' => $this->service['next_service_mileage'],
        ];


        $carExtra = $this->car->carExtra;

        if ($carExtra) {
            $services = $carExtra->service;
            $services[] = $newService;
            $carExtra->update(['service' => $services]);
        }

        $this->successMsg();

        $this->resetService();

    }

    public function addExtras()
    {
        $this->validate([
            'extras.title' => ['required'],
            'extras.price' => ['required'],
        ]);

        $newData = [
            'title' => $this->extras['title'],
            'price' => $this->extras['price'],
        ];

        $data = $this->car->extras;
        $data[] = $newData;
        $this->car->update(['extras' => $data]);

        $this->successMsg();

        $this->extras = [
            'title' => '',
            'price' => ''
        ];

    }

    public function addMOT()
    {
        $this->validate([
            'mots.test_date' => ['required'],
            'mots.expiry_date' => ['required'],
            'mots.result' => ['required'],
            'mots.details' => ['nullable'],
        ]);

        $newData = [
            'test_date' => $this->mots['test_date'],
            'expiry_date' => $this->mots['expiry_date'],
            'result' => $this->mots['result'],
            'details' => $this->mots['details'],
        ];


        $carExtra = $this->car->carExtra;

        if ($carExtra) {
            $mots = $carExtra->mots;
            $mots[] = $newData;
            $carExtra->update(['mots' => $mots]);
        }

        $this->successMsg();

        $this->service = [
            'test_date' => '',
            'expiry_date' => '',
            'result' => 'pass',
            'details' => '',
        ];

    }

    public function saveDriver()
    {

        $validated = $this->validate([
            'driver.file' => 'nullable|image|mimes:jpg,jpeg,png|max:5024',
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

        $vehicle = Car::find($this->car->id);
        if ($vehicle)
        {
            $vehicle->update(['driver' => $this->driver]);
        }

    }

    public function removeService($index)
    {
        array_splice($this->car->service, $index, 1);
        $this->car->save();
    }

    public function successMsg()
    {
        $this->js("NioApp.Toast('Successfully updated', 'success', {
                                position: 'top-right'
                            });");
    }


    private function resetService()
    {
        $this->service = [
            'last_service_date' => '',
            'next_service_date' => '',
            'last_service_mileage' => '',
            'next_service_mileage' => '',
        ];
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

}
