<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSektorTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //create table
        Schema::create('sektor', function (Blueprint $table) {
            $table->integer('idSektor');
            $table->primary('idSektor');
            $table->string('nama_sektor');
        });

        // Insert some stuff
        DB::table('sektor')->insert(
                [
                    ['idSektor' => '1', 'nama_sektor' => 'A. Pertanian, Kehutanan, dan Perikanan'],
                    ['idSektor' => '2', 'nama_sektor' => 'B. Pertambangan dan Penggalian'],
                    ['idSektor' => '3', 'nama_sektor' => 'C. Industri Pengolahan'],
                    ['idSektor' => '4', 'nama_sektor' => 'D. Pengadaan Listrik dan Gas'],
                    ['idSektor' => '5', 'nama_sektor' => 'E. Pengadaan Air, Pengelolaan Sampah, Limbah dan Daur Ulang'],
                    ['idSektor' => '6', 'nama_sektor' => 'F. Konstruksi'],
                    ['idSektor' => '7', 'nama_sektor' => 'G. Perdagangan Besar dan Eceran; Reparasi Mobil dan Sepeda Motor'],
                    ['idSektor' => '8', 'nama_sektor' => 'H. Transportasi dan Pergudangan'],
                    ['idSektor' => '9', 'nama_sektor' => 'I. Penyediaan Akomodasi dan Makan Minum'],
                    ['idSektor' => '10', 'nama_sektor' => 'J. Informasi dan Komunikasi'],
                    ['idSektor' => '11', 'nama_sektor' => 'K. Jasa Keuangan dan Asuransi'],
                    ['idSektor' => '12', 'nama_sektor' => 'L. Real Estate'],
                    ['idSektor' => '13', 'nama_sektor' => 'M,N. Jasa Perusahaan'],
                    ['idSektor' => '14', 'nama_sektor' => 'O. Administrasi Pemerintahan, Pertahanan dan Jaminan Sosial Wajib'],
                    ['idSektor' => '15', 'nama_sektor' => 'P. Jasa Pendidikan'],
                    ['idSektor' => '16', 'nama_sektor' => 'Q. Jasa Kesehatan dan Kegiatan Sosial'],
                    ['idSektor' => '17', 'nama_sektor' => 'R,S,T,U. Jasa lainnya'],
                    ['idSektor' => '18', 'nama_sektor' => 'PDRB Total']
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
        Schema::dropIfExists('sektor');
    }

}
