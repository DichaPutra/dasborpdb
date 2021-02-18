<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeDatainputTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datainput', function (Blueprint $table) {
            $table->id();
            $table->integer('komoditi');
            $table->biginteger('output');
            $table->biginteger('konsumsiantara');
            $table->biginteger('pajakkurangsubsidi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('datainput');
    }

}
