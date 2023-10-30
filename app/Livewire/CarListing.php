<?php

namespace App\Livewire;

use App\Models\Car;
use App\Models\Region;
use App\Models\Service;
use App\Models\VehicleMake;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class CarListing extends Component
{
    use WithPagination;
    protected string $paginationTheme = 'bootstrap';

    public array $selectedFilters = [];
//    #[Url]
    public array $selected_car_specs = [];
//    #[Url]
    public array $selected_transmissions = [];

    public array $selected_car_makes = [];

    public array $selected_car_types = [];

    public array $selected_car_models = [];
//    #[Url]
    public array $selected_mileage = [];
//    #[Url]
    public array $selected_electric_cars = [];


    public $search;
    public $priceRange = 10;
    public  $min_price = 0;
    public  $max_price = 10;
    public int $booking_day = 0;
    public int $total_cars = 0;
    public int $total_booking = 0;
    public Region $location;



    #[Computed]
    public bool $loading = false;

    public array $filters = [
        'car_specs' => [
            'Air conditioning',
            '4+ door',
        ],
        'electric_cars' => [
            'fully_electric',
            'hybrid',
            'plug_in_hybrid',
        ],
        'mileage' => [
            'limited',
            'unlimited',
        ],
        'transmissions' => [
            'automatic',
            'manual',
        ],
    ];


    public function updatedSearch(){
        dd($this->max_price);
    }
//    public function updatedPriceRange(){
////        list($min, $max) = explode(',', $this->priceRange);
//        dd($this->priceRange);
//    }

    public function mount(){

        $location_id = request()->query('pick_up_location_id');
        $this->booking_day = request()->query('booking_day');
//        $this->location = Region::findOrFail($location_id);
//        $this->total_cars = Car::select('region_id')->where('region_id', $location_id)->count();
//        $this->total_booking = Booking::select('region_id')->where('region_id', $location_id)->count();


        $this->location = Region::withCount(['cars', 'bookings'])->findOrFail($location_id);

        $this->total_cars = $this->location->cars_count;
        $this->total_booking = $this->location->bookings_count;
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


        $filteredCars = Car::query();

        $filteredCars->where('region_id', $this->location->id)->where('is_available', true);

        $this->filters['car_types'] = array_unique($filteredCars->pluck('type')->toArray());

        $this->filters['car_makes'] = array_unique($filteredCars->pluck('make')->toArray());
        $this->filters['car_models'] = array_unique($filteredCars->pluck('model')->toArray());

        $this->min_price = $filteredCars->min('price_per_day');
//        $this->priceRange = $filteredCars->min('price_per_day');
        $this->max_price = $filteredCars->max('price_per_day');


        $filteredCars->whereBetween('price_per_day', [$this->priceRange, $this->max_price]);

        $filteredCars->when(count($this->selected_transmissions) > 0, function ($query) {
//            dd($this->selected_transmissions);
//            sleep(14);

            $query->whereIn('gear', $this->selected_transmissions);
        });

        $filteredCars->when(count($this->selected_car_makes) > 0, function ($query) {
//            dd($this->selected_car_makes);
            $query->whereIn('make', $this->selected_car_makes);
        });

        $filteredCars->when(count($this->selected_car_models) > 0, function ($query) {
            $query->whereIn('model', $this->selected_car_models);
        });

        $filteredCars->when(count($this->selected_car_types) > 0, function ($query) {
            $query->whereIn('type', $this->selected_car_types);
        });

        $filteredCars->when(count($this->selected_mileage) > 0, function ($query) {
            if(in_array('unlimited', $this->selected_mileage)){
                $query->where('mileage', 0);
            }

//            if(in_array('limited', $this->selected_mileage)){
//                $query->orWhere('mileage', '>', 0);
//            }

        });

        $filteredCars->when(count($this->selected_car_specs) > 0, function ($query) {
            if (in_array('4+ door', $this->selected_car_specs)) {
                $query->where('door', '>', 3);
            }

//            if (in_array('Air Conditioning', $this->selected_car_specs)) {
//                $query->orWhere('air_condition', 1);
//            }

        });



        $filteredCars->when(count($this->selected_electric_cars) > 0, function ($query) {
            $query->whereIn('fuel_type', $this->selected_electric_cars);
        });




        $filteredCars = $filteredCars->paginate(4);




        $this->loading = false;

        return view('livewire.car-listing',  compact('filteredCars','services'));
    }

    public function filterHeading($title): string
    {
        return 'title';
    }
}
