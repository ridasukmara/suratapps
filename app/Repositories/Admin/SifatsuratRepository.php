<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Sifatsurat;
use InfyOm\Generator\Common\BaseRepository;

class SifatsuratRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama_sifatsurat'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Sifatsurat::class;
    }
}
