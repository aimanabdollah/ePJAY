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
        Schema::create('configurations', function (Blueprint $table) {
            $table->id();
            $table->string('nama_sistem')->nullable();
            $table->string('singkatan_sistem')->nullable();
            $table->string('logo_sistem')->nullable();

            $table->string('nama_pusat_jagaan')->nullable();
            $table->string('signkatan_pusat_jagaan')->nullable();
            $table->string('logo_pusat_jagaan')->nullable();

            $table->string('alamat1')->nullable();
            $table->string('alamat2')->nullable();
            $table->string('poskod')->nullable();
            $table->string('bandar')->nullable();
            $table->string('negeri')->nullable();

            $table->string('no_fax')->nullable();
            $table->string('no_tel')->nullable();
            $table->string('emel')->nullable();

            $table->string('surat_tawaran')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('configurations');
    }
};
