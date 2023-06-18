<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VehicleMake;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class VehicleMakeController extends Controller
{
    public function index()
    {
        $data = VehicleMake::paginate(100);
        $title = "Vehicle makes listing";
        return view('admin.vehicle.makes', compact('data','title'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $this->validateData($request);

        VehicleMake::create($validatedData);

        return redirect()->back()->with('success', 'Vehicle make created successfully.');
    }


    public function update(Request $request, $id): RedirectResponse
    {
        $make = VehicleMake::findOrFail($id);
        $validatedData = $this->validateData($request);

        $make->update($validatedData);

        return redirect()->back()->with('success', 'Vehicle make updated successfully.');
    }

    public function destroy(VehicleMake $service): RedirectResponse
    {
        $service->delete();

        return redirect()->back()->with('success', 'Vehicle make deleted successfully.');
    }

    private function validateData(Request $request): array
    {
        $rules = [
            'name' => 'required',
            'make_for' => 'required',
        ];

        return $request->validate($rules);
    }
}
