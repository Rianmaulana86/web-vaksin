<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VaksinRegistrasis extends Model
{
        // Menentukan nama tabel jika tidak sesuai dengan konvensi Laravel
        protected $table = "vaksin_registrasis";

        // Jika tabel menggunakan kolom primary key yang berbeda dari 'id'
        protected $primaryKey = 'id';
    
        
        // Jika Anda ingin menentukan field yang dapat diisi (mass assignable)
        protected $guarded = [];

        public function pasien()
        {
                return $this->belongsTo(Pasien::class, 'id_pasien');
        }
}
