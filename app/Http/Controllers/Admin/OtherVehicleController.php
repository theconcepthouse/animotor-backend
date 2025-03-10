<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\DriverForm;
use App\Models\MonthlyMaintenace;
use App\Models\MonthlyRepair;
use App\Models\User;
use App\Models\VehicleMileage;
use Illuminate\Http\Request;

class OtherVehicleController extends Controller
{

    public function mileage()
    {
        $data = VehicleMileage::all();
        return view('admin.othervehicle.mileage', compact('data', ));
    }

    public function vehicleInspection()
    {
        $data = \Modules\AdvanceRental\Entities\VehicleInspection::all();
        return view('admin.othervehicle.vehicle-inspectioon', compact('data'));
    }

    public function updateMileageStatus(Request $request)
    {
        $mileageId = $request->input('mileageId');
        $milage = VehicleMileage::find($mileageId);
        $milage->status = $request->input('status');
        $milage->save();
        return redirect()->back()->with('success', 'Mileage Status successfully updated.');
    }

    public function viewMonthlyRepairs($id)
    {
        $data = MonthlyMaintenace::findOrFail($id);
        $repairs = MonthlyRepair::where('monthly_maintenaces_id', $data->id)->get();
        return view('admin.driver.driver-form.monthly-maintenance-details', compact('data', 'repairs'));
    }
    public function updateMMStatus(Request $request, $id)
    {
        $milage = MonthlyMaintenace::find($id);
        $milage->status = $request->input('status');
        $milage->save();
        return redirect()->back()->with('success', 'Status successfully updated.');
    }








}
