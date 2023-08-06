<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegisterControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function testValidRegistration()
    {
        $response = $this->post(route('register'), [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        // Assert that the user is redirected to the login page after successful registration
        $response->assertRedirect(route('login'));

        // Assert that the user record is saved in the database
        $this->assertDatabaseHas('users', [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'role' => 3, // Assuming the default role is 3
        ]);

        // Assert that the success flash message is present in the session
        $response->assertSessionHas('success', 'Akaun anda berjaya didaftarkan');
    }


    public function testInValidRegistration()
    {
        $response = $this->post(route('register'), [
            'name' => 'John Doe',
            'email' => 'penjaga@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);


        // Assert that the user record is saved in the database
        $this->assertDatabaseHas('users', [
            'name' => 'John Doe',
            'email' => 'penjaga@example.com',
            'role' => 3, // Assuming the default role is 3
        ]);

        //$response->assertSessionHasErrors('email');

    }
}
