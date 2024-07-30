<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FleetEvent;
use Illuminate\Http\Request;

class FleetEventController extends Controller
{
    public function index()
    {
        $events = FleetEvent::all();
        $formattedEvents = $events->map(function ($event) {
            return [
                'id' => $event->id,
                'title' => $event->title,
                'start' => $event->start_date->toIso8601String(),
                'end' => $event->end_date ? $event->end_date->toIso8601String() : null,
                'description' => $event->description,
                'location' => $event->location,
                'category' => $event->category,
                'className' => "fc-event-{$event->category}"
            ];
        });

        return view('admin.fleet-events.index', ['events' => $formattedEvents]);
//        return view('admin.fleet-events.index', compact('formattedEvents'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        $event = FleetEvent::create($validatedData);

        return redirect()->back()->with('success', 'Event created.');
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        $event = FleetEvent::findOrFail($id);
        $event->update($validatedData);

        return response()->json($event);
    }

    public function destroy($id)
    {
        $event = FleetEvent::findOrFail($id);
        $event->delete();

        return response()->json(null, 204);
    }
}
