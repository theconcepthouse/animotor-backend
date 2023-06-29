<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;

use App\Models\User;
use Exception;
use Flutterwave\Payments\Facades\Flutterwave;
use Illuminate\Http\Request;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class FlutterwavePaymentController extends Controller
{
    public function index()
    {
        if(session('payment_type') == 'cart_payment'){
            $order = CombinedOrder::where('code',session('order_code'))->first();
            return $this->initialize($order->grand_total);
        }
        elseif (session('payment_type') == 'wallet_payment') {
            return $this->initialize(session('amount'));
        }
        elseif(session('payment_type') == 'seller_package_payment'){
            return $this->initialize(session('amount'));
        }
    }

    public function generatePaymentUrl(Request $request){
        $user = User::findOrFail($request->user_id);

        $payload = [
            "tx_ref" => Flutterwave::generateTransactionReference(),
            "amount" => $request->amount,
            "currency" => "NGN",
            "customer" => [
                "email" => $user->email
            ],
            "meta" => [
                "user_id" => $user->id
            ]
        ];

        $payment_link = Flutterwave::render('standard', $payload);

        return $this->successResponse('payment link',['paymentUrl' => $payment_link]);

    }

    /**
     * Obtain Rave callback information
     * @return \Illuminate\Http\RedirectResponse
     */
    public function callback()
    {
        $status = request()->status;
        $method = 'flutterwave';
        $transactionID = request()->transaction_id;

        $data = Flutterwave::verifyTransaction($transactionID);

        //if payment is successful
        if ($data['data']) {

            try{
                $payment = $data['data'];

                $user_id = $data['data']['meta']['user_id'];
                $amount = $payment['amount'];
                $description = "Wallet funding via flutterwave";
                if($payment['status'] == "successful"){
                    return ( new PaymentController )->payment_success($payment, $user_id, $amount, $description, $method);
                }else{
                    return ( new PaymentController )->payment_failed();
                }
            }
            catch(Exception $e){
                return ( new PaymentController )->payment_failed();
            }
        }
        return ( new PaymentController )->payment_failed();
    }
}
