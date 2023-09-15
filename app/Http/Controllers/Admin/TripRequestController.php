<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TripRequest;
use App\Services\Firebase\FirestoreService;
use Illuminate\Http\Request;

class TripRequestController extends Controller
{
    public function index($status)
    {
        $title = $status. " Trip requests";

        if($status == 'pending'){
            $data = TripRequest::where('completed', false)->where('cancelled',false)->paginate(100);
        } elseif($status == 'completed'){
            $data = TripRequest::where('completed', true)->paginate(100);
        }elseif($status == 'cancelled'){
            $data = TripRequest::where('cancelled', true)->paginate(100);
        }elseif($status == 'scheduled'){
            $data = TripRequest::where('scheduled', true)->paginate(100);
        }else{

            $title = "All Trip requests";

            $data = TripRequest::paginate(100);
        }




        return view('admin.trips.list', compact('data','title'));
    }

    public function deleteTrip($id, FirestoreService $firestoreService){
        $trip = TripRequest::findOrFail($id);
        $firestoreService->deleteTrip($trip);
        $trip->delete();
        return redirect()->route('admin.trips.index', ['status' => 'pending'])->with('success','Trip successfully deleted');
    }

    public function show($id){
        $trip = TripRequest::findOrFail($id);
        return view('admin.trips.show', compact('trip'));
    }
}
