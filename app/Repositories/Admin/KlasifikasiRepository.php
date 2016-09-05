<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Klasifikasi;
use InfyOm\Generator\Common\BaseRepository;

class KlasifikasiRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'kode_klasifikasi',
        'nama_klasifikasi'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Klasifikasi::class;
    }
}
