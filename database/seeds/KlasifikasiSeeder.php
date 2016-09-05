<?php

use Illuminate\Database\Seeder;

class KlasifikasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('klasifikasi')->insert([
            'kode_klasifikasi' => 'KL-01',
            'nama_klasifikasi' => 'Klasifikasi 01'
        ]);

        DB::table('klasifikasi')->insert([
            'kode_klasifikasi' => 'KL-02',
            'nama_klasifikasi' => 'Klasifikasi 02'
        ]);
    }
}
