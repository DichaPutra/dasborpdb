<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKwilayahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kwilayah', function (Blueprint $table) {
            $table->string('idKWilayah');
            $table->primary('idKWilayah');
            $table->string('nama_kelompok_wilayah');
            $table->string('color');
        });
        
        DB::table('kwilayah')->insert(
                [
                    ['idKWilayah' => '0', 'nama_kelompok_wilayah' => 'Indonesia', 'color' => '#f7f7f7'],
                    ['idKWilayah' => '1', 'nama_kelompok_wilayah' => 'Sumatera', 'color' => '#0275d8'],
                    ['idKWilayah' => '2', 'nama_kelompok_wilayah' => 'Jawa', 'color' => '#5cb85c'],
                    ['idKWilayah' => '3', 'nama_kelompok_wilayah' => 'Balinusra', 'color' => '#5bc0de'],
                    ['idKWilayah' => '4', 'nama_kelompok_wilayah' => 'Kalimantan', 'color' => '#f0ad4e'],
                    ['idKWilayah' => '5', 'nama_kelompok_wilayah' => 'Sulampua', 'color' => '#d9534f']
                ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kwilayah');
    }
}
