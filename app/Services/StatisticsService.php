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
        $key = auth()->id().'_trips_statistics';
        return Cache::remember($key, now()->addMinutes(30), function () {
            return $this->calculateTripsStatistics();
        });
    }

    public function getBookingsStatistics()
    {
        $key = auth()->id().'_bookings_statistic_updated';
        return Cache::remember($key, now()->addMinutes(30), function () {
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



    public function calculateBookingsStatistics(): array
    {
        if(isAdmin()){
            $totalBookings = Booking::count();
            $pendingBookingToday = Booking::where('cancelled', false)->where('completed',false)->whereBetween('created_at', [now()->startOfDay(), now()->endOfDay()])->count();
            $cancelledBookings = Booking::where('cancelled', true)->count();
            $pendingBookings = Booking::where('cancelled', false)->where('completed',false)->count();
            $totalBookingThisWeek = Booking::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->count();
            $totalBookingThisMonth = Booking::whereBetween('created_at', [now()->startOfMonth(), now()->endOfMonth()])->count();
            $totalBookingToday = Booking::whereDate('created_at', now())->count();

        }else{
            $totalBookings = Booking::where('company_id', companyId())->count();
            $totalBookingThisWeek = Booking::where('company_id', companyId())->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->count();
            $totalBookingThisMonth = Booking::where('company_id', companyId())->whereBetween('created_at', [now()->startOfMonth(), now()->endOfMonth()])->count();
            $totalBookingToday = Booking::where('company_id', companyId())->whereDate('created_at', now())->count();

            $pendingBookingToday = Booking::where('company_id', companyId())->where('cancelled', false)->where('completed',false)->whereBetween('created_at', [now()->startOfDay(), now()->endOfDay()])->count();
            $cancelledBookings = Booking::where('company_id', companyId())->where('cancelled', true)->count();
            $pendingBookings = Booking::where('company_id', companyId())->where('cancelled', false)->where('completed',false)->count();

        }

        return [
            'total' => $totalBookings,
            'this_month' => $totalBookingThisMonth,
            'this_week' => $totalBookingThisWeek,
            'today' => $totalBookingToday,
            'pending' => $pendingBookings,
            'pending_today' => $pendingBookingToday,
            'cancelled' => $cancelledBookings,
        ];
    }
}
