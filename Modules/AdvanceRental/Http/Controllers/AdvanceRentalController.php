<?php

namespace Modules\AdvanceRental\Http\Controllers;

use App\Models\Car;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdvanceRentalController extends Controller
{

    public function index()
    {
        return view('advancerental::index');
    }


    public function create()
    {
        return view('advancerental::create');
    }



    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        return view('advancerental::show');
    }


}
