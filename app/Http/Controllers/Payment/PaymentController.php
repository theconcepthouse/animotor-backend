<?php

namespace App\Http\Controllers\Payment;


use App\Http\Controllers\Api\WalletController;
use App\Http\Controllers\Controller;
use App\Services\WalletService;
use Illuminate\Http\Request;
use App\Models\User;


class PaymentController extends Controller
{

    public function payment_initialize(Request $request, $gateway){

        if ($gateway == 'paystack') {
            return ( new PaystackPaymentController )->generatePaymentUrl($request);
        }

        elseif ($gateway == 'flutterwave') {
            return ( new FlutterwavePaymentController )->index();
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

    public function payment_success($paymentData = null)
    {
        $walletService = new WalletService();
        $metaData = $paymentData['metadata'];
        $user = User::findOrFail($metaData['user_id']);

        $amt = $paymentData['amount'] / 100;

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
