<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class distributor_pbfs
 * @package App\Models
 * @version October 16, 2024, 3:22 am UTC
 *
 */
class distributor_pbfs extends Model
{

    public $table = 'vaksin_distributor_pbfs';
    

    //protected $dates = ['deleted_at'];

      // Jika tabel menggunakan kolom primary key yang berbeda dari 'id'
      protected $primaryKey = 'id';


      // Jika Anda ingin menentukan field yang dapat diisi (mass assignable)
      protected $guarded = [];

    
}
