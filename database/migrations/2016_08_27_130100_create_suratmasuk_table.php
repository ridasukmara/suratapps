<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuratmasukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suratmasuk', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_klasifikasi')->unsigned();
            $table->integer('id_pegawai')->unsigned();
            $table->integer('id_sifatsurat')->unsigned();
            $table->integer('id_disposisi')->unsigned();
            $table->string('indeks');
            $table->integer('no_urut');
            $table->string('perihal');
            $table->string('isi_ringkas');
            $table->string('dari');
            $table->date('tanggal_suratmasuk');
            $table->string('no_suratmasuk');
            $table->date('tanggal_diteruskan');
            $table->string('catatan');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_klasifikasi')->references('id')->on('klasifikasi')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('id_pegawai')->references('id')->on('pegawai')->onDelete('restrict')->onUpdate('cascade');    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('suratmasuk');
    }
}
