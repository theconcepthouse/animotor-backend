<?php

namespace App\Services;


use App\Models\Booking;
use App\Models\TripRequest;
use Illuminate\Support\Facades\Cache;
use JetBrains\PhpStorm\ArrayShape;

class StatisticsService
{
    public function getTripsStatistics()
    {
        return Cache::remember('trips_statistics', now()->addMinutes(30), function () {
            return $this->calculateTripsStatistics();
        });
    }

    public function getBookingsStatistics()
    {
        return Cache::remember('bookings_statistics', now()->addMinutes(30), function () {
            return $this->calculateBookingsStatistics();
        });
    }


    #[ArrayShape(['total' => "mixed", 'this_week' => "mixed", 'this_month' => "mixed", 'pending_trips' => "mixed", 'pending_trips_today' => "mixed"])]
    public function calculateTripsStatistics(): array
    {
        $totalTrips = TripRequest::count();
        $totalTripsThisWeek = TripRequest::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->count();
        $totalTripsThisMonth = TripRequest::whereBetween('created_at', [now()->startOfMonth(), now()->endOfMonth()])->count();
        $pendingTrips = TripRequest::where('status', 'pending')->count();
        $pendingTripsToday = TripRequest::whereDate('created_at', now())->where('status', 'pending')->count();

        return [
            'total' => $totalTrips,
            'this_week' => $totalTripsThisWeek,
            'this_month' => $totalTripsThisMonth,
            'pending_trips' => $pendingTrips,
            'pending_trips_today' => $pendingTripsToday,
        ];
    }



    #[ArrayShape(['total' => "mixed", 'pending' => 'mixed', 'this_month' => "mixed", 'this_week' => "mixed", 'today' => "mixed"])]
    public function calculateBookingsStatistics(): array
    {
        $totalBookings = Booking::count();
        $totalBookingThisWeek = Booking::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->count();
        $totalBookingThisMonth = Booking::whereBetween('created_at', [now()->startOfMonth(), now()->endOfMonth()])->count();
        $totalBookingToday = Booking::whereDate('created_at', now())->count();

        return [
            'total' => $totalBookings,
            'this_month' => $totalBookingThisMonth,
            'this_week' => $totalBookingThisWeek,
            'today' => $totalBookingToday,
            'pending' => $totalBookingToday,
        ];
    }
}
