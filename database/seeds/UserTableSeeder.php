<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin1',
            'email' => 'admin1@admin.com',
            'password' => bcrypt('admin1'),
            'admin' => true
        ]);

        $this->call(KlasifikasiSeeder::class);
        $this->call(SifatSuratSeeder::class);
        $this->call(PegawaiSeeder::class);
        $this->call(HarapSeeder::class);
    }
}
