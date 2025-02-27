<?php

namespace Modules\AdvanceRental\Http\Controllers;

use App\Models\Booking;
use App\Models\DriverForm;
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

}
