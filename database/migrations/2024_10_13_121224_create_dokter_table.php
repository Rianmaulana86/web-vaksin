<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokter', function (Blueprint $table) {
            $table->id();
            $table->string('nama_dokter'); // Nama dokter
            $table->string('spesialisasi'); // Spesialisasi dokter
            $table->string('nomor_izin_praktik')->unique(); // Nomor izin praktik dokter
            $table->string('kontak')->nullable(); // Kontak (telepon atau email)
            $table->string('alamat')->nullable(); // Alamat praktik dokter
            $table->enum('status', ['aktif', 'non_aktif'])->default('aktif'); // Status dokter
            $table->timestamps(); // Untuk created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dokter');
    }
}
