<?php
use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use Illuminate\Support\Facades\Route;

class UserMiddlewareTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Test that a user with 'user' role can access user routes.
     */
    public function test_user_can_access_user_routes()
    {
        $user = User::factory()->create(['role' => 3]);
        $this->actingAs($user);

        $response = $this->get('/user-home');
        $response->assertStatus(200);
        // Add more assertions for other user routes
    }

    /**
     * Test that a user without 'user' role cannot access user routes.
     */
    public function test_non_user_cannot_access_user_routes()
    {
        $user = User::factory()->create(['role' => 1]);
        $this->actingAs($user);

        $response = $this->get('/user-home');
        $response->assertStatus(403);
        // Add more assertions for other user routes
    }
}
