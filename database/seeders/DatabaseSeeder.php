<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LaratrustSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(VehicleMakeAndModelSeeder::class);
        $this->call(DriverNeededDocTableSeeder::class);
        $this->call(CancellationReasonTableSeeder::class);
        $this->call(VehicleTypeSeeder::class);
        $this->call(DemoRegionSeeder::class);
        $this->call(ServicesSeeder::class);
    }
}
