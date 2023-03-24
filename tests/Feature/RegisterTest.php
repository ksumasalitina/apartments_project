<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    public function test_user_register_successfully()
    {
        $user = [
            'first_name' => fake()->firstName,
            'last_name' => fake()->lastName,
            'email' => 'test@gmail.com',
            'password' => '12345678',
            'password_confirmation' => '12345678',
            'dob' => '2000-01-01',
            'phone' => fake()->phoneNumber,
            'nationality' => fake()->country
        ];

        $response = $this->post(self::URL_REGISTER, $user);

        $response->assertStatus(302);
        $this->assertDatabaseHas('users', [
            'email' => 'test@gmail.com',
        ]);
    }

    public function test_user_register_invalid()
    {
        $user = [
            'first_name' => '',
            'last_name' => fake()->lastName,
            'email' => 'test@gmail.com',
            'password' => '12345678',
            'password_confirmation' => '12345678',
            'dob' => '2000-01-01',
            'phone' => fake()->phoneNumber,
            'nationality' => fake()->country
        ];

        $response = $this->post(self::URL_REGISTER, $user);

        $response->assertStatus(302);
        $this->assertDatabaseMissing('users', [
            'email' => 'test@gmail.com',
        ]);
        $response->assertInvalid(['first_name']);
    }

    public function test_user_email_already_exists()
    {
        User::factory();
        $user = [
            'first_name' => fake()->firstName,
            'last_name' => fake()->lastName,
            'email' => 'test@gmail.com',
            'password' => '12345678',
            'password_confirmation' => '12345678',
            'dob' => '2000-01-01',
            'phone' => fake()->phoneNumber,
            'nationality' => fake()->country
        ];

        $response = $this->post(self::URL_REGISTER, $user);

        $response->assertStatus(302);
    }
}
