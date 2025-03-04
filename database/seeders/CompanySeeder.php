<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        Company::create([
            'name' => 'ANI Motors',
            'address' => '123 Tech Street',
            'postal_code' => '10001',
            'city' => 'UK',
            'state' => 'London',
            'country' => 'United Kingdom',
            'tin' => '123456789',
            'contact_name' => 'animotor',
            'contact_phone' => '+448001234567',
            'contact_email' => 'info@animotor.co.uk',
        ]);
    }

//    public function run(): void
//    {
//        $users = User::factory(10)->create();
//
//
//        $users->each(function ($user) {
//            $user->addRole('owner');
//            $company = Company::factory()->create();
//            $user->update([
//                'company_id' => $company->id,
//            ]);
//        });
//    }
}
