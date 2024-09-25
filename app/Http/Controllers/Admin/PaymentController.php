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
        $payments = Payment::where('driver_id', $driver->id)->latest()->get();
        $rates = Rate::where('driver_id', $driver->id)->where('payment_item', 1)->get();

        $groupedPayments = $payments->groupBy('rate_id');

        // Calculate the subtotal (sum of 'amount'), totalPaid (sum of 'received_amount'), and totalDue (subtotal - totalPaid) by 'rate_id'
        $subtotals = $groupedPayments->map(function ($group) {
            return $group->sum('amount');
        });

        $totalPaidByRate = $groupedPayments->map(function ($group) {
            return $group->sum('received_amount');
        });

        // Calculate totalDue by rate_id: subtotal - totalPaid
        $totalDueByRate = $subtotals->map(function ($subtotal, $rateId) use ($totalPaidByRate) {
            $totalPaid = $totalPaidByRate[$rateId] ?? 0;
            return $subtotal - $totalPaid;
        });

        // Optionally, if you want a total sum for all rates combined
        $subtotalSum = $subtotals->sum();
        $totalPaidSum = $totalPaidByRate->sum();
        $totalDueSum = $subtotalSum - $totalPaidSum;
        return view('admin.driver.others.payment-history', compact('driver', 'payments', 'rates', 'subtotals', 'totalPaidByRate', 'totalDueByRate', 'subtotalSum', 'totalPaidSum', 'totalDueSum'));


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
