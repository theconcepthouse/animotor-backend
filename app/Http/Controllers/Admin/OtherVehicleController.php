<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\DriverForm;
use App\Models\User;
use App\Models\VehicleMileage;
use Illuminate\Http\Request;

class OtherVehicleController extends Controller
{

    public function mileage()
    {
        $data = VehicleMileage::all();
//        $form = DriverForm::where('driver_id', $data->user_id)->first();
        return view('admin.othervehicle.mileage', compact('data', ));
    }

    public function vehicleInspection()
    {
        $data = \Modules\AdvanceRental\Entities\VehicleInspection::all();
        return view('admin.othervehicle.vehicle-inspectioon', compact('data'));
    }





}
