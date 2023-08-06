<?php

namespace Tests\Unit;

use App\Models\User;
use App\Models\Income;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IncomeControllerTest extends TestCase
{
    use DatabaseTransactions;

    // Test case for adding a valid income record
    public function testAddIncome()
    {
        // Assuming you have a user with role = 1 in your database
        $userWithRole1 = User::factory()->create([
            'role' => 1,
        ]);

        // Use actingAs to simulate an authenticated user with role = 1
        $this->actingAs($userWithRole1);

        // Prepare the data for adding the income record
        $requestData = [
            'kategori' => 3,
            'tarikh' => '2023-08-03',
            'jumlah' => 1200,
            'catatan' => 'test',
        ];

        // Make the POST request with the valid data to add the income record
        $response = $this->post(route('income.store'), $requestData);

        // Assert that the response redirects back to the income index page after adding income
        $response->assertRedirect(route('income.index'));

        // Assert that the income record is saved in the database
        $this->assertDatabaseHas('incomes', [
            'id_kategori' => 3,
            'tarikh' => '2023-08-03',
            'jumlah_tpn' => 1200,
            'catatan' => 'test',
        ]);
    }

    // Test case for updating a valid income record
    public function testUpdateIncome()
    {
        // Assuming you have a user with role = 1 in your database
        $userWithRole1 = User::factory()->create([
            'role' => 1,
        ]);

        // Simulate an authenticated user with role = 1
        $this->actingAs($userWithRole1);

        // Get an existing income record from the database for updating
        $existingIncome = Income::latest()->first();

        // Prepare the data for the update request
        $requestData = [
            'kategori' => 3,
            'tarikh' => '2023-08-03',
            'jumlah' => 1200,
            'catatan' => 'updated test',
        ];

        // Make the PATCH request to update the existing income record
        $response = $this->patch(route('income.update', $existingIncome->id), $requestData);

        // Assert that the response redirects back to the income index page after updating income
        $response->assertRedirect(route('income.index'));

        // Optional: You can also check if the database was affected by the update attempt
        $this->assertDatabaseHas('incomes', [
            'id' => $existingIncome->id,
            'id_kategori' => 3,
            'tarikh' => '2023-08-03',
            'jumlah_tpn' => 1200,
            'catatan' => 'updated test',
        ]);
    }

        // Test case for permanently deleting an existing income record
    public function testDeleteIncome()
    {
        // Assuming you have a user with role = 1 in your database
        $userWithRole1 = User::factory()->create([
            'role' => 1,
        ]);

        // Simulate an authenticated user with role = 1
        $this->actingAs($userWithRole1);

        // Get an existing income record from the database for deletion
        $existingIncome = Income::latest()->first();

        // Make the DELETE request to delete the existing income record
        $response = $this->delete(route('income.destroy', $existingIncome->id));

        // Assert that the response redirects back to the income index page after deleting income
        $response->assertRedirect(route('income.index'));

        // Assert that the income record is no longer in the database
        $this->assertDatabaseMissing('incomes', [
            'id' => $existingIncome->id,
        ]);
    }
}
