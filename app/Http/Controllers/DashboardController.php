<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\TripRequest;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
        if(isAdmin()){
            if(hasTrips()){

                $bookings = TripRequest::paginate(10);
            }else{

                $bookings = Booking::paginate(10);
            }
        }else{
            if(hasTrips()) {
                $bookings = TripRequest::where('customer_id', auth()->id())->paginate(10);
            }else{

                $bookings = Booking::where('customer_id', auth()->id())->paginate(10);
            }
        }
        return view('dashboard.index', compact('bookings'));
    }

    public function bookings(){
        if(isAdmin()) {
            $bookings = Booking::paginate(10);
        }else{
            $bookings = Booking::where('customer_id', auth()->id())->paginate(10);
        }
        return view('dashboard.bookings', compact('bookings'));
    }

    public function bookingView($id){
        $booking = Booking::findOrFail($id);
        return view('dashboard.booking_view', compact('booking'));

    }

    public function return(){
        return view('frontpage.dashboard.return');
    }

    public function notifications(){
        $notifications = auth()->user()->notifications;
        return view('dashboard.notifications', compact('notifications'));
    }

    public function transactions(){
        $transactions = auth()->user()->transactions()->latest()->get();
        return view('dashboard.transactions',compact('transactions'));
    }
    public function profile(){
        $user = auth()->user();
        return view('dashboard.profile', compact('user'));
    }

    public function topUp(){
        $user = auth()->user();
        $active_methods =  json_decode(settings('active_methods','none'), true);
        return view('dashboard.top_up', compact('user','active_methods'));
    }
}
