<?php

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use Illuminate\Support\Facades\Route;

class AdminMiddlewareTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * Test that a user with 'admin' role can access admin routes.
     */
    public function test_admin_can_access_admin_routes()
    {
        $user = User::factory()->create(['role' => 1]);
        $this->actingAs($user);

        $response = $this->get('/admin-home');
        $response->assertStatus(200);
        // Add more assertions for other admin routes
    }

    /**
     * Test that a user without 'admin' role cannot access admin routes.
     */
    public function test_non_admin_cannot_access_admin_routes()
    {
        $user = User::factory()->create(['role' => 3]);
        $this->actingAs($user);

        $response = $this->get('/admin-home');
        $response->assertStatus(403);
        // Add more assertions for other admin routes
    }
}
