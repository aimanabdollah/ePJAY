<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = [
            [
                'nama' => 'Sumbangan',
                'jenis' => 'Pendapatan',
            ],
            [
                'nama' => 'Elaun',
                'jenis' => 'Pendapatan',
            ],
            [
                'nama' => 'Komisyen Jualan',
                'jenis' => 'Pendapatan',
            ],
            [
                'nama' => 'Simpanan Tunai',
                'jenis' => 'Pendapatan',
            ],
            [
                'nama' => 'Utiliti',
                'jenis' => 'Perbelanjaan',
            ],
            [
                'nama' => 'Sewaan Kediaman',
                'jenis' => 'Perbelanjaan',
            ],
            [
                'nama' => 'Pakaian',
                'jenis' => 'Perbelanjaan',
            ],
            [
                'nama' => 'Bahan mentah/asas',
                'jenis' => 'Perbelanjaan',
            ],
            [
                'nama' => 'Kesihatan',
                'jenis' => 'Perbelanjaan',
            ],
            [
                'nama' => 'Pengangkutan',
                'jenis' => 'Perbelanjaan',
            ],
            [
                'nama' => 'Makanan dan minuman',
                'jenis' => 'Perbelanjaan',
            ],
        ];

        foreach ($category as $key => $value) {
            Category::create($value);
        }
    }
}
