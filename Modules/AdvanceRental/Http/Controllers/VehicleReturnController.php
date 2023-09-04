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
            'booking_id' => 'required|exists:bookings,id',
        ]);

        $return = VehicleReturn::where('booking_id', $request->booking_id)->first();
        $booking_id = $request->input('booking_id');
        if(!$return){
            $return = VehicleReturn::create([
                'booking_id' => $request->booking_id,
                'reason' => $request->reason,
                'date_time' => $request->date_time,
            ]);
        }
        return redirect()->route('vehicle_return.car_damage_report', ['booking_id' => $booking_id,'return_id' =>  $return->id]);
    }

    public function vehicleReturnCarDamageReport($booking_id, $return_id){
        return $return_id;
    }
}
