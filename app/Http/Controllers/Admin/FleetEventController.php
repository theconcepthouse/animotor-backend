<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FleetEvent;
use Google\Service\AIPlatformNotebooks\Event;
use Google\Service\GKEHub\Fleet;
use Illuminate\Http\Request;

class FleetEventController extends Controller
{
    public function pastEvents()
    {
        $events = FleetEvent::where('end_date', '<', now())->get();
        return view('admin.fleet-events.past-event', compact('events'));
    }
    public function currentEvent()
    {
        $events = FleetEvent::where('end_date', '>', now())->latest()->get();
        return view('admin.fleet-events.current-event', compact('events'));
    }

    public function index(Request $request)
    {
        $current_events = FleetEvent::where('end_date', '<', now())->get();
        $category = $request->category;
        $categories = FleetEvent::distinct('category')->pluck('category');

        if ($category == '') {
            $events = FleetEvent::all();
        } else {
            $events = FleetEvent::where('category', $category)->get();
        }

        $formattedEvents = $events->map(function ($event) {
            return [
                'id' => $event->id,
                'title' => $event->title,
                'start' => $event->start_date->toIso8601String(),
                'end' => $event->end_date ? $event->end_date->toIso8601String() : null,
                'description' => $event->description,
                'location' => $event->location,
                'category' => $event->category,
                'className' => "fc-event-{$event->category}",
                'status' => $event->status,
            ];
        });

        return view('admin.fleet-events.index', ['events' => $formattedEvents, 'categories' => $categories, 'current_events' => $current_events]);
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

        FleetEvent::create($validatedData);

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
        return redirect()->back()->with('success', 'Event deleted.');
    }

    public function viewEvent($id)
    {
        $event = FleetEvent::findOrFail($id);
        return view('admin.fleet-events.view', compact('event'));
    }
    public function updateStatus(Request $request)
    {
        $eventId = $request->event_id;
        $event = FleetEvent::findOrFail($eventId);
        $event->status = $request->status;
        $event->save();
        return redirect()->back()->with('success', 'Event status changed.');
    }
}
