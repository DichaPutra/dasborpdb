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
            $table->biginteger('idWilayah');
            $table->biginteger('idSektor');
            $table->biginteger('tahun');
            $table->double('pdrb', 15, 2);           
            $table->integer('idUser');
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
