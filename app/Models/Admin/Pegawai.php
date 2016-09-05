<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class Pegawai
 * @package App\Models\Admin
 */
class Pegawai extends Authenticatable
{
    //use SoftDeletes;


    protected $guard = "pegawais";

    public $table = 'pegawai';
    

    protected $dates = ['deleted_at'];

    public function hak_akses(){
        return $this->hak_akses;
    }

    public $fillable = [
        'nama_pegawai',
        'jabatan',
        'nip',
        'hak_akses',
        'foto',
        'username',
        'password',
        'api_token'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nama_pegawai' => 'string',
        'jabatan' => 'string',
        'foto' => 'string',
        'username' => 'string',
        'password' => 'string',
        'api_token' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama_pegawai' => 'required',
        'jabatan' => 'required',
        'nip' => 'required',
        'hak_akses' => 'required',
        'username' => 'required',
        'password' => 'required'
    ];
}
