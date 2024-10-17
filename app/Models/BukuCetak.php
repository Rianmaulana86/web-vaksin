<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BukuCetak extends Model
{
    // Menentukan nama tabel jika tidak sesuai dengan konvensi Laravel
    protected $table = "vaksin_icv_cetak";

    // Jika tabel menggunakan kolom primary key yang berbeda dari 'id'
    protected $primaryKey = 'id';

    // Jika Anda tidak ingin Laravel mengelola kolom created_at dan updated_at
    public $timestamps = false;

    // Jika Anda ingin menentukan field yang dapat diisi (mass assignable)
    protected $guarded = [];
}
