<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
        return view('frontpage.dashboard.index');
    }

    public function return(){
        return view('frontpage.dashboard.return');
    }
}
