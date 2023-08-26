<?php

namespace Database\Seeders;

use App\Models\Addons\pcn;

use Illuminate\Database\Seeder;

class PCNSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        pcn::factory(10)->create();
    }
}
