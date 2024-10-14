<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    // Menentukan nama tabel jika tidak sesuai dengan konvensi Laravel
    protected $table = "Country";

    // Jika tabel menggunakan kolom primary key yang berbeda dari 'id'
    protected $primaryKey = 'id';


    // Jika Anda ingin menentukan field yang dapat diisi (mass assignable)
    protected $guarded = [];
}
