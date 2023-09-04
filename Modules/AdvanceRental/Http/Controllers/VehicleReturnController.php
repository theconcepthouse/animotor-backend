<?php

namespace Modules\AdvanceRental\Http\Controllers;

use App\Models\Booking;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\AdvanceRental\Entities\VehicleReturn;

class VehicleReturnController extends Controller
{
    public function returnVehicle($id)
    {
        $booking = Booking::findOrFail($id);
        $return = VehicleReturn::where('booking_id',$id);
        return view('advancerental::return_vehicle', compact('booking', 'return'));
    }

    public function vehicleReturnStore(Request $request)
    {
        $request->validate([
            'date_time' => 'required',
            'reason' => 'required',
            'booking_id' => 'required',
        ]);

        $return = VehicleReturn::where('booking_id',$id);
        return view('advancerental::return_vehicle', compact('booking', 'return'));
    }
}
