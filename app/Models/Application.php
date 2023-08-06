<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;



class Application extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'id_anak_jagaan',
        'status_permohonan',
        'id_pemohon',
        'nama_penuh_pemohon',
        'no_tel_pemohon',
        'email_pemohon',
        'pekerjaan_pemohon',
        'hubungan_pemohon',

        'nama_penuh',
        'nama_sekolah',
        'tarikh_lahir',
        'umur',
        'alamat',
        'poskod',
        'bandar',
        'negeri',

        'no_kad_pengenalan',
        'no_telefon',
        'jantina',
        'status',

        'nama_penuh_ayah',
        'no_kad_pengenalan_ayah',
        'no_telefon_ayah',
        'pekerjaan_ayah',
        'pendapatan_ayah',

        'nama_penuh_ibu',
        'no_kad_pengenalan_ibu',
        'no_telefon_ibu',
        'pekerjaan_ibu',
        'pendapatan_ibu',

        'ulasan',
        'tarikh_daftar',
        'status_pendaftaran',
    ];

    protected $guarded = [];
    protected $table = 'applications';
}
