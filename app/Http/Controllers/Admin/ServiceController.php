<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Region;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ServiceController extends Controller
{
    public function index()
    {
//        $customRecord = [
//            'id' => 'all',
//            'name' => 'All region',
//            'country' => null
//        ];
        $data = Service::all();
        $title = "Services & Fee setup";
        $regions = Region::withoutAirport()->select('name','id')->get()->toArray();

//        $regions = array_merge([$customRecord], $db_regions);

        return view('admin.services.list', compact('data','title','regions'));
    }


    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $validatedData = $this->validateService($request);

        Service::create($validatedData);

        return redirect()->route('admin.services.index')->with('success', 'Service created successfully.');
    }

    public function update(Request $request, Service $service): \Illuminate\Http\RedirectResponse
    {
        $validatedData = $this->validateService($request, $service);

//        if ($validatedData['region_id'] == 'all'){
//            $validatedData['region_id'] = null;
//        }

        $service->update($validatedData);

        return redirect()->back()->with('success', 'Service updated successfully.');
    }

    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('services.index')->with('success', 'Service deleted successfully.');
    }

    private function validateService(Request $request, Service $service = null): array
    {
        $rules = [
            'name' => 'required',
            'region_id' => 'required',
            'is_active' => 'required',
            'cancellation_fee' => 'nullable',
            'payment_methods' => 'nullable',
            'image' => 'required',
            'capacity' => 'required|integer',
            'wait_time_limit' => 'required|integer',
            'min_fare' => 'required|numeric',
            'min_distance' => 'required|numeric',
            'price' => 'required|numeric',
            'distance_price' => 'required|numeric',
            'time_price' => 'required|numeric',
            'wait_price' => 'required|numeric',
            'discount' => 'required|numeric',
            'commission_type' => 'required',
            'commission' => 'required|numeric',
        ];


        return $request->validate($rules);
    }
}
