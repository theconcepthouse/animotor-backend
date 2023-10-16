<?php

namespace App\Livewire;

use App\Models\Booking;
use App\Models\Car;
use App\Models\Country;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Checkout extends Component
{
    public $first_name;
    public $last_name;
    public $address;
    public $country;
    public $city;
    public string $is_business_booking = 'no';
    public $phone;
    public $email;
    public $password;
    public $booking_type;

    public $countries;
    public $car;
    public $booking_day;

    public $reference;
    public $pick_up_date;
    public $pick_up_time;
    public $drop_off_date;
    public $drop_off_time;
    public $pick_location;
    public $drop_off_location;
    public $region_id;
    public $car_id;

    public function checkout(){
        $validated = $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'country' => 'required',
            'city' => 'required',
            'phone' => 'required',
        ]);

        if(!auth()->check()){
            $this->validate([
                'password' => 'required',
                'email' => 'required|unique:users',
                'phone' => 'required|unique:users',
                ]);

            $validated['password'] = $this->password;
            $validated['email'] = $this->email;

            $user = User::create($validated);

            $role = Role::where('name', 'rider')->first();

            $user->addRole($role);

            Auth::login($user);

//            return $this->redirect()
        }else{
            $user = auth()->user();
        }

        $tax = ($this->car->price_per_day * $this->booking_day) * settings('tax',0.075);

        $data['customer_id'] = $user->id;
        $data['region_id'] = $this->region_id;
        $data['car_id'] = $this->car->id;
        $data['fee'] =  $this->car->price_per_day * $this->booking_day;

        if($this->booking_type == 'with_full_protection'){
            $data['insurance_fee'] = $this->car?->insurance_fee;
        }else{
            $data['insurance_fee'] = 0;
        }

        $data['tax'] =  $tax;

        $data['grand_total'] =  $data['fee'] + $tax + $data['insurance_fee'];


        $data['reference'] = getUniqueReferenceCode();

        $data['booking_number'] = getUniqueBookingNumber();

        $data['payment_status'] = 'unpaid';

        $data['payment_method'] = 'cash';

        $data['pick_up_date'] = $this->pick_up_date;
        $data['booking_type'] = $this->booking_type;
        $data['pick_up_time'] = $this->pick_up_time;
        $data['drop_off_date'] = $this->drop_off_date;
        $data['drop_off_time'] = $this->drop_off_time;
        $data['pick_location'] = $this->pick_location;
        $data['drop_off_location'] = $this->drop_off_location;


        $booking = Booking::create($data);

        if($booking){

//            $this->car->is_available = false;

            $this->car->save();
        }

        return redirect()->route('booking', ['id' => $booking->id])->with('success','Booking successfully submitted, please proceed to payment');


    }

    public function mount(){
        if(auth()->check()){
            $user = auth()->user();
            $this->fill([
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'address' => $user->address,
                'country' => $user->country,
                'city' => $user->city,
                'phone' => $user->phone,
                'email' => $user->email
            ]);
        }
        $this->countries = Country::all();
        $this->country = $this->countries?->first()?->name;
        $this->car = Car::findOrFail(request()->query('car_id'));
        $this->booking_day = request()->query('booking_day');
        $this->pick_up_date = request()->query('pick_up_date');
        $this->pick_up_time = request()->query('pick_up_time');
        $this->drop_off_date = request()->query('drop_off_date');
        $this->drop_off_time = request()->query('drop_off_time');
        $this->pick_location = request()->query('pick_up_location');
        $this->drop_off_location = request()->query('drop_off_location');
        $this->region_id = request()->query('region_id');
        $this->booking_type = request()->query('book_type');
    }

    public function render()
    {
        if(auth()->check()){
            $user = auth()->user();
        }else{
            $user = null;
        }

        return view('livewire.checkout', compact('user'));
    }
}
