<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class LoginTest extends TestCase
{
    public function test_user_login_successfully()
    {
        $user = User::factory()->create();
        $credentials = [
            'email' => $user->email,
            'password' => '12345678'
        ];

        $response = $this->post(self::URL_LOGIN,$credentials);

        $response->assertStatus(302);
        $this->assertAuthenticated();
    }

    public function test_user_login_invalid()
    {
        User::factory()->create();
        $credentials = [
            'email' => 'some@gmail.com',
            'password' => '12345678'
        ];

        $response = $this->post(self::URL_LOGIN,$credentials);

        $response->assertStatus(302);
        $response->assertInvalid(['email']);
        $this->assertGuest();
    }

    public function test_user_login_is_admin()
    {
        $user = User::factory()->create(['email' => 'admin@gmail.com', 'is_admin' => true]);
        $credentials = [
            'email' => $user->email,
            'password' => '12345678'
        ];

        $response = $this->post(self::URL_LOGIN,$credentials);

        $response->assertStatus(302);
        $this->assertAuthenticatedAs($user);
    }
}
