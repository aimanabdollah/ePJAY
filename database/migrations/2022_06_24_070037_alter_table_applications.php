<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableApplications extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('applications', function (Blueprint $table) {
        $table->string('komunikasi')->nullable();
        $table->string('matematik')->nullable();
        $table->string('deria')->nullable();
        $table->string('fizikal')->nullable();
        $table->string('kreativiti')->nullable();
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mahasiswas', function (Blueprint $table) {
            $table->dropColumn('komunikasi');
            $table->dropColumn('matematik');
            $table->dropColumn('deria');
            $table->dropColumn('fizikal');
            $table->dropColumn('kreativiti');
         });
    }

}
