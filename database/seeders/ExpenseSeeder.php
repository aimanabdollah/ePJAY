<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Expense;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ExpenseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategoriIds = [5, 6, 7, 8, 9, 10, 11]; // Add more category IDs if needed

        $randomRecords = [];
        $existingIds = []; // Array to store existing ids for checking uniqueness

        // Define the date range for random dates
        $startDate = Carbon::parse('2022-01-01');
        $endDate = Carbon::parse('2023-12-31');

        for ($i = 1; $i <= 100; $i++) { // Insert 100 records
            // Generate random 6-digit number for id_trax_perbelanjaan
            do {
                $randomIdTraxPerbelanjaan = 'TBJ' . str_pad(rand(1, 9999), 6, '0', STR_PAD_LEFT);
            } while (in_array($randomIdTraxPerbelanjaan, $existingIds));

            $existingIds[] = $randomIdTraxPerbelanjaan; // Add the generated id to the existingIds array

            // Generate random jumlah_tbj between 100 and 1000
            $randomJumlahTbj = rand(100, 1000);

            // Randomly select an index from $kategoriIds array
            $randomKategoriIndex = array_rand($kategoriIds);

            // Generate random date within the defined range
            $randomDate = $this->generateRandomDate($startDate, $endDate);

            $record = [
                'id_trax_perbelanjaan' => $randomIdTraxPerbelanjaan,
                'jumlah_tbj' => $randomJumlahTbj,
                'tarikh' => $randomDate, // Use random date for each record
                'id_kategori' => $kategoriIds[$randomKategoriIndex],
                'created_at' => Carbon::now(),
            ];

            $randomRecords[] = $record;
        }

        // Use the insert() method with batching to insert records in bulk
        $chunks = array_chunk($randomRecords, 50); // Change the batch size according to your needs

        foreach ($chunks as $chunk) {
            Expense::insert($chunk);
        }
    }

    /**
     * Generate a random date between two dates.
     *
     * @param Carbon $startDate
     * @param Carbon $endDate
     * @return string
     */
    private function generateRandomDate(Carbon $startDate, Carbon $endDate): string
    {
        $timestamp = mt_rand($startDate->timestamp, $endDate->timestamp);
        return Carbon::createFromTimestamp($timestamp)->toDateString();
    }
}
