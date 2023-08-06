<?php

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use Illuminate\Support\Facades\Route;

class StafMiddlewareTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Test that a user with 'staf' role can access staf routes.
     */
    public function test_staf_can_access_staf_routes()
    {
        $user = User::factory()->create(['role' => 2]);
        $this->actingAs($user);

        $response = $this->get('/staf-home');
        $response->assertStatus(200);
        // Add more assertions for other staf routes
    }

    /**
     * Test that a user without 'staf' role cannot access staf routes.
     */
    public function test_non_staf_cannot_access_staf_routes()
    {
        $user = User::factory()->create(['role' => 3]);
        $this->actingAs($user);

        $response = $this->get('/staf-home');

        $response->assertStatus(403);
        // Add more assertions for other staf routes
    }
}
