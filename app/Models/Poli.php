<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Poli extends Model
{
    // Menentukan nama tabel jika tidak sesuai dengan konvensi Laravel
    protected $table = "poli";

    // Jika tabel menggunakan kolom primary key yang berbeda dari 'id'
    protected $primaryKey = 'id';


    // Jika Anda ingin menentukan field yang dapat diisi (mass assignable)
    protected $guarded = [];
}
