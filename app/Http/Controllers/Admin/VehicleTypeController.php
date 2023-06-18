<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VehicleType;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class VehicleTypeController extends Controller
{
    public function index()
    {
        $data = VehicleType::paginate(100);
        $title = "Vehicle types listing";
        return view('admin.vehicle.types', compact('data','title'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $this->validateData($request);

        VehicleType::create($validatedData);

        return redirect()->back()->with('success', 'Vehicle type created successfully.');
    }


    public function update(Request $request, $id): RedirectResponse
    {
        $make = VehicleType::findOrFail($id);
        $validatedData = $this->validateData($request);

        $make->update($validatedData);

        return redirect()->back()->with('success', 'Vehicle type updated successfully.');
    }

    public function destroy(VehicleType $service): RedirectResponse
    {
        $service->delete();

        return redirect()->back()->with('success', 'Vehicle type deleted successfully.');
    }

    private function validateData(Request $request): array
    {
        $rules = [
            'name' => 'required',
            'icon' => 'required',
        ];

        return $request->validate($rules);
    }
}
