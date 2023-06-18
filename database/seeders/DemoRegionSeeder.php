<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DemoRegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Region::count() < 1){


            Region::create([
                'name' => 'World Demo',
                'currency_code' => '$',
                'currency_symbol' => 'USD',
                'is_active' => true,
            ]);

        }
    }
}
