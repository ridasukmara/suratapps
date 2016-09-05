<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Pegawai;
use InfyOm\Generator\Common\BaseRepository;

class PegawaiRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama_pegawai',
        'jabatan',
        'nip',
        'hak_akses',
        'foto',
        'username'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Pegawai::class;
    }
}
