<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoliTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('poli', function (Blueprint $table) {
            $table->id();
            $table->string('nama_poli'); // Nama poli (misal: Poli Anak, Poli Gigi, dsb)
            $table->string('lokasi')->nullable(); // Lokasi poli di rumah sakit atau klinik
            $table->string('nomor_telepon')->nullable(); // Kontak telepon poli
            $table->enum('status', ['aktif', 'non_aktif'])->default('aktif'); // Status poli
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
        Schema::dropIfExists('poli');
    }
}
