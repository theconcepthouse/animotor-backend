<?php

namespace Modules\Hotel\Database\Seeders;

use App\Models\Company;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Hotel\Entities\Hotel;

class HotelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hotel_admin = Role::where('name', 'hotel_admin')->first();

        if(!$hotel_admin){
            Role::create([
                'name' => 'hotel_admin',
                'display_name' => 'hotel admin',
                'description' => 'hotel admin',
            ]);
        }

        $users = User::factory(10)->create();

        $users->each(function ($user) {
            $user->addRole('hotel_admin');
            Hotel::factory()->create([
                'user_id' => $user->id
            ]);
        });
    }
}
