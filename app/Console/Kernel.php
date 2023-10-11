<?php

namespace App\Console;

use App\Console\Commands\ClearActivityLog;
use App\Console\Commands\DeletePendingTrips;
use App\Console\Commands\SetInactiveDriversOffline;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */


    protected $commands = [
        ClearActivityLog::class,
        DeletePendingTrips::class,
        SetInactiveDriversOffline::class,
    ];

    protected function schedule(Schedule $schedule)
    {
        // Schedule the queue:work command to run without overlapping and with 3 tries
        $schedule->command('queue:work --tries=3 --stop-when-empty')->withoutOverlapping();

        $schedule->command('app:set-inactive-drivers-offline')->everyMinute();
        $schedule->command('app:delete-pending-trips')->everyThirtyMinutes();
        $schedule->command('app:clear-activity-log')->weekly();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
