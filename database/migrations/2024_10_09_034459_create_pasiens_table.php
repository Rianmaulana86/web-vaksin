<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasiensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasiens', function (Blueprint $table) {
            $table->id('id_rm');  // Primary key for id_rm
            $table->string('nama_pasien', 100);
            $table->string('no_passport', 15)->nullable();
            $table->string('tempat_lahir', 50);
            $table->date('tgl_lahir');
            $table->string('kelamin', 15);
            $table->string('pekerjaan', 50);
            $table->string('alamat', 255);
            $table->string('telp', 25);
            $table->string('warga_negara', 255)->default('Indonesia');
            $table->timestamps();  // created_at and updated_at fields
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pasiens');
    }
}
