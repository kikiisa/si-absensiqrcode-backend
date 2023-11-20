<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengaturanAbsensisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengaturan_absensis', function (Blueprint $table) {
            $table->id();
            $table->string('qrcode_pulang');
            $table->string('qrcode_masuk');
            $table->string('longitude');
            $table->string('latitude');
            $table->time('jam_masuk');
            $table->time('jam_keluar');
            $table->string('radius');
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
        Schema::dropIfExists('pengaturan_absensis');
    }
}
