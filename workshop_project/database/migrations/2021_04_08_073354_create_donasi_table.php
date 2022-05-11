<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donasi', function (Blueprint $table) {
            $table->id();
            $table->string('nama_donasi',45);
            $table->string('banner',255);
            $table->date('tanggal');
            $table->text('keterangan');
            $table->boolean('is_active');
            $table->integer('yayasan')->unsigned()->nullable();
            $table->string('penerima')->nullable();
            $table->integer('user')->unsigned()->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donasi');
    }
}
