<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {

//        if($status == 'pending'){
//            $data = Booking::where('completed', false)->where('cancelled',false)->paginate(100);
//        } elseif($status == 'completed'){
//            $data = Booking::where('completed', true)->paginate(100);
//        }elseif($status == 'cancelled'){
//            $data = Booking::where('cancelled', true)->paginate(100);
//        }else{
//
//            $title = "All bookings requests";
//
//            $data = Booking::paginate(100);
//        }

        return view('admin.bookings.list');
    }

    public function show($id){
        $booking = Booking::findOrFail($id);
        return view('admin.bookings.show', compact('booking'));
    }

    public function updateStatus(Request $request): RedirectResponse
    {

        $id = $request->input('id');
        $booking = Booking::findOrFail($id);
        $booking->status = $request->input('status');
        $booking->comment = $request->input('comment');
        $booking->picked = $request->input('picked');

        $booking->save();

        return redirect()->back()->with('success','Status updated');
    }

    public function confirmBooking($id) : RedirectResponse
    {

        $booking = Booking::findOrFail($id);

        $booking->is_confirmed = true;
        $booking->confirmation_no = getUniqueBookingConfirmationNo();

        $booking->save();

        return redirect()->back()->with('success','Booking successfully confirmed');
    }
}
