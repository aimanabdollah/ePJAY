<?php
use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use Illuminate\Support\Facades\Route;

class AdminStafMiddlewareTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Test that a user with 'adminstaf' role can access adminstaf routes.
     */
    public function test_adminstaf_can_access_adminstaf_routes()
    {
        $user = User::factory()->create(['role' => 2]);
        $this->actingAs($user);

        $response = $this->get('/admin-category');
        $response->assertStatus(200);
        // Add more assertions for other adminstaf routes
    }

    /**
     * Test that a user without 'adminstaf' role cannot access adminstaf routes.
     */
    public function test_non_adminstaf_cannot_access_adminstaf_routes()
    {
        $user = User::factory()->create(['role' => 3]);
        $this->actingAs($user);

        $response = $this->get('/admin-category');
        $response->assertStatus(403);
        // Add more assertions for other adminstaf routes
    }
}
