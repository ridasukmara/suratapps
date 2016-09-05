<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lampiran extends Model
{
    protected $fillable = ['lampiran', 'id_suratmasuk'];

    protected $table = 'lampiran';

    public function suratmasuk(){
    	return $this->belongsTo('App/Suratmasuk');
    }
}