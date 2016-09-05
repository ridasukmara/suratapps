<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Klasifikasi
 * @package App\Models\Admin
 */
class Klasifikasi extends Model
{
    use SoftDeletes;

    public $table = 'klasifikasi';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'kode_klasifikasi',
        'nama_klasifikasi'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'kode_klasifikasi' => 'string',
        'nama_klasifikasi' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'kode_klasifikasi' => 'required',
        'nama_klasifikasi' => 'required'
    ];

    public function suratmasuk(){
        return $this->hasMany('App\Models\Admin\Suratmasuk', 'id_klasifikasi', 'id');
    }
}
