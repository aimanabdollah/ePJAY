<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Configuration;

class ConfigurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $configuration = [
            [
                'nama_sistem' => 'Sistem Pengurusan Pusat Jagaan Anak Yatim',
                'singkatan_sistem' => 'ePJAY',
                'nama_pusat_jagaan' => 'Rumah Bakti Dato Harun',
                'alamat1' => 'KM 11, Jalan Hulu Kelang',
                'poskod' => '68000',
                'bandar' => 'Ampang',
                'negeri' => 'Selangor',
                'emel' => 'rmhbakti@hotmail.com',
                'no_tel' => '03-42568880',

                'logo_sistem' => 'epjay.png',
                'logo_pusat_jagaan' => 'rbdh.png'
            ],
        ];

        foreach ($configuration as $key => $value) {
            Configuration::create($value);
        }
    }
}
