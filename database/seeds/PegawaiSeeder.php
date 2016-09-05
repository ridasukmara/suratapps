<?php

use Illuminate\Database\Seeder;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('pegawai')->insert([
            'nama_pegawai' => 'Pegawai',
            'nip' => '1001',
            'username' => 'pegawai',
            'password' => bcrypt('pegawai'),
            'hak_akses' => '1',
            'jabatan' => 'Staff'
        ]);
    }
}
