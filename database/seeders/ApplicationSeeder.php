<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Application;
use Carbon\Carbon;

class ApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $application = [
            [
                'id_permohonan' => 'PMH000001',
                'id_anak_jagaan' => 'AKG000001',
                'status_permohonan' => 'Dalam Proses',
                'created_at' => Carbon::now()->subDays(5),

                'id_pemohon' => 3,
                'nama_penuh_pemohon' => 'Khairul Hazim bin Khairi',
                'no_tel_pemohon' => '011-2330093',
                'email_pemohon' => 'khairul@gmail.com',
                'pekerjaan_pemohon' => 'Guru',
                'hubungan_pemohon' => 'Bapa Saudara',

                'nama_penuh' => 'Hasif bin Khalif',
                'nama_sekolah' => 'Sekolah kebangsaan Perdana',
                'tarikh_lahir' => '2006-05-20',

                'alamat' => 'No 12, Jalan 4 Taman Perdana',
                'poskod' => '43455',
                'bandar' => 'Kajang',
                'negeri' => 'Selangor',

                'no_kad_pengenalan' => '000000110000',
                'no_telefon' => '01121121123',
                'jantina' => 'Lelaki',
                'status' => 'Kehilangan Ayah',

                'nama_penuh_ayah' => 'Khalif bin Khairi',
                'no_kad_pengenalan_ayah' => '760000000000',
                'no_telefon_ayah' => '01121121121',
                'pekerjaan_ayah' => NULL,
                'pendapatan_ayah' => NULL,

                'nama_penuh_ibu' => 'Siti binti Amri',
                'no_kad_pengenalan_ibu' => '770000000000',
                'no_telefon_ibu' => '01121121121',
                'pekerjaan_ibu' => NULL,
                'pendapatan_ibu' => NULL,

                'gambar' => 'seed1.jpg',
                'sijil_lahir' => '001_sijil_lahir.pdf',
                'sijil_kematian' => '001_sijil_kematian.pdf',
            ],

            [
                'id_permohonan' => 'PMH000002',
                'id_anak_jagaan' => 'AKG000002',
                'status_permohonan' => 'Berjaya',
                'status_pendaftaran' => 'Dalam Proses',
                'tarikh_daftar' => Carbon::now()->addDays(10),
                'created_at' => Carbon::now()->subDays(25),

                'id_pemohon' => 3,
                'nama_penuh_pemohon' => 'Khairul Hazim bin Khairi',
                'no_tel_pemohon' => '011-2330093',
                'email_pemohon' => 'khairul@gmail.com',
                'pekerjaan_pemohon' => 'Guru',
                'hubungan_pemohon' => 'Bapa Saudara',

                'nama_penuh' => 'Bakri bin Khalif',
                'nama_sekolah' => 'Sekolah kebangsaan Perdana',
                'tarikh_lahir' => '2006-05-20',

                'alamat' => 'No 12, Jalan 4 Taman Perdana',
                'poskod' => '43455',
                'bandar' => 'Kajang',
                'negeri' => 'Selangor',

                'no_kad_pengenalan' => '000000110000',
                'no_telefon' => '01121121123',
                'jantina' => 'Lelaki',
                'status' => 'Kehilangan Ayah',

                'nama_penuh_ayah' => 'Khalif bin Khairi',
                'no_kad_pengenalan_ayah' => '760000000000',
                'no_telefon_ayah' => '01121121121',
                'pekerjaan_ayah' => NULL,
                'pendapatan_ayah' => NULL,

                'nama_penuh_ibu' => 'Siti binti Amri',
                'no_kad_pengenalan_ibu' => '770000000000',
                'no_telefon_ibu' => '01121121121',
                'pekerjaan_ibu' => NULL,
                'pendapatan_ibu' => NULL,

                'gambar' => 'seed1.jpg',
                'sijil_lahir' => '001_sijil_lahir.pdf',
                'sijil_kematian' => '001_sijil_kematian.pdf',
            ],

            [
                'id_permohonan' => 'PMH000003',
                'id_anak_jagaan' => 'AKG000003',
                'status_permohonan' => 'Berjaya',
                'status_pendaftaran' => 'Dalam Proses',
                'tarikh_daftar' => Carbon::now()->addDays(5),
                'created_at' => Carbon::now()->subDays(7),

                'id_pemohon' => 3,
                'nama_penuh_pemohon' => 'Khairul Hazim bin Khairi',
                'no_tel_pemohon' => '011-2330093',
                'email_pemohon' => 'khairul@gmail.com',
                'pekerjaan_pemohon' => 'Guru',
                'hubungan_pemohon' => 'Bapa Saudara',

                'nama_penuh' => 'Sufian bin Khalif',
                'nama_sekolah' => 'Sekolah kebangsaan Perdana',
                'tarikh_lahir' => '2006-05-20',

                'alamat' => 'No 12, Jalan 4 Taman Perdana',
                'poskod' => '43455',
                'bandar' => 'Kajang',
                'negeri' => 'Selangor',

                'no_kad_pengenalan' => '000000110000',
                'no_telefon' => '01121121123',
                'jantina' => 'Lelaki',
                'status' => 'Kehilangan Ayah',

                'nama_penuh_ayah' => 'Khalif bin Khairi',
                'no_kad_pengenalan_ayah' => '760000000000',
                'no_telefon_ayah' => '01121121121',
                'pekerjaan_ayah' => NULL,
                'pendapatan_ayah' => NULL,

                'nama_penuh_ibu' => 'Siti binti Amri',
                'no_kad_pengenalan_ibu' => '770000000000',
                'no_telefon_ibu' => '01121121121',
                'pekerjaan_ibu' => NULL,
                'pendapatan_ibu' => NULL,

                'gambar' => 'seed1.jpg',
                'sijil_lahir' => '001_sijil_lahir.pdf',
                'sijil_kematian' => '001_sijil_kematian.pdf',
            ],

            [
                'id_permohonan' => 'PMH000004',
                'id_anak_jagaan' => 'AKG000004',
                'status_permohonan' => 'Tidak Berjaya',
                'created_at' => Carbon::now()->subDays(8),

                'id_pemohon' => 3,
                'nama_penuh_pemohon' => 'Khairul Hazim bin Khairi',
                'no_tel_pemohon' => '011-2330093',
                'email_pemohon' => 'khairul@gmail.com',
                'pekerjaan_pemohon' => 'Guru',
                'hubungan_pemohon' => 'Bapa Saudara',

                'nama_penuh' => 'Amri bin Khalif',
                'nama_sekolah' => 'Sekolah kebangsaan Perdana',
                'tarikh_lahir' => '2006-05-20',

                'alamat' => 'No 12, Jalan 4 Taman Perdana',
                'poskod' => '43455',
                'bandar' => 'Kajang',
                'negeri' => 'Selangor',

                'no_kad_pengenalan' => '000000110000',
                'no_telefon' => '01121121123',
                'jantina' => 'Lelaki',
                'status' => 'Kehilangan Ayah',

                'nama_penuh_ayah' => 'Khalif bin Khairi',
                'no_kad_pengenalan_ayah' => '760000000000',
                'no_telefon_ayah' => '01121121121',
                'pekerjaan_ayah' => NULL,
                'pendapatan_ayah' => NULL,

                'nama_penuh_ibu' => 'Siti binti Amri',
                'no_kad_pengenalan_ibu' => '770000000000',
                'no_telefon_ibu' => '01121121121',
                'pekerjaan_ibu' => NULL,
                'pendapatan_ibu' => NULL,

                'gambar' => 'seed1.jpg',
                'sijil_lahir' => '001_sijil_lahir.pdf',
                'sijil_kematian' => '001_sijil_kematian.pdf',
            ],

            [
                'id_permohonan' => 'PMH000005',
                'id_anak_jagaan' => 'AKG000005',
                'status_permohonan' => 'Dalam Proses',
                'created_at' => Carbon::now()->subDays(20),

                'id_pemohon' => 3,
                'nama_penuh_pemohon' => 'Khairul Hazim bin Khairi',
                'no_tel_pemohon' => '011-2330093',
                'email_pemohon' => 'khairul@gmail.com',
                'pekerjaan_pemohon' => 'Guru',
                'hubungan_pemohon' => 'Bapa Saudara',

                'nama_penuh' => 'Mukri bin Khalif',
                'nama_sekolah' => 'Sekolah kebangsaan Perdana',
                'tarikh_lahir' => '2006-05-20',

                'alamat' => 'No 12, Jalan 4 Taman Perdana',
                'poskod' => '43455',
                'bandar' => 'Kajang',
                'negeri' => 'Selangor',

                'no_kad_pengenalan' => '000000110000',
                'no_telefon' => '01121121123',
                'jantina' => 'Lelaki',
                'status' => 'Kehilangan Ayah',

                'nama_penuh_ayah' => 'Khalif bin Khairi',
                'no_kad_pengenalan_ayah' => '760000000000',
                'no_telefon_ayah' => '01121121121',
                'pekerjaan_ayah' => NULL,
                'pendapatan_ayah' => NULL,

                'nama_penuh_ibu' => 'Siti binti Amri',
                'no_kad_pengenalan_ibu' => '770000000000',
                'no_telefon_ibu' => '01121121121',
                'pekerjaan_ibu' => NULL,
                'pendapatan_ibu' => NULL,

                'gambar' => 'seed1.jpg',
                'sijil_lahir' => '001_sijil_lahir.pdf',
                'sijil_kematian' => '001_sijil_kematian.pdf',
            ],

            [
                'id_permohonan' => 'PMH000006',
                'id_anak_jagaan' => 'AKG000006',
                'status_permohonan' => 'Berjaya',
                'status_pendaftaran' => 'Dalam Proses',
                'tarikh_daftar' => Carbon::now()->addDays(15),
                'created_at' => Carbon::now()->subDays(13),

                'id_pemohon' => 3,
                'nama_penuh_pemohon' => 'Khairul Hazim bin Khairi',
                'no_tel_pemohon' => '011-2330093',
                'email_pemohon' => 'khairul@gmail.com',
                'pekerjaan_pemohon' => 'Guru',
                'hubungan_pemohon' => 'Bapa Saudara',

                'nama_penuh' => 'Daus bin Khalif',
                'nama_sekolah' => 'Sekolah kebangsaan Perdana',
                'tarikh_lahir' => '2006-05-20',

                'alamat' => 'No 12, Jalan 4 Taman Perdana',
                'poskod' => '43455',
                'bandar' => 'Kajang',
                'negeri' => 'Selangor',

                'no_kad_pengenalan' => '000000110000',
                'no_telefon' => '01121121123',
                'jantina' => 'Lelaki',
                'status' => 'Kehilangan Ayah',

                'nama_penuh_ayah' => 'Khalif bin Khairi',
                'no_kad_pengenalan_ayah' => '760000000000',
                'no_telefon_ayah' => '01121121121',
                'pekerjaan_ayah' => NULL,
                'pendapatan_ayah' => NULL,

                'nama_penuh_ibu' => 'Siti binti Amri',
                'no_kad_pengenalan_ibu' => '770000000000',
                'no_telefon_ibu' => '01121121121',
                'pekerjaan_ibu' => NULL,
                'pendapatan_ibu' => NULL,

                'gambar' => 'seed1.jpg',
                'sijil_lahir' => '001_sijil_lahir.pdf',
                'sijil_kematian' => '001_sijil_kematian.pdf',
            ],

            [
                'id_permohonan' => 'PMH000007',
                'id_anak_jagaan' => 'AKG000007',
                'status_permohonan' => 'Berjaya',
                'status_pendaftaran' => 'Dalam Proses',
                'tarikh_daftar' => Carbon::now()->addDays(5),
                'created_at' => Carbon::now()->subDays(4),

                'id_pemohon' => 3,
                'nama_penuh_pemohon' => 'Khairul Hazim bin Khairi',
                'no_tel_pemohon' => '011-2330093',
                'email_pemohon' => 'khairul@gmail.com',
                'pekerjaan_pemohon' => 'Guru',
                'hubungan_pemohon' => 'Bapa Saudara',

                'nama_penuh' => 'Ghazali bin Khalif',
                'nama_sekolah' => 'Sekolah kebangsaan Perdana',
                'tarikh_lahir' => '2006-05-20',

                'alamat' => 'No 12, Jalan 4 Taman Perdana',
                'poskod' => '43455',
                'bandar' => 'Kajang',
                'negeri' => 'Selangor',

                'no_kad_pengenalan' => '000000110000',
                'no_telefon' => '01121121123',
                'jantina' => 'Lelaki',
                'status' => 'Kehilangan Ayah',

                'nama_penuh_ayah' => 'Khalif bin Khairi',
                'no_kad_pengenalan_ayah' => '760000000000',
                'no_telefon_ayah' => '01121121121',
                'pekerjaan_ayah' => NULL,
                'pendapatan_ayah' => NULL,

                'nama_penuh_ibu' => 'Siti binti Amri',
                'no_kad_pengenalan_ibu' => '770000000000',
                'no_telefon_ibu' => '01121121121',
                'pekerjaan_ibu' => NULL,
                'pendapatan_ibu' => NULL,

                'gambar' => 'seed1.jpg',
                'sijil_lahir' => '001_sijil_lahir.pdf',
                'sijil_kematian' => '001_sijil_kematian.pdf',
            ],

            [
                'id_permohonan' => 'PMH000008',
                'id_anak_jagaan' => 'AKG000008',
                'status_permohonan' => 'Dalam Proses',
                'created_at' => Carbon::now()->subDays(6),

                'id_pemohon' => 3,
                'nama_penuh_pemohon' => 'Khairul Hazim bin Khairi',
                'no_tel_pemohon' => '011-2330093',
                'email_pemohon' => 'khairul@gmail.com',
                'pekerjaan_pemohon' => 'Guru',
                'hubungan_pemohon' => 'Bapa Saudara',

                'nama_penuh' => 'Bakri bin Khalif',
                'nama_sekolah' => 'Sekolah kebangsaan Perdana',
                'tarikh_lahir' => '2006-05-20',

                'alamat' => 'No 12, Jalan 4 Taman Perdana',
                'poskod' => '43455',
                'bandar' => 'Kajang',
                'negeri' => 'Selangor',

                'no_kad_pengenalan' => '000000110000',
                'no_telefon' => '01121121123',
                'jantina' => 'Lelaki',
                'status' => 'Kehilangan Ayah',

                'nama_penuh_ayah' => 'Khalif bin Khairi',
                'no_kad_pengenalan_ayah' => '760000000000',
                'no_telefon_ayah' => '01121121121',
                'pekerjaan_ayah' => NULL,
                'pendapatan_ayah' => NULL,

                'nama_penuh_ibu' => 'Siti binti Amri',
                'no_kad_pengenalan_ibu' => '770000000000',
                'no_telefon_ibu' => '01121121121',
                'pekerjaan_ibu' => NULL,
                'pendapatan_ibu' => NULL,

                'gambar' => 'seed1.jpg',
                'sijil_lahir' => '001_sijil_lahir.pdf',
                'sijil_kematian' => '001_sijil_kematian.pdf',
            ],
        ];

        foreach ($application as $key => $value) {
            Application::create($value);
        }
    }
}
