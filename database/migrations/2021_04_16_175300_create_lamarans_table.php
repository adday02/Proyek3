<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLamaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lamarans', function (Blueprint $table) {
            $table->Increments('id_lamaran');
            $table->string('nik')->index();
            $table->foreign('nik')->references('nik')->on('masyarakats');
            $table->integer('id_lowongan')->unsigned();
            $table->foreign('id_lowongan')->references('id_lowongan')->on('lowongans');
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
        Schema::dropIfExists('lamarans');
    }
}
