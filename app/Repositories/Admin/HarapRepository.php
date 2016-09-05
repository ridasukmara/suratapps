<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Harap;
use InfyOm\Generator\Common\BaseRepository;

class HarapRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama_harap'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Harap::class;
    }
}
