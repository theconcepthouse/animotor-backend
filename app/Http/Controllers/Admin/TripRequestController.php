<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TripRequest;
use Illuminate\Http\Request;

class TripRequestController extends Controller
{
    public function index($status)
    {
        if(!in_array($status,['pending','completed','cancelled','scheduled'])){
            $title = "Trip requests";
            $data = TripRequest::paginate(100);
        }else{
            $title = $status. " Trip requests";
            $data = TripRequest::where('status', $status)->paginate(100);
        }


        return view('admin.trips.list', compact('data','title'));
    }
}
