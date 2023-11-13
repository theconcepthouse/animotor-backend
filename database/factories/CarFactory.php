<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Region;
use App\Models\VehicleMake;
use App\Models\VehicleModel;
use App\Models\VehicleType;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $security_depo = "At the counter, the car hire company will block a deposit amount on your credit card. You could lose your whole deposit if the car is damaged or stolen, but as long as you have our Full Protection ";
        $mil = "Your rental includes 100 free miles per rental. If you drive more than this, you'll pay £ 0.30 (including tax) for each additional mile when you drop your car off.";
        $pickup_ins = "A shuttle will take you to the rental counter. From T1: Exit Arrivals, turn left and wait at bus stop E. From T2: Exit Arrivals via the ground level, continue straight and wait at bus stop F. From T3: Go to T1 and follow the instructions for that terminal.";
        $drop_ins = "The procedure for returning the vehicle will be explained to you at the rental counter.";

        $excess = "At the counter, the car hire company will block a deposit amount on your credit card. You could lose your whole deposit if the car is damaged or stolen, but as long as you have our Full Protection ";

        $make = VehicleMake::inRandomOrder()->first()->name;
        $model = VehicleModel::inRandomOrder()->first()->name;
        return [
            'make' => $make,
            'type' => VehicleType::inRandomOrder()->first()->name,
            'region_id' => Region::withoutAirport()->inRandomOrder()->first()->id,
            'company_id' => Company::inRandomOrder()->first()->id,
            'door' => $this->faker->randomElement([2, 4]),
            'year' => $this->faker->numberBetween(2000, 2023),
            'color' => $this->faker->colorName,
            'model' =>  $model,
            'vehicle_no' => $this->faker->regexify('[A-Z0-9]{7}'),
            'registration_number' => $this->faker->regexify('[A-Z0-9]{7}'),
            'gear' => $this->faker->randomElement(['Automatic', 'Manual']),
            'title' => $make . ' ' . $model. ' '.$this->faker->colorName,
            'deposit' => $this->faker->numberBetween(100, 1000),
            'bags' => $this->faker->numberBetween(1, 3).' Lag bags',
            'cancellation_fee' => $this->faker->numberBetween(0, 100),
            'price_per_mileage' => $this->faker->randomFloat(2, 0.1, 2),
            'price_per_day' => $this->faker->numberBetween(10, 300),
            'mileage' => $this->faker->numberBetween(0, 100),
            'map_lat' => $this->faker->latitude,
            'map_lng' => $this->faker->longitude,
            'air_condition' => $this->faker->boolean,
            'seats' => $this->faker->numberBetween(2, 8),
            'pick_up_location' => $this->faker->address,
            'insurance_fee' => $this->faker->numberBetween(20, 200),
            'requirements' => "Drivers license, passport, driving permit",
            'security_deposit' => $security_depo,
            'damage_excess' => $excess,
            'mileage_text' => $mil,

            'drop_off_instruction' => $drop_ins,
            'pickup_instruction' => $pickup_ins,
        ];
    }
}
