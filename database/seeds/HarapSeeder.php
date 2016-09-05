<?php

use Illuminate\Database\Seeder;

class HarapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('harap')->insert([
            'nama_harap' => 'Harap Maklum'
        ]); 
        DB::table('harap')->insert([
            'nama_harap' => 'Harap Segera'
        ]); 
    }
}
