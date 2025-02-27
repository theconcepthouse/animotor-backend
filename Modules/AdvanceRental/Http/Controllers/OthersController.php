<?php

namespace Modules\AdvanceRental\Http\Controllers;

use App\Models\Booking;
use App\Models\DriverForm;
use Illuminate\Support\Facades\Auth;

class OthersController
{

    public function changeAddress($bookingId)
    {
        $booking = Booking::findOrFail($bookingId);
        $form = DriverForm::where('driver_id', $booking->customer_id)->first();
        $user = Auth::user();
        return view('advancerental::others.change_of_address', compact('form', 'user', 'booking'));
    }

}
