<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserTest extends TestCase
{

    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        Artisan::call('db:seed');

    }

    public function test_customer_login(): void
    {
        $plainPassword = 'password';
        $user = User::factory()->create([
            'password' => Hash::make($plainPassword),
        ]);

        $response = $this->post('/api/v1/auth/login', [
            'email' => $user->email,
            'password' => $plainPassword,
        ]);

        $response->assertStatus(200);
    }

    public function test_rider_registration(): void
    {
        $response = $this->post('/api/v1/auth/register', [
            'email' => 'johndoetest@gmail.com',
            'first_name' => 'John',
            'last_name' => 'Test',
            'country' => 'United state',
            'country_code' => '+1',
            'role' => 'rider',
            'phone' => mt_rand(1000000000, 9999999999),
        ]);

        $response->assertStatus(200);
    }

    public function test_driver_registration(): void
    {
        $response = $this->post('/api/v1/auth/register', [
            'email' => 'driver@gmail.com',
            'first_name' => 'John',
            'last_name' => 'Test',
            'country' => 'United state',
            'country_code' => '+1',
            'role' => 'driver',
            'phone' => mt_rand(1000000000, 9999999999),
        ]);

        $response->assertStatus(200);
    }

}
