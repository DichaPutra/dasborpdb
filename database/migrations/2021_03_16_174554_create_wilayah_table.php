<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWilayahTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wilayah', function (Blueprint $table) {
            $table->integer('idWilayah');
            $table->primary('idWilayah');
            $table->string('nama_wilayah');
            $table->string('idKWilayah');
            $table->foreign('idKWilayah')->references('idKWilayah')->on('kwilayah');
        });

        DB::table('wilayah')->insert(
                [
                    ['idWilayah' => '0', 'nama_wilayah' => 'Indonesia', 'idKWilayah' => '0'],
                    ['idWilayah' => '11', 'nama_wilayah' => 'Aceh', 'idKWilayah' => '1'],
                    ['idWilayah' => '12', 'nama_wilayah' => 'Sumatera Utara', 'idKWilayah' => '1'],
                    ['idWilayah' => '13', 'nama_wilayah' => 'Sumatera Barat', 'idKWilayah' => '1'],
                    ['idWilayah' => '14', 'nama_wilayah' => 'Riau', 'idKWilayah' => '1'],
                    ['idWilayah' => '15', 'nama_wilayah' => 'Jambi', 'idKWilayah' => '1'],
                    ['idWilayah' => '16', 'nama_wilayah' => 'Sumatera Selatan', 'idKWilayah' => '1'],
                    ['idWilayah' => '17', 'nama_wilayah' => 'Bengkulu', 'idKWilayah' => '1'],
                    ['idWilayah' => '18', 'nama_wilayah' => 'Lampung', 'idKWilayah' => '1'],
                    ['idWilayah' => '19', 'nama_wilayah' => 'Kep. Bangka Belitung', 'idKWilayah' => '1'],
                    ['idWilayah' => '21', 'nama_wilayah' => 'Kep. Riau', 'idKWilayah' => '1'],
                    ['idWilayah' => '31', 'nama_wilayah' => 'Dki Jakarta', 'idKWilayah' => '2'],
                    ['idWilayah' => '32', 'nama_wilayah' => 'Jawa Barat', 'idKWilayah' => '2'],
                    ['idWilayah' => '33', 'nama_wilayah' => 'Jawa Tengah', 'idKWilayah' => '2'],
                    ['idWilayah' => '34', 'nama_wilayah' => 'Di Yogyakarta', 'idKWilayah' => '2'],
                    ['idWilayah' => '35', 'nama_wilayah' => 'Jawa Timur', 'idKWilayah' => '2'],
                    ['idWilayah' => '36', 'nama_wilayah' => 'Banten', 'idKWilayah' => '2'],
                    ['idWilayah' => '51', 'nama_wilayah' => 'Bali', 'idKWilayah' => '3'],
                    ['idWilayah' => '52', 'nama_wilayah' => 'Nusa Tenggara Barat', 'idKWilayah' => '3'],
                    ['idWilayah' => '53', 'nama_wilayah' => 'Nusa Tenggara Timur', 'idKWilayah' => '3'],
                    ['idWilayah' => '61', 'nama_wilayah' => 'Kalimantan Barat', 'idKWilayah' => '4'],
                    ['idWilayah' => '62', 'nama_wilayah' => 'Kalimantan Tengah', 'idKWilayah' => '4'],
                    ['idWilayah' => '63', 'nama_wilayah' => 'Kalimantan Selatan', 'idKWilayah' => '4'],
                    ['idWilayah' => '64', 'nama_wilayah' => 'Kalimantan Timur', 'idKWilayah' => '4'],
                    ['idWilayah' => '65', 'nama_wilayah' => 'Kalimantan Utara', 'idKWilayah' => '4'],
                    ['idWilayah' => '71', 'nama_wilayah' => 'Sulawesi Utara', 'idKWilayah' => '5'],
                    ['idWilayah' => '72', 'nama_wilayah' => 'Sulawesi Tengah', 'idKWilayah' => '5'],
                    ['idWilayah' => '73', 'nama_wilayah' => 'Sulawesi Selatan', 'idKWilayah' => '5'],
                    ['idWilayah' => '74', 'nama_wilayah' => 'Sulawesi Tenggara', 'idKWilayah' => '5'],
                    ['idWilayah' => '75', 'nama_wilayah' => 'Gorontalo', 'idKWilayah' => '5'],
                    ['idWilayah' => '76', 'nama_wilayah' => 'Sulawesi Barat', 'idKWilayah' => '5'],
                    ['idWilayah' => '81', 'nama_wilayah' => 'Maluku', 'idKWilayah' => '5'],
                    ['idWilayah' => '82', 'nama_wilayah' => 'Maluku Utara', 'idKWilayah' => '5'],
                    ['idWilayah' => '91', 'nama_wilayah' => 'Papua Barat', 'idKWilayah' => '5'],
                    ['idWilayah' => '94', 'nama_wilayah' => 'Papua', 'idKWilayah' => '5']
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
        Schema::dropIfExists('wilayah');
    }

}
