<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginControllerTest extends TestCase
{
    use DatabaseTransactions;

    // Test valid login for all users
    public function testValidIsAdminLogin()
    {
        // Create a user with admin role
        $user = User::factory()->create([
            'email' => 'admintest@gmail.com',
            'password' => bcrypt('abc12345'),
            'role' => 1, // Assuming 1 represents the admin role
        ]);

        $response = $this->post(route('login'), [
            'email' => 'admintest@gmail.com',
            'password' => 'abc12345',
        ]);

        // Assert that the user is redirected to /admin-home
        $response->assertRedirect('admin-home');
    }

    public function testValidIsStafLogin()
    {
        // Create a user with staff role
        $user = User::factory()->create([
            'email' => 'staftest@gmail.com',
            'password' => bcrypt('abc12345'),
            'role' => 2, // Assuming 2 represents the staff role
        ]);

        $response = $this->post(route('login'), [
            'email' => 'staftest@gmail.com',
            'password' => 'abc12345',
        ]);

        // Assert that the user is redirected to /staf-home
        $response->assertRedirect('staf-home');
    }

    public function testValidIsUserLogin()
    {
        // Create a user with normal user role
        $user = User::factory()->create([
            'email' => 'usertest@gmail.com',
            'password' => bcrypt('abc12345'),
            'role' => 3, // Assuming 3 represents the normal user role
        ]);

        $response = $this->post(route('login'), [
            'email' => 'usertest@gmail.com',
            'password' => 'abc12345',
        ]);

        // Assert that the user is redirected to /user-home
        $response->assertRedirect('user-home');
    }

    // Test invalid login
    public function testInvalidLogin()
    {
        // Attempt login with invalid credentials
        $response = $this->post(route('login'), [
            'email' => 'invalid@example.com',
            'password' => 'wrongpass',
        ]);

        // Assert that the login attempt fails and the user is redirected back to the login page
        $response->assertSessionHasErrors('email');
        $response->assertSessionHasErrors('password');
        $response->assertRedirect('login');
    }
}
