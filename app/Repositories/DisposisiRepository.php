<?php

namespace App\Repositories;

use App\Models\Disposisi;
use InfyOm\Generator\Common\BaseRepository;

class DisposisiRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_suratmasuk',
        'id_harap',
        'catatan_pengolah',
        'catatan_admintu',
        'catatan_adminkepala',
        'verifikasi',
        'tanggal_verifikasi'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Disposisi::class;
    }
}
