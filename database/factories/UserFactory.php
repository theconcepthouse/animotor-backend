<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{

    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->unique()->phoneNumber,
            'password' => Hash::make('password'),
        ];
    }

    /**
     * Define the "after creating" callback.
     *
     * @param  \App\Models\User  $user
     * @return void
     */


    public function configure()
    {
        return $this->afterCreating(function (User $user) {
            $company = Company::factory()->create();

            $user->update([
                'company_id' => $company->id,
            ]);

            $user->addRole('owner');
        });
    }

}
