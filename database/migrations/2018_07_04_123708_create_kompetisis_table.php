<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKompetisisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kompetisis', function (Blueprint $table) {
            $table->increments('id');
            /**
             * membuat relasi tabel one to one
             * dengan kondisi on delete cascade
             */
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            /**
             * jenis lomnba
             * 
             * 1. adc (Application Development Competition)
             * 2. wdc (Web Design Competition)
             * 3. dpc (Database Programming Competition)
             */
            $table->string('jenis_lomba', 3);
            $table->string('asal_sekolah', 100);
            $table->string('nama_ketua_tim', 100);
            $table->string('no_ketua_tim', 15);
            $table->string('email_ketua_tim', 100);
            $table->string('foto_ketua_tim', 100);
            $table->string('nama_anggota_1', 100)->nullable();
            $table->string('no_anggota_1', 100)->nullable();
            $table->string('email_anggota_1', 100)->nullable();
            $table->string('foto_anggota_1', 100)->nullable();
            $table->string('nama_anggota_2', 100)->nullable();
            $table->string('no_anggota_2', 100)->nullable();
            $table->string('email_anggota_2', 100)->nullable();
            $table->string('foto_anggota_2', 100)->nullable();
            $table->string('berkas_konfirmasi', 100)->nullable();
            /**
             * lock untuk keperluan kunci data peserta lomba
             */
            $table->boolean('lock')->default(false);
            $table->boolean('konfirmasi')->default(false);
            $table->string('link_berkas', 255)->nullable();
            $table->string('link_video', 255)->nullable();
            $table->boolean('hapus')->default(false);
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
        Schema::dropIfExists('kompetisis');
    }
}
