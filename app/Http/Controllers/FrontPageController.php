<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Car;
use App\Models\Page;
use App\Models\User;
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
        return view('frontpage.deal', compact('car'));
    }

    public function protectionOption(Request $request){
        $id = $request->get('car_id');
        $car = Car::findOrFail($id);
        return view('frontpage.protection_options', compact('car'));
    }

    public function checkout(Request $request){
        $id = $request->get('car_id');
        $car = Car::findOrFail($id);
        if(auth()->check()){
            $user = auth()->user();
        }else{
            $user = null;
        }

        return view('frontpage.checkout', compact('car','user'));
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
