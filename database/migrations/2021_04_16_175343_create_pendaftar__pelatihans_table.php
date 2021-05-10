<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendaftarPelatihansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftar_pelatihans', function (Blueprint $table) {
            $table->Increments('id_penPelatihan');
            $table->string('nik')->index();
            $table->foreign('nik')->references('nik')->on('masyarakats');
            $table->integer('id_pelatihan')->unsigned();
            $table->foreign('id_pelatihan')->references('id_pelatihan')->on('pelatihans');
            $table->string('file');
            $table->string('status');
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
        Schema::dropIfExists('pendaftar__pelatihans');
    }
}
