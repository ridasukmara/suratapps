<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Harap
 * @package App\Models\Admin
 */
class Harap extends Model
{
    use SoftDeletes;

    public $table = 'harap';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nama_harap'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nama_harap' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama_harap' => 'required'
    ];

    public function disposisi(){
        return $this->hasMany('App\Models\Admin\Harap');
    }
}
