<?php

namespace Modules\Hotel\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Hotel\Entities\Hotel;

class HotelController extends Controller
{

    public function index(Request $request)
    {
        $query = Hotel::query();
        if($request->has('region')){
            $query->where('region_id', $request->get('region'));
        }
        $hotels = $query->paginate(8);
        return view('hotel::index', compact('hotels'));
    }

    public function create()
    {
        return view('hotel::create');
    }

    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        $hotel = Hotel::findOrFail($id);
        $related = Hotel::where('region_id', $hotel->region_id)->paginate(6);
        return view('hotel::show', compact('hotel','related'));
    }

    public function edit($id)
    {
        return view('hotel::edit');
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    //API
    public function getTrendingHotels(){
        $hotels = Hotel::paginate(10);
        return response()->json($hotels);
    }
}
