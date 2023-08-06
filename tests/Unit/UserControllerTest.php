<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Test that authenticated users can access their own edit profile page.
     */
    public function test_authenticated_user_can_access_own_edit_profile()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->get(route('profile.edit', ['user' => $user->id]));

        $response->assertStatus(200);
        $response->assertViewIs('admin.pengguna.edit_profil');
        $response->assertViewHas('user', $user);
    }

    /**
     * Test that authenticated users cannot access the edit profile page of other users.
     */
    public function test_authenticated_user_cannot_access_other_user_edit_profile()
    {
        $user = User::factory()->create();
        $otherUser = User::factory()->create();

        $response = $this->actingAs($user)
            ->get(route('profile.edit', ['user' => $otherUser->id]));

        $response->assertStatus(403);
    }
}
