<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DriverPcn;
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
        return view('admin.pcn.create');
    }

    public function store(Request $request)
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
        $validated['driver_id'] = null;
        $pcnLog = DriverPcn::create($validated);
        return redirect()->route('admin.addPcnLog', ['pcnId' => $pcnLog->id])
            ->with('message', 'PCN added successfully.');

    }

}
