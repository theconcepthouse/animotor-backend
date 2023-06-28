<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\User;

use Unicodeveloper\Paystack\Paystack;

class PaystackPaymentController extends Controller
{
    public function index(Request $request)
    {

        $user = User::find($request->user_id);
        $currency = $user?->region?->currency_symbol ?? 'NGN';

        $paystack = new Paystack();

        $paymentData = [
            'amount' => round($request->amount * 100),
            'email' => $user->email,
            'reference' => uniqid(),
            'currency' => $currency,
        ];

        // Create a payment authorization
        $paymentAuthorization = $paystack->getAuthorizationUrl()->create($paymentData);

        // Retrieve the payment URL
        $paymentUrl = $paymentAuthorization->getAuthorizationUrl();

        return response()->json(['paymentUrl' => $paymentUrl]);


//        $user = User::find($request->user_id);
//        $request->email = $user->email;
//        $currency = $user?->region?->currency_symbol ?? 'NGN';
//        $request->currency = $currency;
//
//        $request->amount = round($request->amount * 100);
//
//
//        $request->reference = Paystack::genTranxRef();
//
//
//        return Paystack::getAuthorizationUrl()->redirectNow();
    }

    public function paystackNewCallback()
    {
        Paystack::getCallbackData();
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function return()
    {
        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want

        try{
            $payment = Paystack::getPaymentData();
            $payment_details = json_encode($payment);
            if (!empty($payment['data']) && $payment['data']['status'] == 'success') {
                return ( new PaymentController )->payment_success($payment_details);
            }
            else{
                return ( new PaymentController )->payment_failed();
            }
        }
        catch(\Exception $e){
            return ( new PaymentController )->payment_failed();
        }
    }

}
