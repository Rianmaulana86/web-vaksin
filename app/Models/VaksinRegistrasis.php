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
                return $this->belongsTo(Pasien::class, 'id_pasien','id_rm');
        }

        public function vaksinpaket()
        {
                return $this->belongsTo(Vaksin::class, 'jenis_vaksinasi');
        }

        public function jenisVaksin()   
        {
                return $this->belongsTo(Vaksin::class, 'jenis_vaksinasi'); // Adjust the foreign key if necessary
        }
        // public function bukuCetak()
        // {
        //     return $this->hasMany(BukuCetak::class, 'no_reg'); // Adjust if necessary based on your table structure
        // }
}
