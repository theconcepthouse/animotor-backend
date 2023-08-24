<?php

namespace App\Livewire\Admin\Cars;

use App\Models\Car;
use App\Models\VehicleMake;
use App\Models\VehicleModel;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Form extends Component
{
    public Car $car;

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
    public ?string $is_taxed = "yes";
    public ?string $tax_amount;
    public ?string $tax_type = "monthly";
    public ?string $tax_expiry_date;

    public array $service = [
        'last_service_date' => '',
        'next_service_date' => '',
        'last_service_mileage' => '',
        'next_service_mileage' => '',
    ];

    public array $mots = [
        'test_date' => '',
        'expiry_date' => '',
        'result' => 'pass',
        'details' => '',
    ];

    public array $steps = [
        'Vehicle',
        'Transmission',
        'Specifications',
        'MOT',
        'Road Tax',
        'Service',
        'Addons',
        'Booking Information',
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

    public $car_types;
    public $car_makes;
    public $car_models;

    #[Computed]
    public int $step = 8;


    public function updatedMake(){
        $make = VehicleMake::select('name','id')->where('name', $this->make)->first();
        $make_id = $make->id ?? null;
        if($make_id){
            $this->car_models = VehicleModel::where('make_id', $make_id)->get();
        }
    }

    public function updatedGear(){
        $this->car->update(['gear', $this->gear]);
        $this->successMsg();
    }

    public function mount(Car $car, $car_types, $car_makes, $car_models){
        $this->car_types = $car_types;
        $this->car_makes = $car_makes;
        $this->car_models = $car_models;
        if($car){
            $this->car = $car;
            $this->fill($car->toArray());

            if($car->carExtra){
                $carExtra = $car->carExtra;
                $this->is_taxed = $carExtra->is_taxed;
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


    public function saveUpdate(){

//        if($this->step == 6){
//            return $this->addService();
//        }
//

        if($this->step == 5){
            $this->saveTax();
            return $this->step++;
        }

        if($this->step == 3){
            $this->saveSpec();
            return $this->step++;
        }

        if($this->step == 7){
            $this->addExtras();
            return $this->step++;
        }

        $validated = $this->validate([
            'title' => ['required', 'string'],
            'type' => ['required', 'string'],
            'make' => ['required', 'string'],
            'model' => ['required', 'string'],
            'gear' => ['required', 'string'],
//            'air_condition' => ['required', 'string'],
//            'cancellation_fee' => ['required', 'string'],
//            'color' => ['required', 'string'],
//            'year' => ['required', 'string'],
            'registration_number' => ['required', 'string'],
            'license_no' => ['required', 'string'],
            'tracker_no' => ['required', 'string'],
            'vehicle_no' => ['required', 'string'],
            'description' => ['required', 'string'],
            'mileage' => ['required', 'string'],
        ]);

        $this->car->update($validated);

        $this->step++;

        $this->successMsg();

    }

    public function saveSpec(){


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

    public function saveTax()
    {
        $this->validate([
            'is_taxed' => ['required'],
            'tax_amount' => ['required'],
            'tax_type' => ['required'],
            'tax_expiry_date' => ['required'],
        ]);


        $carExtra = $this->car->carExtra;

        if ($carExtra) {
            $carExtra->update([
                'is_taxed' => $this->is_taxed,
                'tax_amount' => $this->tax_amount,
                'tax_type' => $this->tax_type,
                'tax_expiry_date' => $this->tax_expiry_date,
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

    public function removeService($index)
    {
        array_splice($this->car->service, $index, 1);
        $this->car->save();
    }

    public function successMsg(){
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
}
