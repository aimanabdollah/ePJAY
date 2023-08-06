<?php

namespace Tests\Unit;

use App\Models\User;
use App\Models\Configuration;
use App\Http\Controllers\ConfigurationController;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ConfigurationControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function test_update_system_with_valid_data()
    {
        // Assuming you have a user with role = 1 in your database
        $userWithRole1 = User::factory()->create([
            'role' => 1,
        ]);

        // Use actingAs to simulate an authenticated user with role = 1
        $this->actingAs($userWithRole1);

        // Get an existing configuration record from the database for updating
        $existingConfiguration = Configuration::latest()->first();

        // Create a request with valid data
        $data = [
            'nama_sistem' => 'New System Name',
            'singkatan_sistem' => 'NSN',
        ];

        $response = $this->patch(route('configuration.updateSys',  $existingConfiguration->id), $data);

        $response->assertRedirect(route('configuration.index'));

        $this->assertDatabaseHas('configurations', [
            'id' => $existingConfiguration->id,
            'nama_sistem' => 'New System Name',
            'singkatan_sistem' => 'NSN',
        ]);
    }

}
