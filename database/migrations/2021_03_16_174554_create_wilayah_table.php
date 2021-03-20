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
            $table->string('idWilayah');
            $table->string('nama_wilayah');
        });

        DB::table('wilayah')->insert(
                [
                    ['idWilayah' => '0', 'nama_wilayah' => 'Indonesia'],
                    ['idWilayah' => '11', 'nama_wilayah' => 'Aceh'],
                    ['idWilayah' => '12', 'nama_wilayah' => 'Sumatera Utara'],
                    ['idWilayah' => '13', 'nama_wilayah' => 'Sumatera Barat'],
                    ['idWilayah' => '14', 'nama_wilayah' => 'Riau'],
                    ['idWilayah' => '15', 'nama_wilayah' => 'Jambi'],
                    ['idWilayah' => '16', 'nama_wilayah' => 'Sumatera Selatan'],
                    ['idWilayah' => '17', 'nama_wilayah' => 'Bengkulu'],
                    ['idWilayah' => '18', 'nama_wilayah' => 'Lampung'],
                    ['idWilayah' => '19', 'nama_wilayah' => 'Kep. Bangka Belitung'],
                    ['idWilayah' => '21', 'nama_wilayah' => 'Kep. Riau'],
                    ['idWilayah' => '31', 'nama_wilayah' => 'Dki Jakarta'],
                    ['idWilayah' => '32', 'nama_wilayah' => 'Jawa Barat'],
                    ['idWilayah' => '33', 'nama_wilayah' => 'Jawa Tengah'],
                    ['idWilayah' => '34', 'nama_wilayah' => 'Di Yogyakarta'],
                    ['idWilayah' => '35', 'nama_wilayah' => 'Jawa Timur'],
                    ['idWilayah' => '36', 'nama_wilayah' => 'Banten'],
                    ['idWilayah' => '51', 'nama_wilayah' => 'Bali'],
                    ['idWilayah' => '52', 'nama_wilayah' => 'Nusa Tenggara Barat'],
                    ['idWilayah' => '53', 'nama_wilayah' => 'Nusa Tenggara Timur'],
                    ['idWilayah' => '61', 'nama_wilayah' => 'Kalimantan Barat'],
                    ['idWilayah' => '62', 'nama_wilayah' => 'Kalimantan Tengah'],
                    ['idWilayah' => '63', 'nama_wilayah' => 'Kalimantan Selatan'],
                    ['idWilayah' => '64', 'nama_wilayah' => 'Kalimantan Timur'],
                    ['idWilayah' => '65', 'nama_wilayah' => 'Kalimantan Utara'],
                    ['idWilayah' => '71', 'nama_wilayah' => 'Sulawesi Utara'],
                    ['idWilayah' => '72', 'nama_wilayah' => 'Sulawesi Tengah'],
                    ['idWilayah' => '73', 'nama_wilayah' => 'Sulawesi Selatan'],
                    ['idWilayah' => '74', 'nama_wilayah' => 'Sulawesi Tenggara'],
                    ['idWilayah' => '75', 'nama_wilayah' => 'Gorontalo'],
                    ['idWilayah' => '76', 'nama_wilayah' => 'Sulawesi Barat'],
                    ['idWilayah' => '81', 'nama_wilayah' => 'Maluku'],
                    ['idWilayah' => '82', 'nama_wilayah' => 'Maluku Utara'],
                    ['idWilayah' => '91', 'nama_wilayah' => 'Papua Barat'],
                    ['idWilayah' => '94', 'nama_wilayah' => 'Papua']
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
