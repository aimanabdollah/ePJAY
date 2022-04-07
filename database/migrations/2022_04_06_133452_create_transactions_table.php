<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('id_trans_tpn')->nullable();
            $table->string('id_trans_tbj')->nullable();
            $table->string('kategori')->nullable();
            $table->string('catatan')->nullable();
            $table->string('jenis')->nullable();
            $table->decimal('jumlah_tpn', 8,2)->nullable(); 
            $table->decimal('jumlah_tbj', 8,2)->nullable();   
            $table->date('tarikh')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
