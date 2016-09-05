<?php

use Illuminate\Database\Seeder;

class SifatSuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sifatsurat')->insert([
            'nama_sifatsurat' => 'Penting'
        ]);
        DB::table('sifatsurat')->insert([
            'nama_sifatsurat' => 'Biasa'
        ]);
    }
}
