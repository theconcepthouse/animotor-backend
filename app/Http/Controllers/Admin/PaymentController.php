<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Rate;
use App\Models\User;
use Illuminate\Http\Request;

class PaymentController extends Controller
{

    public function paymentHistory($driverId)
    {
        $driver = User::findOrFail($driverId);
        $payments = Payment::where('driver_id', $driver->id)->get();
        $rates = Rate::where('driver_id', $driver->id)->where('payment_item', 1)->get();

        return view('admin.driver.others.payment-history', compact('driver', 'payments', 'rates'));
    }
    public function savePayment(Request $request)
    {

        $validated = $request->validate([
            'payment_id' => 'required|uuid',
            'driver_id' => 'required|uuid',
            'due_date' => 'nullable|date',
            'amount' => 'nullable|numeric',
            'received_date' => 'nullable|date',
            'received_amount' => 'nullable|numeric',
            'balance' => 'nullable|numeric',
            'late_payment_days' => 'nullable|integer',
        ]);

        // Check if payment_id is provided to determine create or update
        if (!empty($validated['payment_id'])) {
            $payment = Payment::findOrFail($validated['payment_id']);
            $payment->update($validated);
            $message = 'Payment updated successfully.';
        } else {
            Payment::create($validated);
            $message = 'Payment created successfully.';
        }
        return redirect()->back()->with('message', $message);
    }

    public function RateItem(Request $request, $driverId)
    {

        $validated = $request->validate([
            'payment_name' => 'required|string',
            'payment_unit' => 'required|numeric',
            'payment_price' => 'required|numeric',
            'payment_paid' => 'nullable|numeric',
        ]);

        $validated['driver_id'] = $driverId;
        $validated['payment_item'] = 1;
        $itemId = $request->item_id;

        $rate = Rate::where('driver_id', $driverId)->where('id', $itemId)->first();
        if($rate)
        {
            $rate->update($validated);
            return redirect()->back()->with('success', 'Payment item updated successfully.');
        }

       Rate::create($validated);
       return redirect()->back()->with('success', 'Payment item created successfully.');

    }

}
