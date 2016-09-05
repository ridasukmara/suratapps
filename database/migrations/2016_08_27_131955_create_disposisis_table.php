<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDisposisisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('disposisi', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_suratmasuk')->unsigned();
            $table->integer('id_harap')->unsigned()->nullable();
            $table->integer('createdby')->unsigned();
            $table->string('catatan_pengolah');
            $table->string('catatan_admintu');
            $table->string('catatan_adminkepala');
            $table->boolean('verifikasi');
            $table->boolean('readbytu');
            $table->boolean('readbykepala');
            $table->date('tanggal_verifikasi')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_suratmasuk')->references('id')->on('suratmasuk')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('id_harap')->references('id')->on('harap')->onDelete('restrict')->onUpdate('cascade');            
            $table->foreign('createdby')->references('id')->on('pegawai')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('disposisi');
    }
}
