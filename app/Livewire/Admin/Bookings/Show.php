<?php

namespace App\Livewire\Admin\Bookings;

use App\Models\Booking;
use Livewire\Component;

class Show extends Component
{
    public Booking $booking;

    public $status;

    public function mount(Booking $booking_item){
        $this->booking = $booking_item;
    }
    public function render()
    {
        return view('livewire.admin.bookings.show');
    }

    public function confirmBooking()
    {

//        return $this->js(
//            "alert('hello')"
//        );



        $this->dispatch('openConfirmModal', 'Delete User', 'Are you sure you want to delete this user?', 'deleteUser', ['999']);

    }

//
//    public function confirmBooking(){
//        dd($this->booking->id);
//    }


}
