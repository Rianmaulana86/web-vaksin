<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVaksinIsiPaketTable2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vaksin_isi_paket', function (Blueprint $table) {
            $table->id(); // Kolom id primary key
            $table->tinyInteger('id_jenis_paket')->unsigned(); // Kolom id_jenis_paket dengan tipe tinyint
            $table->string('nama_tindakan'); // Kolom nama_tindakan
            $table->decimal('tarif', 10, 2); 
            $table->decimal('biaya', 10, 2); 
            $table->decimal('jasa', 10, 2); 
            $table->tinyInteger('jp_pelaksana')->unsigned(); // Kolom jp_pelaksana dengan tipe tinyint
            $table->tinyInteger('jp_asisten')->unsigned(); // Kolom jp_pelaksana dengan tipe tinyint
            $table->timestamps(); // Kolom created_at dan updated_at

            $table->foreign('id_jenis_paket')->references('id')->on('vaksin_jenis_paket');
            $table->foreign('jp_pelaksana')->references('id')->on('dokter');
            $table->foreign('jp_asisten')->references('id')->on('dokter');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vaksin_isi_paket');
    }
}
