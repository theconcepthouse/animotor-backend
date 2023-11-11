<?php

namespace App\Http\Controllers\Admin;

use App\Events\BookingConfirmed;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Notifications\AccountNotification;
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

    public function updateStatus(Request $request)
    {

        $id = $request->input('id');
        $notify = $request->input('notify_customer') == 'yes';
        $booking = Booking::findOrFail($id);
        $booking->status = $request->input('status');
        $booking->comment = $request->input('comment');
        $booking->picked = $request->input('picked');

        if($booking->payment_method == 'cash'){
            $booking->payment_status = $request->input('payment_status');
        }



        if($booking->status == 'cancelled'){
            $booking->cancelled = true;
            $booking->cancelled_by = auth()->user()->email;
            $booking->save();

            if($notify){
//            return $booking->customer;
                if($booking->customer){
                    $user = $booking->customer;

                    $message['title'] = "Booking cancelled";
                    $message['link'] = route('booking',$booking->id);
                    $message['link_text'] = 'View booking';
                    $message['message'] = $request->input('comment') ?? 'Your booking has been cancelled';

                    $message['lines'] = [
                        "<strong>Please contact support for more details</strong>",
                    ];

                    $user->notify(new AccountNotification($message));


                }else{
                    return redirect()->back()->with('failure','Invalid booking');
                }
            }
            return redirect()->back()->with('success','Booking successfully cancelled');
        }

        if($booking->status == 'completed'){
            $booking->completed = true;
            $booking->save();

            if($notify){
//            return $booking->customer;
                if($booking->customer){
                    $user = $booking->customer;

                    $message['title'] = "Booking completed";
                    $message['link'] = route('booking',$booking->id);
                    $message['link_text'] = 'View booking';
                    $message['message'] = $request->input('comment') ?? 'Your booking has been confirmed as completed';

                    $message['lines'] = [
                        "<strong>Thank you for booking with us</strong>",
                    ];

                    $user->notify(new AccountNotification($message));


                }else{
                    return redirect()->back()->with('failure','Invalid booking');
                }
            }
            return redirect()->back()->with('success','Booking successfully completed');
        }

        $booking->save();

        if($notify){
//            return $booking->customer;
            if($booking->customer){
                $user = $booking->customer;

                $message['title'] = "Booking status update";
                $message['link'] = route('booking',$booking->id);
                $message['link_text'] = 'View booking';
                $message['message'] = $request->input('comment') ?? 'Your booking status has been updated';

                $message['lines'] = [
                    "<strong>Current Booking Status</strong>",
                    "Booking status : ".$booking->status,
                    "Booking Confirmed : ".($booking->is_confirmed ? 'Yes' : 'No'),
                    "Picked : ".$booking->picked,
                ];

                $user->notify(new AccountNotification($message));
            }else{
                return redirect()->back()->with('failure','Invalid booking');
            }
        }

        return redirect()->back()->with('success','Status updated');
    }

    public function confirmBooking($id) : RedirectResponse
    {

        $booking = Booking::findOrFail($id);

        if(!$booking->customer){
            return redirect()->back()->with('failure','Invalid Booking');

        }

        $booking->is_confirmed = true;
        $booking->confirmation_no = getUniqueBookingConfirmationNo();

        $booking->save();

        event(new BookingConfirmed($booking));

        return redirect()->back()->with('success','Booking successfully confirmed');
    }
}
