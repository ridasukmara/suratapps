<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon;

/**
 * Class Agendasuratmasuk
 * @package App\Models\Admin
 */
class Agendasuratmasuk extends Model
{
    use SoftDeletes;

    public $table = 'agendasuratmasuk';
    

    protected $dates = ['deleted_at', 'tanggal_diterima'];

    function getTanggalDiterimaAttribute()
    {
        return Carbon\Carbon::parse($this->attributes['tanggal_diterima'])->format('m/d/Y');
    }

    public $fillable = [
        'id_suratmasuk',
        'tanggal_diterima',
        'no_agenda',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_suratmasuk' => 'integer',
        'tanggal_diterima' => 'date',
        'no_agenda' => 'string',
        'status' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_suratmasuk' => 'required'
    ];
}
