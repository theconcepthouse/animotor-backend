<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FleetPlanning;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Spatie\GoogleCalendar\Event;

class FleetPlanningController extends Controller
{
    public function index()
    {

        $events = [];

        $fleet_plans = FleetPlanning::all();

        foreach ($fleet_plans as $appointment) {
            $events[] = [
                'title' => $appointment->event_name,
                'description' => $appointment->description,
                'start' => $appointment->start_date,
                'end' => $appointment->end_date,
                'location' => $appointment->location,
            ];
        }

        return view('admin.fleet_planning.index', compact('events'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'event_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'duration' => 'nullable|integer',
            'location' => 'nullable|string|max:255',
            'guests' => 'nullable|array',
            'guests.*' => 'nullable|string',
        ]);

        // Convert start and end dates to Carbon instances
        $data['start_date'] = Carbon::parse($data['start_date']);
        $data['end_date'] = Carbon::parse($data['end_date']);

        // Create event in the database
        FleetPlanning::create($data);

        return redirect()->back()->with('success', "Event Created Successfully");
    }

    public function destroy($id)
    {
        $event = FleetPlanning::find($id);

        if ($event) {
            $event->delete();
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'Event not found'], 404);
    }

}
