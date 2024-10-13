<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTravelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travel', function (Blueprint $table) {
            $table->id();
            $table->string('nama_travel'); // Nama agen travel
            $table->string('alamat_travel'); // Alamat agen travel
            $table->string('kontak_travel')->nullable(); // Kontak (telepon atau email)
            $table->string('website_travel')->nullable(); // Website agen travel
            $table->string('jenis_travel'); // Jenis travel (misalnya: umrah, haji, wisata)
            $table->date('tgl_berangkat')->nullable(); // Tanggal keberangkatan
            $table->string('negara_tujuan'); // Negara tujuan perjalanan
            $table->enum('status', ['aktif', 'non_aktif'])->default('aktif'); // Status operasional travel
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
        Schema::dropIfExists('travel');
    }
}
