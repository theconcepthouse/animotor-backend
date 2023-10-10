<?php

namespace App\Console\Commands;

use App\Services\UserService;
use Illuminate\Console\Command;

class SetInactiveDriversOffline extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:set-inactive-drivers-offline';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set inactive drivers offline';

    /**
     * Execute the console command.
     */
    public function handle(UserService $userService): void
    {
        $userService->setInactiveDriversOffline();
    }
}
