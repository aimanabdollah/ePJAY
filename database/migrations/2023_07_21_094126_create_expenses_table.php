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
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->string('id_trax_perbelanjaan')->nullable();
            $table->string('catatan')->nullable();
            $table->decimal('jumlah_tbj', 8,2)->nullable();
            $table->date('tarikh')->nullable();
            $table->unsignedBigInteger('id_kategori');

            $table->timestamps();
            $table->foreign('id_kategori')->references('id')->on('categories')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
