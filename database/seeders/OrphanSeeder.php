<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Orphan;

class OrphanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orphan = [
            [
                'id_permohonan' => 'PMH000001',
                'id_anak_jagaan' => 'AKG000011',
                'id_pemohon' => 3,

                'nama_penuh' => 'Danial bin Khalif',
                'nama_sekolah' => 'Sekolah kebangsaan Perdana',
                'tarikh_lahir' => '2012-05-20',

                'alamat' => 'No 12, Jalan 4 Taman Perdana',
                'poskod' => '43455',
                'bandar' => 'Kajang',
                'negeri' => 'Selangor',

                'no_kad_pengenalan' => '000000110000',
                'no_telefon' => '01121121123',
                'jantina' => 'Lelaki',
                'status' => 'Kehilangan Ibu',

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
                'id_anak_jagaan' => 'AKG000012',
                'id_pemohon' => 3,

                'nama_penuh' => 'Nur Aina bin Khalif',
                'nama_sekolah' => 'Sekolah kebangsaan Perdana',
                'tarikh_lahir' => '2006-05-20',

                'alamat' => 'No 12, Jalan 4 Taman Perdana',
                'poskod' => '43455',
                'bandar' => 'Kajang',
                'negeri' => 'Selangor',

                'no_kad_pengenalan' => '000000110000',
                'no_telefon' => '01121121123',
                'jantina' => 'Perempuan',
                'status' => 'Kehilangan Ayah dan Ibu',

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

                'gambar' => 'seed2.jpg',
                'sijil_lahir' => '001_sijil_lahir.pdf',
                'sijil_kematian' => '001_sijil_kematian.pdf',
            ],

            [
                'id_permohonan' => 'PMH000003',
                'id_anak_jagaan' => 'AKG000013',
                'id_pemohon' => 3,

                'nama_penuh' => 'Siti binti Khalif',
                'nama_sekolah' => 'Sekolah kebangsaan Perdana',
                'tarikh_lahir' => '2016-05-20',

                'alamat' => 'No 12, Jalan 4 Taman Perdana',
                'poskod' => '43455',
                'bandar' => 'Kajang',
                'negeri' => 'Selangor',

                'no_kad_pengenalan' => '000000110000',
                'no_telefon' => '01121121123',
                'jantina' => 'Perempuan',
                'status' => 'Kehilangan Ayah dan Ibu',

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

                'gambar' => 'seed2.jpg',
                'sijil_lahir' => '001_sijil_lahir.pdf',
                'sijil_kematian' => '001_sijil_kematian.pdf',
            ],

            [
                'id_permohonan' => 'PMH000004',
                'id_anak_jagaan' => 'AKG000004',
                'id_pemohon' => 3,

                'nama_penuh' => 'Amri bin Khalif',
                'nama_sekolah' => 'Sekolah kebangsaan Perdana',
                'tarikh_lahir' => '2003-05-20',

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

                'id_pemohon' => 3,

                'nama_penuh' => 'Mukri bin Khalif',
                'nama_sekolah' => 'Sekolah kebangsaan Perdana',
                'tarikh_lahir' => '2019-05-20',

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

                'id_pemohon' => 3,
                'nama_penuh' => 'Daus bin Khalif',
                'nama_sekolah' => 'Sekolah kebangsaan Perdana',
                'tarikh_lahir' => '2004-05-20',

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

                'id_pemohon' => 3,

                'nama_penuh' => 'Ghazali bin Khalif',
                'nama_sekolah' => 'Sekolah kebangsaan Perdana',
                'tarikh_lahir' => '2011-05-20',

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
                'id_pemohon' => 3,
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
                'status' => 'Kehilangan Ibu',

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

        foreach ($orphan as $key => $value) {
            Orphan::create($value);
        }
    }
}
