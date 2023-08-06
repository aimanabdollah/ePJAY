<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use App\Models\Income;
use App\Models\Expense;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            ConfigurationSeeder::class,
            UserSeeder::class,
            CategorySeeder::class,
            IncomeSeeder::class,
            ExpenseSeeder::class,
            ApplicationSeeder::class,
            OrphanSeeder::class,
        ]);
    }
}
