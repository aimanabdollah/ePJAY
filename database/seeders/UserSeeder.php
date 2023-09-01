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
                'name' => 'Muhammad Ahmad Ali',
                'nama_panggilan' => 'Ahmad',
                'no_tel' => '014-21121124',
                'jantina' => 'Lelaki',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('abc12345'),
                'role' => 1,
                'gambar' => 'male-profile-img.jpg',

            ],
            [
                'name' => 'Nurul Hidayah Basri',
                'nama_panggilan' => 'Hidayah',
                'no_tel' => '011-21121121',
                'jantina' => 'Perempuan',
                'email' => 'staf@gmail.com',
                'password' => bcrypt('abc12345'),
                'role' => 2,
                'gambar' => 'female-profile-img.jpg',

            ],
            [
                'name' => 'Siti Aisyah Kamal',
                'nama_panggilan' => 'Aisyah',
                'no_tel' => '019-21121128',
                'jantina' => 'Perempuan',
                'email' => 'aisyah@gmail.com',
                'password' => bcrypt('abc12345'),
                'role' => 2,
                'gambar' => 'female-profile-img.jpg',

            ],
            [
                'name' => 'Khairul Hazim Khairi',
                'nama_panggilan' => 'Khairul',
                'no_tel' => '016-21121126',
                'jantina' => 'Lelaki',
                'email' => 'penjaga@gmail.com',
                'password' => bcrypt('abc12345'),
                'role' => 3,
                'gambar' => 'male-profile-img.jpg',

            ],

            [
                'name' => 'Nasri Nazri',
                'nama_panggilan' => 'Nasri',
                'no_tel' => '016-21621122',
                'jantina' => 'Lelaki',
                'email' => 'nasri@gmail.com',
                'password' => bcrypt('abc12345'),
                'role' => 3,
                'gambar' => 'male-profile-img.jpg',

            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
