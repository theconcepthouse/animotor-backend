<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index($status)
    {
        $title = $status. " booking requests";

        if($status == 'pending'){
            $data = Booking::where('completed', false)->where('cancelled',false)->paginate(100);
        } elseif($status == 'completed'){
            $data = Booking::where('completed', true)->paginate(100);
        }elseif($status == 'cancelled'){
            $data = Booking::where('cancelled', true)->paginate(100);
        }else{

            $title = "All Booking requests";

            $data = Booking::paginate(100);
        }

        return view('admin.bookings.list', compact('data','title'));
    }

    public function show($id){
        $booking = Booking::findOrFail($id);
        return view('admin.bookings.show', compact('booking'));
    }
}
