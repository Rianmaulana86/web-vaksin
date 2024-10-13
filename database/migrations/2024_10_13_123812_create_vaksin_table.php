<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVaksinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vaksin', function (Blueprint $table) {
            $table->id();
            $table->string('nama_vaksin'); // Nama vaksin
            $table->string('jenis_vaksin'); // Jenis vaksin (misalnya: vaksin COVID-19, vaksin flu, dll.)
            $table->string('produsen'); // Produsen vaksin
            $table->date('tgl_expired')->nullable(); // Tanggal kadaluarsa vaksin
            $table->string('manfaat')->nullable(); // Manfaat vaksin
            $table->enum('status', ['aktif', 'non_aktif'])->default('aktif'); // Status vaksin
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
        Schema::dropIfExists('vaksin');
    }
}
