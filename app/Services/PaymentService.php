<?php

namespace App\Services;

use App\Http\Controllers\Payment\StripeController;
use App\Models\Booking;

class PaymentService
{
    public function process($payment_method){
        if($payment_method == 'stripe'){
            $provider = new StripeController();
            return $provider->pay();
        }
    }

    public function completePayment($payment_method, $payment_type, $payment_id, $payment_details){

        if($payment_type == 'booking_payment'){
            $booking_id = $payment_id;

            $booking = Booking::findOrFail($booking_id);

            $notification = new NotificationService();


            if($booking->payment_status != 'paid'){
                $booking->payment_method = $payment_method;
                $booking->payment_detail = $payment_details;
                $booking->payment_status = 'paid';
                $booking->save();

                auth()->user()->recordTransaction($booking->grand_total,'Booking payment','Stripe');

                $notification->notify('Congratulations, your booking payment is successful', 'booking_payment', 'Booking payment successful',auth()->user());

                session()->forget(['booking_id','payment_method','payment_type']);

                return redirect()->route('booking', $booking->id)->with('success','Payment successful');
            }


            return redirect()->route('booking', $booking->id)->with('error','Booking already paid');

        }

    }
}
