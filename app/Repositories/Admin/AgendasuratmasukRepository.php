<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Agendasuratmasuk;
use InfyOm\Generator\Common\BaseRepository;

class AgendasuratmasukRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_suratmasuk',
        'tanggal_diterima',
        'no_agenda',
        'status'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Agendasuratmasuk::class;
    }
}
