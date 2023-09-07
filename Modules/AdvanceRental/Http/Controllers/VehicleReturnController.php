<?php

namespace Modules\AdvanceRental\Http\Controllers;

use App\Models\Booking;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\View\View;
use Modules\AdvanceRental\Entities\CarDamageReport;
use Modules\AdvanceRental\Entities\VehicleInspection;
use Modules\AdvanceRental\Entities\VehicleReturn;

class VehicleReturnController extends Controller
{
    public function returnVehicle($id)
    {
        $booking = Booking::findOrFail($id);
        $return = VehicleReturn::where('booking_id',$id)->first();
        return view('advancerental::return_vehicle', compact('booking', 'return'));
    }
    public function documents($id)
    {
        $booking = Booking::findOrFail($id);
        $inspections = VehicleInspection::where('booking_id', $id)->get();
        return view('advancerental::documents', compact('booking','inspections'));
    }

    public function vehicleReturnStore(Request $request)
    {
        $request->validate([
            'return_date_time' => 'required',
            'reason' => 'required',
            'booking_id' => 'required|exists:bookings,id',
        ]);

        $return = VehicleReturn::where('booking_id', $request->booking_id)->first();
        $booking_id = $request->input('booking_id');
        if(!$return){
            $return = VehicleReturn::create([
                'booking_id' => $request->booking_id,
                'car_id' => $request->car_id,
                'reason' => $request->reason,
                'return_date_time' => $request->return_date_time,
            ]);
        }
        return redirect()->route('vehicle_return.car_damage_report', ['booking_id' => $booking_id,'return_id' =>  $return->id]);
    }

    public function vehicleReturnCarDamageReport($booking_id, $return_id){
        $booking = Booking::findOrFail($booking_id);
        $car_id = $booking->car_id;
        $carDamageReport = CarDamageReport::where('booking_id',$booking_id)->where('return_id', $return_id)->first();
        return view('advancerental::car_damage_report', compact('booking','booking_id','return_id','car_id', 'carDamageReport'));
    }

    public function vehicleReturnDamageReportImages($id){

        $carDamageReport = CarDamageReport::findOrFail($id);
        if(!$carDamageReport->images){
            $images = [
                'front_bumper_including_highlights' => '' ,
                'bonnet' => '' ,
                'driver_side_front_wing_including_wing_mirror' => '' ,
                'driver_side_front_door' => '' ,
                'driver_side_rear_door' => '' ,
                'driver_side_rear_quarter_panel' => '' ,
                'rear_bumper_including_back_lights' => '' ,
                'boot' => '' ,
                'passenger_side_quarter_panel' => '' ,
                'rear_passenger_side_tyre_including_wheel' => '' ,
                'passenger_side_rear_door' => '' ,
                'passenger_side_front_door' => '' ,
                'passenger_front_wing_door_mirror' => '' ,
                'front_diver_side_tyre_including_wheel' => '' ,
                'front_passenger_side_tyre_including_wheel' => '' ,
                'rear_driver_side_tyre_including_wheel' => '' ,
                'odometer' => '' ,
                'dashboard' => '' ,
            ];
        }else{
            $images = $carDamageReport->images;
        }
        return view('advancerental::car_damage_report_images', compact( 'carDamageReport','images'));
    }

    public function vehicleReturnDamageReportImageStore(Request $request){

        $request->validate([
            'images.*' => 'required',
            'car_damage_report_id' => 'required'
        ]);

        $car_report_id = $request->input('car_damage_report_id');

        $report = CarDamageReport::findOrFail($car_report_id);

        $report->update(
            ['images' => $request->input('images')]
        );

        return redirect()->route('vehicle_return.damage_report_images', $car_report_id)->with('success','Images successfully updated');
    }
}
