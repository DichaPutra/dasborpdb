<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExcelformatTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('excelformat', function (Blueprint $table) {
            $table->biginteger('idWilayah');
            $table->biginteger('idSektor');
            $table->biginteger('tahun');
            $table->biginteger('pdrb');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('excelformat');
    }

}
