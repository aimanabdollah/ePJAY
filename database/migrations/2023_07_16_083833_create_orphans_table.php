<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orphans', function (Blueprint $table) {
            $table->id();

            // maklumat permohonan

            $table->string('id_permohonan')->nullable();
            $table->bigInteger('id_pemohon')->nullable();

            // maklumat anak yatim

            $table->string('id_anak_jagaan')->nullable();
            $table->string('nama_penuh')->nullable();
            $table->string('nama_sekolah')->nullable();
            $table->string('tarikh_lahir')->nullable();
            $table->string('alamat')->nullable();
            $table->string('poskod')->nullable();
            $table->string('bandar')->nullable();
            $table->string('negeri')->nullable();
            $table->string('no_kad_pengenalan')->nullable();
            $table->string('no_telefon')->nullable();
            $table->string('jantina')->nullable();
            $table->string('status')->nullable();

            $table->date('tarikh_daftar')->nullable();
            $table->date('tarikh_keluar')->nullable();

            $table->string('gambar')->nullable();
            $table->string('sijil_lahir')->nullable();
            $table->string('sijil_kematian')->nullable();

            // maklumat ibu bapa

            $table->string('nama_penuh_ayah')->nullable();
            $table->string('nama_penuh_ibu')->nullable();

            $table->string('no_kad_pengenalan_ayah')->nullable();
            $table->string('no_kad_pengenalan_ibu')->nullable();

            $table->string('no_telefon_ayah')->nullable();
            $table->string('no_telefon_ibu')->nullable();

            $table->string('pekerjaan_ayah')->nullable();
            $table->string('pekerjaan_ibu')->nullable();
            $table->decimal('pendapatan_ayah', 8, 2)->nullable();
            $table->decimal('pendapatan_ibu', 8, 2)->nullable();

            $table->string('komunikasi')->nullable();
            $table->string('matematik')->nullable();
            $table->string('deria')->nullable();
            $table->string('fizikal')->nullable();
            $table->string('kreativiti')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orphans');
    }
};
