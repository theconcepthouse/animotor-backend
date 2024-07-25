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
        $rates = Rate::where('driver_id', $driver->id)->get();

        $rateItems = [];
        foreach ($rates as $rate) {
            $rateItems[] = [
                'rate' => $rate,
                'other_items' => $rate->other_items
            ];
        }
        return view('admin.driver.others.payment-history', compact('driver', 'payments', 'rateItems'));
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

     public function addPaymentItem(Request $request)
    {

        $validated = request()->validate([
            'other_items' => 'required|array',
            'items.*.item' => 'nullable|string',
            'items.*.units' => 'required|integer',
            'items.*.price' => 'required|integer',
        ]);

        $validated['driver_id'] = $request->get('driver_id');
        Rate::create($validated);
        return redirect()->back()->with('success', 'Payment item created successfully.');
    }

}
