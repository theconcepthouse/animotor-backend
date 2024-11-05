<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DriverPcn;
use App\Models\FleetEvent;
use App\Models\User;
use App\Models\Vehicle;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PCNController extends Controller
{
    public function index()
    {
        $pcns = DriverPcn::latest()->paginate(100);
        return view('admin.pcn.index', compact('pcns'));
    }

    public function create()
    {
        $vehicles = Vehicle::all();
        return view('admin.pcn.create', compact('vehicles'));
    }

    public function store(Request $request)
    {
        $rules = [
            'date_post_received' => 'nullable|date',
            'vrm' => 'required|string',
            'pcn_no' => 'nullable|string',
            'date_of_issue' => 'nullable|date',
            'date_of_contravention' => 'nullable|date',
            'deadline_date' => 'nullable|date',
            'issuing_authority' => 'nullable|string',
            'priority' => 'nullable|string|in:Urgent,High,Medium,Low',
            'notes' => 'nullable|string',
            'status' => 'nullable|string',
        ];
        $validated = $request->validate($rules);
        $pcnLog = DriverPcn::create($validated);
        return redirect()->route('admin.pcn.addPcnLog', ['pcnId' => $pcnLog->id])
            ->with('message', 'PCN added successfully.');

    }

    public function addPcnLog($pcnId)
    {
        $pcn = DriverPcn::findOrFail($pcnId);
        return view('admin.pcn.create2', compact('pcn', ));
    }

    public function storePcnLog(Request $request)
    {
        $validated = $request->validate([
            'report' => 'nullable|string',
            'linkup_with_driver' => 'nullable|string',
            'linkup_with_vehicle_registration_no' => 'nullable|string',
            'notify_to_driver' => 'nullable|string',
            'notify_to_staff_member' => 'nullable|string',
            'notify_to_other' => 'nullable|string',
            'reminder' => 'nullable|string',
        ]);

        $pcnId = $request->pcn_id;
        $pcn = DriverPcn::findOrFail($pcnId);
        $validated['reminder'] = Carbon::parse($request->reminder);
        $pcn->update($validated);

        $event = new FleetEvent();
        $event->title = "PCN Event";
        $event->start_date = $pcn->created_at;
        $event->end_date = $pcn->reminder;
        $event->category = "PCN-events";
        $event->description = implode('<br>', [
            "VRM: " . $pcn->vrm,
            'Date of Issue: ' . $pcn->date_of_issue,
            'Issuing Authority: ' . $pcn->issuing_authority,
        ]);
        $event->save();
        return redirect()->route('admin.pcns.index')->with('message', 'PCN updated successfully');
    }

}
