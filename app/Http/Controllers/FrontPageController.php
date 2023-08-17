<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Car;
use App\Models\Page;
use Illuminate\Http\Request;

class FrontPageController extends Controller
{


    public function __construct()
    {
//        if (env('disable_front', false)) {
            return redirect('/admin/dashboard');
//        }
    }

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

    public function booking($id){
        $booking = Booking::findOrFail($id);

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
}
