<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::latest()->paginate(100);
        return view('admin.vehicle.index', compact('vehicles'));
    }

    public function create()
    {
        return view('admin.vehicle.create');
    }

    public function edit($vehicleId)
    {
        $vehicle = Vehicle::find($vehicleId);
        return view('admin.vehicle.edit', compact('vehicle'));
    }

    public function destroy($vehicleId)
    {
        $vehicle = Vehicle::find($vehicleId);
        $vehicle->delete();
        return redirect()->back()->with('success', 'Vehicle deleted successfully');
    }

    public function vehicleStatus(Request $request)
    {
        $vehicleId = $request->vehicle_id;
        $vehicle = Vehicle::findOrFail($vehicleId);
        $vehicle->status = $request->status;
        $vehicle->save();
        return redirect()->back()->with('success', 'Status Updated successfully.');
    }
}
