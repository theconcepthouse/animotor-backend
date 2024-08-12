<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Addons\pcn;
use App\Models\DriverPcn;
use App\Models\FleetEvent;
use App\Models\Form;
use App\Models\History;
use App\Models\Note;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DriverPcnController extends Controller
{
    public function driverPcn($driverId)
    {
        $driver = User::findOrFail($driverId);
        $pcns = DriverPcn::where('driver_id', $driver->id)->get();
        return view('admin.driver.others.pcn.pcns', compact('pcns', 'driver'));
    }

    public function addDriverPcn($driverId)
    {
        $driver = User::findOrFail($driverId);
        return view('admin.driver.others.pcn.addPcn', compact('driver'));
    }

    public function storeDriverPcn(Request $request, $driverId)
    {

        $rules = [
            'date_post_received' => 'nullable|date',
            'vrm' => 'nullable|string',
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
        $validated['driver_id'] = $request->driver_id;
        $pcnLog = DriverPcn::create($validated);
        return redirect()->route('admin.addPcnLog', ['pcnId' => $pcnLog->id, 'driverId' => $driverId])
            ->with('message', 'PCN added successfully.');
    }

    public function addPcnLog($pcnId, $driverId)
    {
        $driver = User::findOrFail($driverId);
        $pcn = DriverPcn::findOrFail($pcnId)->where('driver_id', $driver->id);
        return view('admin.driver.others.pcn.addPcn-log', compact('driver', 'pcn', 'pcnId'));
    }

    public function storePcnLog(Request $request, $driverId)
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
        $driver = User::findOrFail($driverId);
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
        return redirect()->route('admin.driverPcn', ['driverId' => $driver->id])->with('message', 'PCN updated successfully');
    }

    public function deleteDriverPcn($pcnId)
    {
        $pcn = DriverPcn::findOrFail($pcnId);
        $pcn->delete();
        return redirect()->route('admin.addPcnLog', ['pcnId' => $pcnId]);
    }




}
