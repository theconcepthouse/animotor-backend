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
        $users = User::factory(10)->create();


        $users->each(function ($user) {
            $user->addRole('owner');
            $company = Company::factory()->create();
            $user->update([
                'company_id' => $company->id,
            ]);
        });
    }
}
