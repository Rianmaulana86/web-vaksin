<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrasi', function (Blueprint $table) {
            $table->id();  // Primary Key
            $table->string('no_reg', 50); // No. Registrasi (varchar)
            $table->unsignedBigInteger('rm_pasien'); // Rm_pasien (int)
            $table->string('dokter', 100); // Dokter (varchar) (referensi master dokter)
            $table->string('assisten', 100)->nullable(); // Assisten (varchar) (status assistant dari master dokter)
            $table->date('tgl_berangkat'); // Tanggal Berangkat (date)
            $table->string('negara_tujuan', 100); // Negara Tujuan (varchar) (referensi master negara tujuan)
            $table->string('jenis_vaksinasi', 100); // Jenis Vaksinasi (varchar) (referensi master vaksinasi)
            $table->enum('status', ['wus', 'non wus']); // Status (enum: wus, non wus)
            $table->string('vaksin_wajib', 100); // Vaksin Wajib (varchar) (referensi master vaksin wajib)
            $table->string('vaksin_tambahan', 100)->nullable(); // Vaksin Tambahan (varchar) (referensi master vaksin tambahan)
            $table->string('nama_travel', 100)->nullable(); // Nama Travel (varchar) (referensi master travel)
            $table->string('alamat_travel', 255)->nullable(); // Alamat Travel (varchar)
            $table->enum('tindakan', ['proses', 'selesai']); // Tindakan (enum: proses, selesai)
            $table->enum('apotek_status', ['proses', 'selesai']); // Apotek Status (enum: proses, selesai)
            $table->enum('kasir_status', ['proses', 'selesai']); // Kasir Status (enum: proses = belum dibayar, selesai = lunas)
            $table->enum('buku_icv', ['sudah', 'belum']); // Buku ICV (enum: sudah, belum)
            $table->enum('pp_test', ['iya', 'tidak']); // PP Test (enum: iya, tidak)
            $table->timestamps();  // Timestamps (created_at dan updated_at)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registrasi');
    }
}
