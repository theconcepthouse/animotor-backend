<?php

namespace App\Console\Commands;

use App\Models\ActivityLog;
use Carbon\Carbon;
use Illuminate\Console\Command;

class ClearActivityLog extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:clear-activity-log';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear activity logs';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $log_time = settings('log_max_lifespan',30);

        $time = Carbon::now()->subDays($log_time);

        ActivityLog::whereData('created_at','<', $time)->delete();

    }
}
