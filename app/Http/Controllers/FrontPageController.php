<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Car;
use App\Models\Page;
use App\Models\User;
use App\Services\PaymentService;
use App\Services\WalletService;
use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;

class FrontPageController extends Controller
{


//    public function __construct()
//    {
////        if (env('disable_front', false)) {
//            return redirect('/admin/dashboard');
////        }
//    }

    public function home(){
        if(settings('enable_frontpage') != 'yes'){
            return redirect()->route('admin.dashboard');
        }
        $page = Page::where('path','/')->firstOrFail();
        $contents = $page->contents;
//        if(strlen($contents) < 300){
//            return view('frontpage.builder', compact('contents','page'));
//        }
        return view('frontpage.page', compact('contents','page'));
    }

    public function builder(){
        return view('frontpage.home');
    }
  public function token(Request $request){
      if ($request->has('token')) {
          $token = $request->input('token');

          $tk = PersonalAccessToken::findToken($token);

          if ($tk) {
                $user = $tk->tokenable()->first();
              auth()->login($user);
          }
          return $user;
      }
      return 'not found';
    }

    public function manageBooking(){
        return view('frontpage.search_booking');
    }

    public function searchBooking(Request $request){
        $email = $request->input('email');
        $reference = $request->input('reference');

        $booking = Booking::where('reference',$reference)->first();
        if(!$booking){
            return redirect()->back()->withInput()->with('error',"Can't find any booking record with the provided reference number");
        }
        $user = User::find($booking->customer_id);
        if(!$user || $user?->email != $email){
            return redirect()->back()->withInput()->with('error','Invalid booking email address');
        }


        return redirect()->route('booking',['id' => $booking->id]);

    }

    public function booking($id){
        $booking = Booking::findOrFail($id);

        if(!$booking->car){
            return redirect()->back()->with('error','Invalid booking');
        }

        return view('frontpage.booking_detail', compact('booking'));
    }

    public function voucher($id){
        $booking = Booking::findOrFail($id);

        return view('frontpage.booking_voucher', compact('booking'));
    }

    public function builder2(){
        return view('frontpage.builder');
    }
    public function list(){
        return view('frontpage.list_cars');
    }

    public function flight(){
        return view('frontpage.flight');
    }

    public function deal(Request $request){
        $id = $request->get('car_id');
        $car = Car::findOrFail($id);
        $booking_day = $request->get('booking_day');

        $car->total = $car->price_per_day * $booking_day;

        $car->tax = ($car->price_per_day * $booking_day) * settings('tax',0.075);

        $car->total += $car->tax;

        return view('frontpage.deal', compact('car'));
    }

    public function protectionOption(Request $request){
        $id = $request->get('car_id');
        $car = Car::findOrFail($id);
        $booking_day = $request->get('booking_day');

        $car->total = $car->price_per_day * $booking_day;

        $car->tax = ($car->price_per_day * $booking_day) * settings('tax',0.075);

        $car->total += $car->tax;

        if($request->get('book_type') == 'with_full_protection'){
            $car->total += $car->insurance_fee;
        }

        return view('frontpage.protection_options', compact('car'));
    }

    public function checkout(Request $request){
        $id = $request->get('car_id');
        $car = Car::findOrFail($id);
        if(auth()->check()){
            $user = auth()->user();

            $booking = Booking::where('customer_id', $user->id)
                ->where('car_id', $id)
                ->where('completed', false)->where('cancelled', false)->first();
            if($booking){
                return redirect()->route('booking', $booking->id)->with('error','Please complete your ongoing booking');
            }
        }else{
            $user = null;
        }
        $booking_day = $request->get('booking_day');
        $car->tax = ($car->price_per_day * $booking_day) * settings('tax',0.075);
        $car->total = $car->price_per_day * $booking_day;
        $car->total += $car->tax;

        if($request->get('book_type') == 'with_full_protection'){
            $car->total += $car->insurance_fee;
        }

        return view('frontpage.checkout', compact('car','user'));
    }

//    public function select_payment_method(Request $request){
//        $request->session()->put('payment_type', 'booking_payment');
//
//    }
    public function select_payment_method($booking_id){

        $booking = Booking::findOrFail($booking_id);
        return view('frontpage.select_payment_method', compact('booking'));

    }
    public function paymentProcess(Request $request, PaymentService $paymentService){

        $payment_method = $request->get('payment_method');
        $booking_id = $request->get('booking_id');

        if(!in_array($payment_method, payment_methods())){
            return redirect()->back()->with('error', 'Payment method not active');
        }
        $booking = Booking::findOrFail($booking_id);

        $request->session()->put('payment_type', 'booking_payment');

        $request->session()->put('booking_id', $booking->id);


        return $paymentService->process($payment_method);

    }

    public function search(Request $request){
        return view('frontpage.list_cars');
        return $request->all();
    }

    public function page($slug){

        $page = Page::where('path',$slug)->firstOrFail();
        $contents = $page->contents;
        return view('frontpage.page', compact('contents','page'));
    }

//    public function menu(){
//      return [
//    {
//        "title": "Manage booking",
//        "url": "/manage/booking",
//        "icon": "fa-regular fa-calendar mx-2",
//        "img" : "/assets/img/icons/calender.png"
//    },
//    {
//        "title": "EUR"
//    },
//    {
//        "img": "/assets/img/icons/lang.png"
//    },
//    {
//        "title": "Login / Register",
//        "url": "/login",
//        "icon": "fa-solid fa-sign-in-alt"
//    }
//]
//    }
}
