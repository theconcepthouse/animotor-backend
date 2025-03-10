<?php

namespace Modules\AdvanceRental\Http\Controllers;

use App\Models\Booking;
use App\Models\DriverForm;
use App\Models\MonthlyMaintenace;
use App\Models\MonthlyRepair;
use App\Models\VehicleMileage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function Symfony\Component\String\b;

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
        $mileage = VehicleMileage::where('booking_id', $booking->id)->latest()->first();

        $form = DriverForm::where('driver_id', $booking->customer_id)->first();
        $user = Auth::user();
        $sum_mileage = VehicleMileage::where('booking_id', $booking->id)
            ->sum(DB::raw("JSON_UNQUOTE(JSON_EXTRACT(mileage, '$.mileage'))"));

        return view('advancerental::others.view_mileage', compact('mileage', 'user', 'booking', 'form', 'sum_mileage'));
    }

    public function storeMileage(Request $request)
    {
        $validatedData = $this->validateData($request);
        $validatedData['user_id'] = Auth::id();
        VehicleMileage::create($validatedData);
        return redirect()->back()->with('success', 'Vehicle mileage successfully submitted.');
    }


    function validateData(Request $request): array
    {
        $rules = [
            'booking_id' => 'required',
            'car_id' => 'required',
            'mileage.*' => 'nullable',
        ];

        return $request->validate($rules);
    }

    public function createMM($bookingId)
    {
        $booking = Booking::findOrFail($bookingId);
        $user = Auth::user();
        return view('advancerental::others.monthly_maintenance', compact('booking', 'user'));
    }

    public function storeMonthlyMaintenance(Request $request)
    {
        $validatedData = $request->validate([
            'booking_id' => 'required',
            'car_id' => 'required',
            'inspection.*' => 'nullable',
        ]);

        $bookingId = $request->input('booking_id');
        $validatedData['user_id'] = Auth::id();

        // Check if an ID is provided in the request and a record exists
        if ($request->has('id') && MonthlyMaintenace::find($request->input('id'))) {
            // Update existing record
            $data = MonthlyMaintenace::find($request->input('id'));
            $data->update($validatedData);
            $message = 'Monthly maintenance successfully updated.';
        } else {
            // Create new record
            $data = MonthlyMaintenace::create($validatedData);
            $message = 'Monthly maintenance successfully submitted.';
        }

        return redirect()
            ->route('createMonthlyRepair', ['id' => $data->id, 'bookingId' => $bookingId])
            ->with('success', $message);
    }

    public function createMonthlyRepair($id, $bookingId)
    {
        $booking = Booking::findOrFail($bookingId);
        $monthly_main = MonthlyMaintenace::findOrFail($id);
        $data = MonthlyRepair::where('monthly_maintenaces_id', $monthly_main->id)->get();
        return view('advancerental::others.monthly_repair', compact('monthly_main', 'data', 'booking'));
    }

    public function storeMonthlyRepair(Request $request)
    {
        $validatedData = $request->validate([
            'monthly_maintenaces_id' => 'required',
            'repairs.*' => 'nullable',
        ]);

        MonthlyRepair::create($validatedData);
        return redirect()->back()->with('success', 'Monthly maintenance successfully submitted.');
    }


}
