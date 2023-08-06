<?php

namespace Tests\Unit;

use App\Models\User;
use App\Models\Expense;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExpenseControllerTest extends TestCase
{
    use DatabaseTransactions;

    // Test case for adding a valid expense record
    public function testAddExpense()
    {
        // Assuming you have a user with role = 1 in your database
        $userWithRole1 = User::factory()->create([
            'role' => 1,
        ]);

        // Use actingAs to simulate an authenticated user with role = 1
        $this->actingAs($userWithRole1);

        // Prepare the data for adding the expense record
        $requestData = [
            'kategori' => 3,
            'tarikh' => '2023-08-03',
            'jumlah' => 1200,
            'catatan' => 'test',
        ];

        // Make the POST request with the valid data to add the expense record
        $response = $this->post(route('expense.store'), $requestData);

        // Assert that the response redirects back to the expense index page after adding expense
        $response->assertRedirect(route('expense.index'));

        // Assert that the expense record is saved in the database
        $this->assertDatabaseHas('expenses', [
            'id_kategori' => 3,
            'tarikh' => '2023-08-03',
            'jumlah_tbj' => 1200,
            'catatan' => 'test',
        ]);
    }

    // Test case for updating a valid expense record
    public function testUpdateExpense()
    {
        // Assuming you have a user with role = 1 in your database
        $userWithRole1 = User::factory()->create([
            'role' => 1,
        ]);

        // Simulate an authenticated user with role = 1
        $this->actingAs($userWithRole1);

        // Get an existing expense record from the database for updating
        $existingExpense = Expense::latest()->first();

        // Prepare the data for the update request
        $requestData = [
            'kategori' => 3,
            'tarikh' => '2023-08-03',
            'jumlah' => 1200,
            'catatan' => 'updated test',
        ];

        // Make the PATCH request to update the existing expense record
        $response = $this->patch(route('expense.update', $existingExpense->id), $requestData);

        // Assert that the response redirects back to the expense index page after updating expense
        $response->assertRedirect(route('expense.index'));

        // Optional: You can also check if the database was affected by the update attempt
        $this->assertDatabaseHas('expenses', [
            'id' => $existingExpense->id,
            'id_kategori' => 3,
            'tarikh' => '2023-08-03',
            'jumlah_tbj' => 1200,
            'catatan' => 'updated test',
        ]);
    }

    // Test case for permanently deleting an existing expense record
    public function testDeleteExpense()
    {
        // Assuming you have a user with role = 1 in your database
        $userWithRole1 = User::factory()->create([
            'role' => 1,
        ]);

        // Simulate an authenticated user with role = 1
        $this->actingAs($userWithRole1);

        // Get an existing expense record from the database for deletion
        $existingExpense = Expense::latest()->first();

        // Make the DELETE request to delete the existing expense record
        $response = $this->delete(route('expense.destroy', $existingExpense->id));

        // Assert that the response redirects back to the expense index page after deleting expense
        $response->assertRedirect(route('expense.index'));

        // Assert that the expense record is no longer in the database
        $this->assertDatabaseMissing('expenses', [
            'id' => $existingExpense->id,
        ]);
    }
}
