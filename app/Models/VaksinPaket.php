<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VaksinPaket extends Model
{
    // Menentukan nama tabel jika tidak sesuai dengan konvensi Laravel
    protected $table = "vaksin_isi_paket";

    // Jika tabel menggunakan kolom primary key yang berbeda dari 'id'
    protected $primaryKey = 'id';

    // Jika Anda ingin menentukan field yang dapat diisi (mass assignable)
    protected $guarded = [];

    public function vaksin()
    {
        return $this->belongsTo(Vaksin::class, 'id_jenis_paket');
    }
}
