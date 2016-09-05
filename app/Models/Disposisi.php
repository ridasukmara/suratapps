<?php

namespace App\Models;

use Eloquent as Model;
use Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Disposisi
 * @package App\Models
 */
class Disposisi extends Model
{
    use SoftDeletes;

    public $table = 'disposisi';
    

    protected $dates = ['deleted_at', 'tanggal_verifikasi'];

    public function getTanggalVerifikasiAttribute(){
        return Carbon\Carbon::parse($this->attributes['tanggal_verifikasi'])->format('m/d/Y');
    }

    // function getTanggalVerifikasiAttribute(){
    // 	return Carbon\Carbon::parse($this->attributes['tanggal_verifikasi'])->format('m/d/Y');
    // }

    public $fillable = [
        'id_suratmasuk',
        'id_harap',
        'createdby',
        'catatan_pengolah',
        'readbytu',
        'readbykepala',
        'catatan_admintu',
        'catatan_adminkepala',
        'verifikasi',
        'tanggal_verifikasi'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_suratmasuk' => 'integer',
        'id_harap' => 'integer',
        'catatan_pengolah' => 'string',
        'catatan_admintu' => 'string',
        'catatan_adminkepala' => 'string',
        'verifikasi' => 'boolean',
        'tanggal_verifikasi' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_suratmasuk' => 'required'
    ];

    public function suratmasuk(){
    	return $this->hasOne('App\Models\Admin\Suratmasuk');
    }

    public function harap(){
        return $this->belongsTo('App\Models\Admin\Harap','id_harap', 'id');
    }
}
