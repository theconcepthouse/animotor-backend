<?php

namespace App\Console\Commands;

use App\Services\TripRequestService;
use Illuminate\Console\Command;

class DeletePendingTrips extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:delete-pending-trips';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete pending trips';

    /**
     * Execute the console command.
     */
    public function handle(TripRequestService $tripRequestService)
    {
        $tripRequestService->deletePendingTrips();
    }
}
