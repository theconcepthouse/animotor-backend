<?php

namespace Modules\AdvanceRental\Http\Controllers;

use App\Models\Booking;
use App\Models\DriverForm;
use App\Models\VehicleMileage;
use Illuminate\Http\Request;
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

    public function storeChangeAddress(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'change_address.address_effective_date' => 'required|date',
            'change_address.phone_effective_date' => 'nullable|date',
            'change_address.email_effective_date' => 'nullable|date',
            'change_address.emergency_contact_name' => 'nullable|string|max:255',
            'change_address.emergency_address_line_01' => 'nullable|string|max:255',
            'change_address.emergency_address_line_02' => 'nullable|string|max:255',
            'change_address.emergency_town_city' => 'nullable|string|max:255',
            'change_address.emergency_postcode' => 'nullable|string|max:255',
            'change_address.emergency_effective_date' => 'nullable|date',
            'change_address.email' => 'nullable|string',
            'change_address.phone' => 'nullable|string',
            'change_address.address_line' => 'nullable|string',
            'change_address.address_line_2' => 'nullable|string',
            'change_address.country' => 'nullable|string',
            'change_address.city' => 'nullable|string',
        ]);

        // Find the DriverForm record for the current driver
        $driverId = $request->input('driver_id');
        $form = DriverForm::where('driver_id', $driverId)->first();

        if ($form) {
            // Update the change_address fields
            $form->change_address = [
                'address_effective_date' => $validatedData['change_address']['address_effective_date'],
                'phone_effective_date' => $validatedData['change_address']['phone_effective_date'] ?? null,
                'email_effective_date' => $validatedData['change_address']['email_effective_date'] ?? null,
                'emergency_contact_name' => $validatedData['change_address']['emergency_contact_name'] ?? null,
                'emergency_address_line_01' => $validatedData['change_address']['emergency_address_line_01'] ?? null,
                'emergency_address_line_02' => $validatedData['change_address']['emergency_address_line_02'] ?? null,
                'emergency_town_city' => $validatedData['change_address']['emergency_town_city'] ?? null,
                'emergency_postcode' => $validatedData['change_address']['emergency_postcode'] ?? null,
                'emergency_effective_date' => $validatedData['change_address']['emergency_effective_date'] ?? null,
                'email' => $validatedData['change_address']['email'] ?? null,
                'phone' => $validatedData['change_address']['phone'] ?? null,
                'address_line' => $validatedData['change_address']['address_line'] ?? null,
                'address_line_2' => $validatedData['change_address']['address_line_2'] ?? null,
                'country' => $validatedData['change_address']['country'] ?? null,
                'city' => $validatedData['change_address']['city'] ?? null,
            ];

            // Save the updated form
            $form->save();

            // Redirect back with a success message
            return redirect()->back()->with('success', 'Change of address details updated successfully.');
        } else {
            // Handle the case where the DriverForm record does not exist
            return redirect()->back()->with('error', 'Driver form not found.');
        }
    }

    public function createMileage($bookingId)
    {
        $booking = Booking::findOrFail($bookingId);
        $form = DriverForm::where('driver_id', $booking->customer_id)->first();
        $user = Auth::user();
        return view('advancerental::others.view_mileage', compact('form', 'user', 'booking'));
    }


    public function storeMileage(Request $request)
    {
        $validatedData = $this->validateData($request);
        VehicleMileage::create($validatedData);
        return redirect()->back()->with('success', 'Vehicle mileage successfully submitted.');
    }

    public function storeMileage2(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'mileage.last_recorded_mileage' => 'required|string|max:255',
            'mileage.submitted_by' => 'required|string|max:255',
            'mileage.submission_date' => 'required|date',
            'mileage.enter_mileage' => 'required|string|max:255',
            'mileage.image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Find the DriverForm record for the current driver
        $driverId = $request->input('driver_id');
        $form = DriverForm::where('driver_id', $driverId)->first();

        if ($form) {
            // Handle image upload

            if ($form) {
                // Update the mileage fields
                $form->mileage = [
                    'last_recorded_mileage' => $validatedData['mileage']['last_recorded_mileage'],
                    'submitted_by' => $validatedData['mileage']['submitted_by'],
                    'submission_date' => $validatedData['mileage']['submission_date'],
                    'enter_mileage' => $validatedData['mileage']['enter_mileage'],
                    'image' => $validatedData['mileage']['image'],
                ];

                // Save the updated form
                $form->save();

                return redirect()->back()->with('success', 'Mileage details updated successfully.');
            } else {
                // Handle the case where the DriverForm record does not exist
                return redirect()->back()->with('error', 'Driver form not found.');
            }
        }
    }


    function validateData(Request $request): array
    {
        $rules = [
            'booking_id' => 'required',
            'car_id' => 'required',
            'mileage.*' => 'required',
        ];

        return $request->validate($rules);
    }

}
