<?php

namespace App\Livewire;

use Livewire\Component;

class ContactUs extends Component
{
    public $first_name;
    public $last_name;
    public $email;
    public $message;


    public function render()
    {
        return view('livewire.contact-us');
    }

    public function save(){
        $validated = $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);



    }
}
