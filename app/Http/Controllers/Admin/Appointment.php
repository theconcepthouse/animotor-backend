<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FleetPlanning;
use Illuminate\Http\Request;

class Appointment extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
         $events = [];
        $fleet_plans = FleetPlanning::all();

        foreach ($fleet_plans as $appointment) {
            $events[] = [
                'event_name' => $appointment->event_name,
                'description' => $appointment->description,
                'start_date' => $appointment->start_date,
                'end_date' => $appointment->end_date,
            ];
        }

        return view('admin.fleet_planning.index', compact('events'));
    }
}
