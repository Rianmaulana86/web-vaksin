<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vaksin_master extends Model
{
    // Menentukan nama tabel jika tidak sesuai dengan konvensi Laravel
    protected $table = "vaksin";

    // Jika tabel menggunakan kolom primary key yang berbeda dari 'id'
    protected $primaryKey = 'id';


    // Jika Anda ingin menentukan field yang dapat diisi (mass assignable)
    protected $guarded = [];

    public function distributor_pbfs()
    {
        return $this->belongsTo(Distributor_pbfs::class, 'id_distributor');
    }


}
