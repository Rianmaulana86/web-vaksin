<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVaksinRegistrasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vaksin_registrasis', function (Blueprint $table) {
            $table->id(); // Kolom id
            $table->string('no_reg', 20);
            $table->date('tanggal'); 
            $table->foreignId('id_pasien')->constrained('pasien')->onDelete('cascade'); // Kolom id_pasien
            $table->tinyInteger('dokter')->unsigned();// Kolom dokter
            $table->tinyInteger('asisten')->unsigned();// Kolom dokter// Kolom asisten
            $table->date('tanggal_berangkat'); // Kolom tanggal_berangkat
            $table->tinyInteger('negara')->unsigned();// Kolom negara_tujuan
            $table->foreignId('jenis_vaksinasi')->constrained('vaksin_jenis_paket')->onDelete('cascade'); // Kolom jenis_vaksinasi
            $table->enum('status', ['wus', 'non wus']); // Kolom status
            $table->tinyInteger('travel')->unsigned();// Kolom negara_tujuan
            $table->enum('tindakan_suntik', ['Belum', 'Selesai']); // Kolom tindakan_suntik
            $table->enum('pembayaran_kasir', ['Belum', 'Selesai']); // Kolom pembayaran_kasir
            $table->enum('buku_icv', ['Belum', 'Sudah']);
            $table->enum('pp_test', ['Ya', 'Tidak']);
            $table->timestamps(); // Kolom created_at dan updated_at


            $table->foreign('dokter')->references('id')->on('dokter');
            $table->foreign('asisten')->references('id')->on('dokter');
            $table->foreign('negara')->references('id')->on('country');
            $table->foreign('travel')->references('id')->on('travel');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vaksin_registrasis');
    }
}
