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
            $table->string('nama_anggota_1', 100);
            $table->string('no_anggota_1', 100);
            $table->string('email_anggota_1', 100);
            $table->string('foto_anggota_1', 100);
            $table->string('nama_anggota_2', 100);
            $table->string('no_anggota_2', 100);
            $table->string('email_anggota_2', 100);
            $table->string('foto_anggota_2', 100);
            $table->string('ket_mahasiswa_aktif', 100);
            $table->boolean('konfirmasi_bayar')->default(false);
            $table->string('link_berkas', 255);
            $table->string('link_video', 255);
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
