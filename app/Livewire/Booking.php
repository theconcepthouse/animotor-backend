<?php

namespace App\Livewire;

use App\Models\Region;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Booking extends Component
{

    public string $pick_up_location = "";
    public ?string $pick_up_location_id = null;
    public string $drop_off_location = "";
    public ?string $drop_off_location_id = null;
    public string $pick_up_date;
    public  $pick_up_time;
    public string $drop_off_date;
    public $drop_off_time;
    public $booking_day;
    public string $aged;




    #[Computed]
    public $drop_off_locations = [];

    #[Computed]
    public $pickup_locations = [];

    #[Computed]
    public bool $show_booking = true;

    #[Computed]
    public bool $has_request = false;




    public $showdiv = false;
    public $search = "";
    public $records;
    public $city;
    public $state;
    public $empDetails;

    public function mount(){

        $query = request()->query();

        if(request()->has('pick_up_location_id')){
            $this->has_request = true;
            $this->pick_up_location = request()->query('pick_up_location');
            $this->pick_up_location_id = request()->query('pick_up_location_id');
            $this->drop_off_location = request()->query('drop_off_location');
            $this->drop_off_location_id = request()->query('drop_off_location_id');
            $this->pick_up_date = request()->query('pick_up_date');
            $this->pick_up_time = request()->query('pick_up_time');
            $this->drop_off_date = request()->query('drop_off_date');
            $this->drop_off_time = request()->query('drop_off_time');

            $this->show_booking = false;
            $this->booking_day = request()->query('booking_day');
        }else{
            $time = Carbon::now()->addHours(4)->setMinute(0)->format('H:i');

            $date = Carbon::now()->addHours(2)->setMinute(0)->format('Y-m-d');

            $this->pick_up_time = $time;
            $this->drop_off_time =  $time;
            $this->drop_off_date =  Carbon::now()->addDays(2)->setMinute(0)->format('Y-m-d');
            $this->pick_up_date =  $date;

        }


    }

    public function toggleSearch(){
        $this->show_booking = true;
    }

    // Fetch records
    public function searchResult(){

        if(!empty($this->search)){

            $this->records = Region::withoutAirport()->orderby('name','asc')
                ->select('*')
                ->where('name','like','%'.$this->search.'%')
                ->limit(5)
                ->get();

            $this->showdiv = true;
        }else{
            $this->showdiv = false;
        }
    }


    public function updatedPickUpLocation()
    {
        if (strlen($this->pick_up_location) >= 3) {
            $this->fetchLocations('pick_up');
        } else {
            $this->pickup_locations = [];
        }
    }

    public function updatedDropOffLocation()
    {
        // Call Google Places API to get suggestions
        if (strlen($this->drop_off_location) >= 3) { // Minimum length for search

            $this->fetchLocations('drop_off');
        } else {
            $this->drop_off_locations = [];
        }
    }

    public function fetchLocations($type)
    {
        $response = Http::get('https://maps.googleapis.com/maps/api/place/autocomplete/json', [
            'input' => $type == 'pick_up' ? $this->pick_up_location : $this->drop_off_location,
            'components' => 'country:gb',
            'key' => env('GOOGLE_MAPS_API_KEY'),
        ]);

        if ($response->successful()) {
            $filtered_predictions = $response->json()['predictions'];



            if($type == 'pick_up'){
                $this->pickup_locations = $filtered_predictions;
            }else{

                $this->drop_off_locations = $filtered_predictions;
            }


        } else {
            if($type == 'pick_up'){
                $this->pickup_locations = [];
            }else{
                $this->drop_off_locations = [];
            }
        }
    }

    public function selectLocation($place_id, $place, $type)
    {
        if($type == 'drop_off'){
            $this->drop_off_location = $place;
            $this->drop_off_locations = [];

        }else{
            $this->pick_up_location = $place;
            $this->pickup_locations = [];
        }
        $this->fetchPlaceDetails($place_id, $type);
    }



    public function fetchPlaceDetails($placeId, $type)
    {
        $this->city = '';

        $response = Http::get('https://maps.googleapis.com/maps/api/place/details/json', [
            'place_id' => $placeId,
            'key' => env('GOOGLE_MAPS_API_KEY'),
        ]);

        if ($response->successful()) {
            $result = $response->json()['result'];

            // Extracting city and state
            foreach ($result['address_components'] as $component) {
                if (in_array('locality', $component['types'])) {
                    $this->city = $component['long_name']; // City
                }
                if (in_array('administrative_area_level_1', $component['types'])) {
                    $this->state = $component['long_name']; // State
                }
            }

          $region = Region::withoutAirport()->orderby('name', 'asc')
              ->where('name', 'like', '%' . $this->city . '%')
              ->orWhere('cities', 'like', '%' . $this->city . '%')
                ->first();

//            dd($region);

            $field = $type === 'pick_up'
                ? 'pick_up_location'
                : 'drop_off_location';

            if ($region) {
                // clear any previous error on this field
                $this->resetErrorBag($field);

                // set the corresponding *_location_id
                if ($type === 'pick_up') {
                    $this->pick_up_location_id = $region->id;
                } else {
                    $this->drop_off_location_id = $region->id;
                }
            } else {
                // inject a validation error on the right field
                $this->addError($field, 'Address not supported');
                // ensure the ID is null so save() validation will also catch it
                if ($type === 'pick_up') {
                    $this->pick_up_location_id = null;
                } else {
                    $this->drop_off_location_id = null;
                }
            }


        }


    }


    public function updatedPickUpDate(){
//        dd($this->pick_up_date);
    }




    public function save()
    {

        try {
            $validatedData = $this->validate([
                'pick_up_location_id' => 'required',
                'drop_off_location_id' => 'required',
                'pick_up_location' => 'required',
                'drop_off_location' => 'required',
                'pick_up_time' => 'required',
                'drop_off_time' => 'required',
                'pick_up_date' => 'required|date|after_or_equal:today',
                'drop_off_date' => 'required|date|after_or_equal:today|after_or_equal:pick_up_date',

            ]);

            $startDate = Carbon::parse($validatedData['pick_up_date']);
            $endDate = Carbon::parse($validatedData['drop_off_date']);

            $validatedData['booking_day']  = $endDate->diffInDays($startDate) + 1;

            return redirect()->route('search', $validatedData);
        }catch (\Exception $exception){
            $this->dispatch('booking-error', message: 'Please enter valid booking address information before proceeding');
        }


    }


    public function render()
    {

        return view('livewire.booking');
    }
}
