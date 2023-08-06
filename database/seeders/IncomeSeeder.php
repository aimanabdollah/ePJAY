<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Income;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class IncomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategoriIds = [1, 2, 3, 4]; // Add more category IDs if needed

        $randomRecords = [];
        $existingIds = []; // Array to store existing ids for checking uniqueness

        // Define the date range for random dates
        $startDate = Carbon::parse('2022-01-01');
        $endDate = Carbon::parse('2023-12-31');

        for ($i = 1; $i <= 100; $i++) { // Insert 100 records
            // Generate random 6-digit number for id_trax_pendapatan
            do {
                $randomIdTraxPendapatan = 'TPN' . str_pad(rand(1, 9999), 6, '0', STR_PAD_LEFT);
            } while (in_array($randomIdTraxPendapatan, $existingIds));

            $existingIds[] = $randomIdTraxPendapatan; // Add the generated id to the existingIds array

            // Generate random jumlah_tpn between 100 and 1000
            $randomJumlahTpn = rand(100, 1000);

            // Randomly select an index from $kategoriIds array
            $randomKategoriIndex = array_rand($kategoriIds);

            // Generate random date within the defined range
            $randomDate = $this->generateRandomDate($startDate, $endDate);

            $record = [
                'id_trax_pendapatan' => $randomIdTraxPendapatan,
                'jumlah_tpn' => $randomJumlahTpn,
                'tarikh' => $randomDate, // Use random date for each record
                'id_kategori' => $kategoriIds[$randomKategoriIndex],
                'created_at' => Carbon::now(),
            ];

            $randomRecords[] = $record;
        }

        // Use the insert() method with batching to insert records in bulk
        $chunks = array_chunk($randomRecords, 50); // Change the batch size according to your needs

        foreach ($chunks as $chunk) {
            Income::insert($chunk);
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
