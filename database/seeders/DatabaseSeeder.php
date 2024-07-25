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
        $this->call(CurrencySeeder::class);
        $this->call(LaratrustSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(VehicleMakeAndModelSeeder::class);
        $this->call(DriverNeededDocTableSeeder::class);
        $this->call(CancellationReasonTableSeeder::class);
        $this->call(VehicleTypeSeeder::class);
        $this->call(DemoRegionSeeder::class);
        $this->call(ServicesSeeder::class);
        $this->call(PagesSeeder::class);
        $this->call(ThemeComponentSeeder::class);
        $this->call(MenuSeeder::class);
        $this->call(FormSeeder::class);
    }
}
