<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLowongansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lowongans', function (Blueprint $table) {
            $table->increments('id_lowongan');
            $table->integer('id_perusahaan');
            $table->foreign('id_perusahaan')->references('id_perusahaan')->on('perusahaans');
            $table->string('jenis_kerja');
            $table->longText('deskripsi_kerja');
            $table->string('lokasi_kerja');
            $table->string('gaji');
            $table->string('kontak');
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
        Schema::dropIfExists('lowongans');
    }
}
