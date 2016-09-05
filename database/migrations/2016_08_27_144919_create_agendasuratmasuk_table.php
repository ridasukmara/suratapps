<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgendasuratmasukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agendasuratmasuk', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_suratmasuk')->unsigned();
            $table->date('tanggal_diterima')->nullable();
            $table->string('no_agenda');
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_suratmasuk')->references('id')->on('suratmasuk')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('agendasuratmasuk');
    }
}
