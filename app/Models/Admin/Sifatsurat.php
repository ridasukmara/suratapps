<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Sifatsurat
 * @package App\Models\Admin
 */
class Sifatsurat extends Model
{
    use SoftDeletes;

    public $table = 'sifatsurat';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nama_sifatsurat'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nama_sifatsurat' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama_sifatsurat' => 'required'
    ];
}
