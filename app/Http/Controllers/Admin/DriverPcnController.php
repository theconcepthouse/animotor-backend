<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\DriverPcnMail;
use App\Models\Addons\pcn;
use App\Models\Car;
use App\Models\DriverPcn;
use App\Models\FleetEvent;
use App\Models\Form;
use App\Models\History;
use App\Models\Note;
use App\Models\PCNAutority;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class DriverPcnController extends Controller
{
    public function driverPcn($driverId)
    {
        $driver = User::findOrFail($driverId);
        $pcns = DriverPcn::where('driver_id', $driver->id)->latest()->get();
        return view('admin.driver.others.pcn.pcns', compact('pcns', 'driver'));
    }

    public function addDriverPcn($driverId)
    {
        $driver = User::findOrFail($driverId);
        $cars = Car::all();
        $authority = PCNAutority::all();
        return view('admin.driver.others.pcn.addPcn', compact('driver', 'cars', 'authority'));
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
            'linkup_with_vehicle_registration_no' => 'nullable|string',
            'reminder' => 'nullable|string',
        ]);

        $pcn = DriverPcn::findOrFail($request->pcn_id);
        $driver = User::findOrFail($driverId);

        // update the PCN itself
        $validated['reminder'] = Carbon::parse($request->reminder);
        $pcn->update($validated);

        // -------------- EVENT --------------
        $event = $pcn->event()->updateOrCreate([], [       // ties via FK automatically
            'title' => 'PCN Event - ' . $pcn->pcn_no,
            'start_date' => $pcn->date_of_issue,
            'end_date' => $pcn->reminder,
            'category' => 'PCN-event',
            'description' => implode('<br>', [
                'VRM: ' . $pcn->vrm,
                'Date of Issue: ' . $pcn->date_of_issue,
                'Issuing Authority: ' . $pcn->issuing_authority,
            ]),
        ]);
        // -----------------------------------

        Mail::to($driver->email)->send(new DriverPcnMail($pcn));

        return redirect()
            ->route('admin.driverPcn', $driver->id)
            ->with('message', 'PCN updated successfully');
    }


    public function deleteDriverPcn($pcnId)
    {
        DriverPcn::findOrFail($pcnId)->delete();   // Event evaporates automatically
        return back()->with('message', 'PCN and its event deleted');
    }


    public function editDriverPcn($pcnId, $driverId)
    {
        $driver = User::findOrFail($driverId);
        $pcn = DriverPcn::findOrFail($pcnId);
        $cars = Car::all();
        $authority = PCNAutority::all();
        return view('admin.driver.others.pcn.edit-pcn', compact('pcn', 'driver', 'cars', 'authority'));
    }

    public function updateDriverPcn(Request $request, $pcnId)
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

        $pcnLog = DriverPcn::findOrFail($pcnId);
        $pcnLog->update($validated);

        return redirect()->back()
            ->with('message', 'PCN updated successfully.');
    }


    public function storePCNAuthority(Request $request)
    {
        $data = new PCNAutority();
        $data->name = $request->name;
        $data->save();
        return redirect()->back()->with('message', 'PCN authority added successfully.');
    }


}
