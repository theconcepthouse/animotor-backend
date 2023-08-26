<?php

namespace Database\Factories;

use App\Models\Car;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookingFactory extends Factory
{

    public function definition(): array
    {
        $user_id = User::whereHasRole('rider')->inRandomOrder()->first()->id;
        $car = Car::inRandomOrder()->first();
        $fee = mt_rand(10,200);
        return [
            'customer_id' => $user_id,
            'region_id' => $car->region_id,
            'company_id' => $car->company_id,
            'car_id' => $car->id,
            'fee' => $fee,
            'grand_total' => $fee,
            'reference' => getUniqueReferenceCode(),
            'booking_number' => getUniqueBookingNumber(),
            'payment_status' => 'unpaid',
            'payment_method' => 'cash',
            'pick_up_date' => Carbon::now()->addDays(3),
            'pick_up_time' => "11:20",
            'drop_off_date' => Carbon::now()->addDays(7),
            'drop_off_time' => "11:20",
            'pick_location' => $car->pick_up_location,
            'drop_off_location' => $car->pick_up_location,
        ];
    }
}
