<?php

namespace App\Livewire;

use App\Models\Country;
use App\Models\Region;
use Carbon\Carbon;
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
        }

        $time = Carbon::now()->addHours(4)->setMinute(0)->format('H:i');

        $date = Carbon::now()->addHours(2)->setMinute(0)->format('Y-m-d');

        $this->pick_up_time = $time;
        $this->drop_off_time =  $time;
        $this->drop_off_date =  Carbon::now()->addDays(2)->setMinute(0)->format('Y-m-d');
        $this->pick_up_date =  $date;

    }

    public function toggleSearch(){
        $this->show_booking = true;
    }

    // Fetch records
    public function searchResult(){

        if(!empty($this->search)){

            $this->records = Region::orderby('name','asc')
                ->select('*')
                ->where('name','like','%'.$this->search.'%')
                ->limit(5)
                ->get();

            $this->showdiv = true;
        }else{
            $this->showdiv = false;
        }
    }

    public function setLocation($type, $id, $name){

        if($type == 'pick_up'){
            $this->pickup_locations = [];
            $this->pick_up_location_id = $id;
            $this->pick_up_location = $name;
        }
        if($type == 'drop_off'){
            $this->drop_off_locations  = [];
            $this->drop_off_location_id = $id;
            $this->drop_off_location = $name;
        }
    }

    public function updatedPickUpDate(){
//        dd($this->pick_up_date);
    }
    public function updatedPickUpLocation(){
        if(strlen($this->pick_up_location) >= 1) {
            $this->pickup_locations = Region::orderby('name', 'asc')->where('name', 'like', '%' . $this->pick_up_location . '%')
                ->limit(5)->get();
        }else{
            return [];
        }
    }

    public function updatedDropOffLocation(){
        if(strlen($this->drop_off_location) >= 1) {
            $this->drop_off_locations = Region::orderby('name', 'asc')->where('name', 'like', '%' . $this->drop_off_location . '%')
                ->limit(5)->get();
        }else{
            return [];
        }
    }


    public function save()
    {

        $validatedData = $this->validate([
            'pick_up_location_id' => 'required',
            'drop_off_location_id' => 'required',
            'pick_up_location' => 'required',
            'drop_off_location' => 'required',
            'pick_up_time' => 'required',
            'pick_up_date' => 'required|date|after_or_equal:today',
            'drop_off_date' => 'required|date|after:today|after:pick_up_date',

        ]);

        $startDate = Carbon::parse($validatedData['pick_up_date']);
        $endDate = Carbon::parse($validatedData['drop_off_date']);

        $validatedData['booking_day']  = $endDate->diffInDays($startDate);

        return redirect()->route('search', $validatedData);

    }


    public function render()
    {

        return view('livewire.booking');
    }
}
