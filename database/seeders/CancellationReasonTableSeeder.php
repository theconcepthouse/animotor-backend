<?php

namespace Database\Seeders;

use App\Models\CancellationReason;

use Illuminate\Database\Seeder;

class CancellationReasonTableSeeder extends Seeder
{
    protected array $cancellation_reason = [
            [
                'user_type' => 'rider',
                'reason' => 'Waiting for driver long Time',
                'is_active' => 1,
            ],
            [
                'user_type' => 'rider',
                'reason' => 'Driver not moving towards pickup location',
                'is_active' => 1,
            ],
            [
                'user_type' => 'rider',
                'reason' => 'Driver took too long to accept the ride request',
                'is_active' => 1,
            ],
            [
                'user_type' => 'rider',
                'reason' => 'Found an alternative mode of transportation',
                'is_active' => 1,
            ],
            [
                'user_type' => 'rider',
                'reason' => 'Entered incorrect pickup or drop-off location',
                'is_active' => 1,
            ],
            [
                'user_type' => 'rider',
                'reason' => 'Selected the wrong service or vehicle type',
                'is_active' => 1,
            ],
            [
                'user_type' => 'rider',
                'reason' => 'Unexpected change in plans',
                'is_active' => 1,
            ],
            [
                'user_type' => 'rider',
                'reason' => 'Unable to reach the driver or contact support',
                'is_active' => 1,
            ],
            [
                'user_type' => 'rider',
                'reason' => "Driver's behavior or attitude was unacceptable",
                'is_active' => 1,
            ],
            [
                'user_type' => 'rider',
                'reason' => 'Vehicle condition or cleanliness concerns',
                'is_active' => 1,
            ],
            [
                'user_type' => 'rider',
                'reason' => 'Payment or fare-related issues',
                'is_active' => 1,
            ],
            [
                'user_type' => 'rider',
                'reason' => 'Safety or security concerns',
                'is_active' => 1,
            ],
            [
                'user_type' => 'rider',
                'reason' => 'Personal emergency or unforeseen circumstances',
                'is_active' => 1,
            ],
            [
                'user_type' => 'rider',
                'reason' => 'Unfavorable reviews or ratings of the driver',
                'is_active' => 1,
            ],
            [
                'user_type' => 'rider',
                'reason' => 'Technical issues with the app or device',
                'is_active' => 1,
            ],
            [
                'user_type' => 'driver',
                'reason' => 'Waiting for rider long Time',
                'is_active' => 1,
            ],
            [
                'user_type' => 'driver',
                'reason' => 'Rider not at the pickup location',
                'is_active' => 1,
            ],
            [
                'user_type' => 'driver',
                'reason' => 'Took another ride request with a higher fare',
                'is_active' => 1,
            ],
            [
                'user_type' => 'driver',
                'reason' => 'Vehicle breakdown or maintenance issue',
                'is_active' => 1,
            ],
            [
                'user_type' => 'driver',
                'reason' => 'Unexpected change in plans',
                'is_active' => 1,
            ],
            [
                'user_type' => 'driver',
                'reason' => 'Unable to reach the rider',
                'is_active' => 1,
            ],
            [
                'user_type' => 'driver',
                'reason' => 'Safety or security concerns',
                'is_active' => 1,
            ],
            [
                'user_type' => 'driver',
                'reason' => 'Personal emergency or unforeseen circumstances',
                'is_active' => 1,
            ],
            [
                'user_type' => 'driver',
                'reason' => 'Technical issues with the app or device',
                'is_active' => 1,
            ]
    ];


    public function run()
    {
        $created_params = $this->cancellation_reason;

        $count = CancellationReason::count();

        if($count < 1)
        {
            foreach ($created_params as $reason)
            {
                CancellationReason::create($reason);
            }
        }

    }
}
