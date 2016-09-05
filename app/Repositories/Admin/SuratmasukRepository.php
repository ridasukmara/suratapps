<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Suratmasuk;
use InfyOm\Generator\Common\BaseRepository;

class SuratmasukRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Suratmasuk::class;
    }
}
