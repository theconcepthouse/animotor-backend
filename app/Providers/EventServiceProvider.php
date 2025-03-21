<?php

namespace App\Providers;

use App\Events\BookingConfirmed;
use App\Events\NewTrip;
use App\Events\TripAccepted;
use App\Events\TripCancelled;
use App\Events\TripEnded;
use App\Events\TripStarted;
use App\Listeners\BookingConfirmationListener;
use App\Listeners\NotifyOnlineDrivers;
use App\Listeners\TripStatusChangeListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        NewTrip::class => [
            NotifyOnlineDrivers::class,
        ],

        TripEnded::class => [
            TripStatusChangeListener::class
        ],

        TripStarted::class => [
            TripStatusChangeListener::class
        ],

        TripCancelled::class => [
            TripStatusChangeListener::class
        ],

        TripAccepted::class => [
            TripStatusChangeListener::class
        ],

        BookingConfirmed::class => [
            BookingConfirmationListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
