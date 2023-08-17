<?php

namespace App\Livewire;

use App\Models\Car;
use App\Models\Service;
use Livewire\Attributes\Computed;
use Livewire\Component;

class CarListing extends Component
{
    public array $selectedFilters = [];
    public $search;
    public int $min_price = 10;
    public int $max_price = 100;


    #[Computed]
    public bool $loading = false;

    public array $filters = [
        'Car Specs' => [
            'Air conditioning',
            '4+ door',
        ],
        'Electric Cars' => [
            'Fully electric',
            'Hybrid',
            'Plug-in hybrid',
        ],
        'Mileage / Kilometres' => [
            'Limited',
            'Unlimited',
        ],
        'Transmission' => [
            'Automatic',
            'Manual',
        ],
        'Car category' => [
            'Small',
            'Medium',
            'Large',
            'Estate',
            'Premium',
            'People carriers',
            'SUVs',
        ],
        'Supplier' => [
            'Drivalia',
            'Green Motion',
            'Sixt',
            'Surprice',
            'The out',
        ],
    ];

    public function updatedSearch(){
        dd($this->max_price);
    }

    public function services(){
        return Service::where('is_active', true)->get();
    }

//    public function updatedMaxPrice(){
//        dd($this->selectedFilters);
//    }

    public function render()
    {
        $services = $this->services();

        $this->loading = true;

//        sleep(4);

        $filteredCars = Car::query();



        foreach ($this->selectedFilters as $category => $filters) {
            foreach ($filters as $filter => $value) {
                if ($value) {
                    $filteredCars->orWhere($this->filterHeading($category), 'LIKE', '%' . $filter . '%');
                }
            }
        }

        $filteredCars->whereBetween('price_per_day', [$this->min_price, $this->max_price]);

        $filteredCars = $filteredCars->get();


        $this->loading = false;

        return view('livewire.car-listing',  compact('filteredCars','services'));
    }

    public function filterHeading($title): string
    {
        return 'title';
    }
}
