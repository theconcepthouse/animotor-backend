<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Services\PaymentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StripeController extends Controller
{
    public function pay()
    {
        return view('payment.stripe');
    }

    public function create_checkout_session(Request $request): JsonResponse
    {
        $amount = 0;
        if ($request->session()->has('payment_type')) {
            if ($request->session()->get('payment_type') == 'booking_payment') {
                $booking = Booking::findOrFail(Session::get('booking_id'));
                $client_reference_id = $booking->id;
                $amount = round($booking->grand_total * 100);
            } elseif ($request->session()->get('payment_type') == 'wallet_payment') {
//                $amount = round($request->session()->get('payment_data')['amount'] * 100);
//                $client_reference_id = auth()->id();
            }
        }

        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => settings('currency_code','USD'),
                        'product_data' => [
                            'name' => "Payment"
                        ],
                        'unit_amount' => $amount,
                    ],
                    'quantity' => 1,
                ]
            ],
            'mode' => 'payment',
            'client_reference_id' => $client_reference_id,
             'success_url' => url("/stripe/success?session_id={CHECKOUT_SESSION_ID}"),
            'cancel_url' => route('stripe.cancel'),
        ]);

        return response()->json(['id' => $session->id, 'status' => 200]);
    }

    public function success(Request $request)
    {
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET_KEY'));

        try {
            $session = $stripe->checkout->sessions->retrieve($request->session_id);
            $payment = ["status" => "Success"];
            $payment_type = Session::get('payment_type');


            if($session->status == 'complete') {
                if ($payment_type == 'booking_payment') {
                    return (new PaymentService())->completePayment('stripe', 'booking_payment',session()->get('booking_id'), json_encode($session));
                }
                else if ($payment_type == 'wallet_payment') {
//                    return (new WalletController)->wallet_payment_done(session()->get('payment_data'), json_encode($payment));
                }
            } else {
                $payment_type = Session::get('payment_type');

                if($payment_type == 'booking_payment'){
                    $booking_id = session()->get('booking_id');
                    return redirect()->route('booking', $booking_id)->with('error','Payment failed');
                }
                return redirect()->route('home');
            }
        } catch (\Exception $e) {

            $payment_type = Session::get('payment_type');

            if($payment_type == 'booking_payment'){
                $booking_id = session()->get('booking_id');
                return redirect()->route('booking', $booking_id)->with('error','Payment failed');;
            }
            return redirect()->route('home');
        }
    }

    public function cancel(Request $request)
    {
        $payment_type = Session::get('payment_type');

        if($payment_type == 'booking_payment'){
            $booking_id = session()->get('booking_id');
            return redirect()->route('booking', $booking_id)->with('error','Payment cancelled');
        }
        return redirect()->route('home');
    }
}
