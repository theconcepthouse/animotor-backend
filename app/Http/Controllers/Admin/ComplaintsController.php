<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use App\Models\TripRequest;
use Illuminate\Http\Request;

class ComplaintsController extends Controller
{
    public function index()
    {
        $data = Complaint::paginate(100);
        $title = "Complains";
        $trips = TripRequest::all();
        return view('admin.complains.list', compact('data','title', 'trips'));
    }


    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $validatedData = $this->validateData($request);

        Complaint::create($validatedData);

        return redirect()->back()->with('success', 'Complaint created successfully.');
    }


    public function update(Request $request, $id)
    {
        $Complaint = Complaint::findOrFail($id);
        $validatedData = $this->validateData($request);

        $Complaint->update($validatedData);

        return redirect()->back()->with('success', 'Complaint updated successfully.');
    }

    public function destroy($id)
    {
        $Complaint = Complaint::findOrFail($id);

        $Complaint->delete();

        return redirect()->back()->with('success', 'Complaint deleted successfully.');
    }

    private function validateData(Request $request): array
    {
        $rules = [
            'subject' => 'required',
            'ride_id' => 'required',
            'complain' => 'required',
            'by' => 'nullable',
            'status' => 'required',
            'driver' => 'nullable',
            'rider' => 'nullable',
        ];

        return $request->validate($rules);
    }
}
