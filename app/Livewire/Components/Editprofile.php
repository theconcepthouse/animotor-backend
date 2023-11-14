<?php

namespace App\Livewire\Components;

use App\Models\Country;
use Livewire\Component;

class Editprofile extends Component
{
    public $first_name;
    public $last_name;
    public $phone;
    public $country;
    public $city;
    public $address;
    public $id;
    public $countries;

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
                'email' => $user->email,
                'id' => $user->id,
            ]);
        }
        $this->countries = Country::all();
        $this->country = $this->countries?->first()?->name;
    }

    public function submit()
    {
        $validated = $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'country' => 'required',
            'city' => 'required',
            'phone' => 'required|unique:users,phone,' . $this->id,
        ]);

        $user = auth()->user();
        $user->update($validated);

        return redirect()->route('profile')->with('success','Profile updated');
    }

    public function render()
    {
        return view('livewire.components.editprofile');
    }
}
