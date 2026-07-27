<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\RateLimiter;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_screen_can_be_rendered(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
        $response->assertSee('Login');
    }

    public function test_users_can_authenticate_using_the_login_screen(): void
    {
        $user = User::factory()->create([
            'nip' => '123456789',
            'password' => bcrypt('password'),
        ]);

        $response = $this->post('/login', [
            'nip' => '123456789',
            'password' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(route('admin.dashboard'));
    }

    public function test_users_can_not_authenticate_with_invalid_password(): void
    {
        $user = User::factory()->create([
            'nip' => '123456789',
            'password' => bcrypt('password'),
        ]);

        $response = $this->post('/login', [
            'nip' => '123456789',
            'password' => 'wrong-password',
        ]);

        $this->assertGuest();
        $response->assertSessionHasErrors('nip');
    }

    public function test_login_is_rate_limited(): void
    {
        $user = User::factory()->create([
            'nip' => '123456789',
            'password' => bcrypt('password'),
        ]);

        // Fail 5 times
        for ($i = 0; $i < 5; $i++) {
            $this->post('/login', [
                'nip' => '123456789',
                'password' => 'wrong-password',
            ]);
        }

        // 6th attempt should be blocked
        $response = $this->post('/login', [
            'nip' => '123456789',
            'password' => 'wrong-password',
        ]);

        $response->assertSessionHasErrors('nip');
        // The error message for rate limiting in Laravel usually contains 'seconds'
        $this->assertStringContainsString('seconds', session('errors')->first('nip'));
    }

    public function test_users_can_logout(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/logout');

        $this->assertGuest();
        $response->assertRedirect(route('login'));
    }

    public function test_authenticated_users_are_redirected_away_from_login(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/login');

        $response->assertRedirect(route('admin.dashboard'));
    }
}
