<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePegawaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('pegawai', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_pegawai');
            $table->string('jabatan');
            $table->integer('nip');
            $table->integer('hak_akses');
            $table->string('foto');
            $table->string('username')->unique();
            $table->string('password');
            $table->string('remember_token');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pegawai');
    }
}
