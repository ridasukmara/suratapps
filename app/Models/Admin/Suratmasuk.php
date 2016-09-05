<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon;

/**
 * Class Suratmasuk
 * @package App\Models\Admin
 */
class Suratmasuk extends Model
{
    use SoftDeletes;

    public $table = 'suratmasuk';
    

    protected $dates = ['deleted_at', 'tanggal_suratmasuk', 'tanggal_diteruskan'];

     function getTanggalSuratMasukAttribute()
    {
        return Carbon\Carbon::parse($this->attributes['tanggal_suratmasuk'])->format('m/d/Y');
    }


     function getTanggalDiteruskanAttribute()
    {
        return Carbon\Carbon::parse($this->attributes['tanggal_diteruskan'])->format('m/d/Y');
    }

    public $fillable = [
        'id_klasifikasi',
        'id_pegawai',
        'id_disposisi',
        'id_jenissurat',        
        'id_sifatsurat',
        'indeks',
        'no_urut',
        'perihal',
        'isi_ringkas',
        'dari',
        'tanggal_suratmasuk',
        'no_suratmasuk',
        'tanggal_diteruskan',
        'catatan'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_klasifikasi' => 'integer',
        'id_pegawai' => 'integer',
        'id_disposisi' => 'integer',
        'indeks' => 'string',
        'no_urut' => 'integer',
        'perihal' => 'string',
        'isi_ringkas' => 'string',
        'dari' => 'string',
        'tanggal_suratmasuk' => 'date',
        'no_suratmasuk' => 'string',
        'tanggal_diteruskan' => 'date',
        'catatan' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_klasifikasi' => 'required',
        // 'id_pegawai' => 'required',
        // 'id_disposisi' => 'required',
        // 'id_lampiran' => 'required',
        'dari' => 'required',
        'no_suratmasuk' => 'required'
    ];

    public function klasifikasi(){
        return $this->hasOne('App\Models\Admin\Klasifikasi', 'id', 'id_klasifikasi');
    }

    public function disposisi(){
        return $this->belongsTo('App\Models\Disposisi');
    }

    public function lampiran(){
        return $this->hasMany('App\Lampiran');
    }

}
