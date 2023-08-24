<?php

namespace App\Livewire\Admin\Cars;

use App\Models\Booking;
use Livewire\Component;
use Livewire\WithPagination;

class Bookings extends Component
{
    use WithPagination;
    public string $car_id;

    public function render()
    {
        $data = Booking::paginate(10);
//        $data = Booking::where('car_id',$this->car_id)->paginate(10);

        return view('livewire.admin.cars.bookings', ['bookings' => $data]);
    }
}
