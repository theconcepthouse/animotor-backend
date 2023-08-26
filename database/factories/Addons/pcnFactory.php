<?php

namespace Database\Factories\Addons;

use App\Models\Addons\pcn;
use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class pcnFactory extends Factory
{
    protected $model = pcn::class;

    public function definition(): array
    {
        $booking = Booking::inRandomOrder()->first();
        return [
            'car_id' => $booking->car_id,
            'vrm' => $booking->car->registration_number,
            'booking_id' => $booking->id,
            'pcn_no' => mt_rand(100000, 999999),
            'date_time' => Carbon::now(),
            'offence_type' => 'Dart charge',
            'location' => $this->faker->address,
            'notice_issue_date' => Carbon::now(),
            'payment_dead_line' => Carbon::now()->addDays(20),
            'appeal_dead_line' => Carbon::now()->addDays(10),
            'status' => 'unpaid',
        ];
    }
}
