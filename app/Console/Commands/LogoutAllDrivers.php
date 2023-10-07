<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Laravel\Sanctum\PersonalAccessToken;

class LogoutAllDrivers extends Command
{

    protected $signature = 'sanctum:logout-all-drivers';

    protected $description = 'Logout all Drivers Sanctum tokens';

    public function handle()
    {
        $this->info('Logging out drivers tokens...');

        $user_ids = User::whereHasRole('driver')->pluck('id');

        PersonalAccessToken::whereIn('tokenable_id', $user_ids)->delete();

        $this->info(count($user_ids).' logged out');

    }
}
