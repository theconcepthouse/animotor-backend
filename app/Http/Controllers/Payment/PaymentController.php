<?php

namespace App\Http\Controllers\Payment;


use App\Http\Controllers\Api\WalletController;
use App\Http\Controllers\Controller;
use App\Services\WalletService;
use Illuminate\Http\Request;
use App\Models\User;


class PaymentController extends Controller
{

    public function payment_initialize(Request $request){

        $gateway = $request->get('payment_method');

        if ($gateway == 'paystack') {
            return ( new PaystackPaymentController )->generatePaymentUrl($request);
        }

        elseif ($gateway == 'flutterwave') {
            return ( new FlutterwavePaymentController )->generatePaymentUrl($request);
        }
//        elseif ($gateway == 'paytm') {
//            return ( new PaytmPaymentController )->index();
//        }
//        elseif ($gateway == 'razorpay') {
//            return ( new RazorpayPaymentController )->index();
//        }
//        elseif ($gateway == 'payfast') {
//            return ( new PayfastPaymentController )->index();
//        }
//        elseif ($gateway == 'authorizenet') {
//            return ( new AuthorizenetPaymentController )->index();
//        }
//        elseif ($gateway == 'mercadopago') {
//            return ( new MercadopagoPaymentController )->index();
//        }
//        elseif ($gateway == 'iyzico') {
//            return ( new IyzicoPaymentController )->index();
//        }
//        elseif (strpos($gateway, 'offline_payment') !== true) {
//            return ( new ManualPaymentController )->index();
//        }
    }

    public function payment_success($paymentData, $user_id, $amount)
    {
        $walletService = new WalletService();

        $user = User::findOrFail($user_id);

        $amt = $amount;

        $walletService->fundWallet($user, $amt);


        return redirect()->route('payment.success');
    }

    public function paymentDone(){
        return view('payment.success');
    }

    public function payment_failed()
    {
        return redirect()->route('payment.failed');

    }
    public function paymentFailed()
    {
        return view('payment.failed');

    }

}
