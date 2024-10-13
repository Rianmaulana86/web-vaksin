<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsistenDokterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asisten_dokter', function (Blueprint $table) {
            $table->id();
            $table->string('nama_asisten'); // Nama asisten dokter
            $table->string('nomor_izin_praktik')->unique(); // Nomor izin praktik asisten
            $table->enum('status', ['aktif', 'non_aktif'])->default('aktif'); // Status asisten
            $table->foreignId('dokter_id')->constrained('dokter')->onDelete('cascade'); // Relasi ke tabel dokter
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
        Schema::dropIfExists('asisten_dokter');
    }
}
