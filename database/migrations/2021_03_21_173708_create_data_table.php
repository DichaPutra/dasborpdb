<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data', function (Blueprint $table) {
            $table->integer('idWilayah');
            $table->foreign('idWilayah')->references('idWilayah')->on('wilayah');
            $table->integer('idSektor');
            $table->foreign('idSektor')->references('idSektor')->on('sektor');
            $table->integer('tahun');
            $table->double('pdrb', 20, 2);           
            $table->unsignedBigInteger('idUser');
            $table->foreign('idUser')->references('id')->on('users');
            $table->unique(['idWilayah', 'idSektor', 'tahun', 'idUser']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data');
    }
}
