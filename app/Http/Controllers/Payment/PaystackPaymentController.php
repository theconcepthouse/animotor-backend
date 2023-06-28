<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\User;

use Paystack;

class PaystackPaymentController extends Controller
{

    public function generatePaymentUrl(Request $request)
    {
        try {

            $user = User::findOrFail($request->user_id);

            $paymentData = array(
                'amount' => round($request->amount * 100),
                'email' => $user->email, // Get the email from the request
                'reference' => Paystack::genTranxRef(),
                'description' => "Wallet funding",
                'metadata' => [
                    'user_id' => $user->id, // Include the user ID in the metadata
                ],
//                'currency' => $user?->region?->currency_symbol ?? 'NGN',
            );

            $paymentUrl = Paystack::getAuthorizationUrl($paymentData);

            return $this->successResponse('payment link',['paymentUrl' => $paymentUrl->url]);
        }
        catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    public function callback()
    {
        try{
            $payment = Paystack::getPaymentData();
            if (!empty($payment['data']) && $payment['data']['status'] == 'success') {
                $amount = $payment['data']['amount'] / 100;
                $user_id = $payment['data']['metadata']['user_id'];
                return ( new PaymentController )->payment_success($payment['data'], $user_id, $amount);
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
