<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('abc12345'),
                'role' => 1,

            ],
            [
                'name' => 'Staf',
                'email' => 'staf@gmail.com',
                'password' => bcrypt('abc12345'),
                'role' => 2,

            ],
            [
                'name' => 'Penjaga',
                'email' => 'penjaga@gmail.com',
                'password' => bcrypt('abc12345'),
                'role' => 3,

            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
