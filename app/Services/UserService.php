<?php

namespace App\Services;

use App\Models\User;
use App\Services\Firebase\FirestoreService;
use Carbon\Carbon;

class UserService
{
    public function setInactiveDriversOffline(): void
    {
        $firestoreService = new FirestoreService();
        $time = settings('set_driver_offline_after', 30);
        $date_time = Carbon::now()->subMinutes($time);
        $users = User::whereHasRole('driver')->whereDate('last_location_update', '<', $date_time)
            ->orWhereNull('last_location_update')->get();

        if(count($users) > 0){
            $message = count($users).' drivers automatically logged out after '.$time.' minutes of inactivity';
            log_activity('drivers_auto_logout', $message);
            foreach ($users as $user){
                $user->is_online = false;
                $user->save();
                $firestoreService->updateUser($user);
            }
        }
    }
}
