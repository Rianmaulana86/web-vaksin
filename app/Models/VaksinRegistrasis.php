<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VaksinRegistrasis extends Model
{
        protected $table = "vaksin_registrasis";

        // Jika tabel menggunakan kolom primary key yang berbeda dari 'id'
        protected $primaryKey = 'id';
    
        // Jika Anda ingin menentukan field yang dapat diisi (mass assignable)
        protected $guarded = [];

        public function pasien()
        {
                return $this->belongsTo(Pasien::class, 'id_pasien');
        }

        public function jenisVaksin()
        {
                return $this->belongsTo(Vaksin::class, 'jenis_vaksinasi'); // Adjust the foreign key if necessary
        }
}
