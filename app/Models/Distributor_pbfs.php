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
    use SoftDeletes;

    public $table = 'vaksin_distributor_pbfs';
    

    //protected $dates = ['deleted_at'];


    public $fillable = [
        
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
