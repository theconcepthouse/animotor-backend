<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\TripRequest;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
        $user_id = auth()->id();

        $commonConditions = function ($query) use ($user_id) {
            $query->where('customer_id', $user_id);
        };

        $data['total_bookings'] = Booking::where($commonConditions)->count();

        $data['pending_bookings'] = Booking::where($commonConditions)
            ->where('completed', false)
            ->where('is_confirmed', false)
            ->where('cancelled', false)
            ->count();

        $data['confirmed_bookings'] = Booking::where($commonConditions)
            ->where('is_confirmed', true)
            ->where('cancelled', false)
            ->count();

        $data['completed_booking'] = Booking::where($commonConditions)
            ->where('completed', true)
            ->where('cancelled', false)
            ->count();

        if ($data['pending_bookings'] > 0 && $data['total_bookings'] > 0){
            $data['pending_percent'] =  ($data['pending_bookings'] / $data['total_bookings'] ) * 100;
        }else{
            $data['pending_percent'] = 100;
        }

        if($data['confirmed_bookings'] > 0 && $data['total_bookings'] > 0){
            $data['confirmed_percent'] =  ($data['confirmed_bookings'] / $data['total_bookings'] ) * 100;
        }else{
            $data['confirmed_percent'] = 100;
        }

        return view('dashboard.index', compact('data'));
    }

    public function bookings(){
//        if(isAdmin()) {
            $bookings = Booking::where('customer_id', auth()->id())->latest()->paginate(10);
//        }
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
        $transactions = auth()->user()->transaction_records()->latest()->get();
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
