<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    // Menentukan nama tabel jika tidak sesuai dengan konvensi Laravel
    protected $table = "pasiens";

    // Jika tabel menggunakan kolom primary key yang berbeda dari 'id'
    protected $primaryKey = 'id_rm';

    // Jika Anda tidak ingin Laravel mengelola kolom created_at dan updated_at
    public $timestamps = false;

    // Jika Anda ingin menentukan field yang dapat diisi (mass assignable)
    protected $guarded = [];
}
