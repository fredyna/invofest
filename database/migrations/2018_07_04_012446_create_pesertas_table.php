<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePesertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesertas', function (Blueprint $table) {
            /**
             * id peserta
             * 
             * sesuaikan mau pakai barcode atau qr code
             */
            $table->string('id_peserta', 15);
            /**
             * kategori
             * 
             * umum / mahasiswa
             */
            $table->string('kategori', 10);
            $table->string('nama', 100);
            $table->string('asal_institusi', 100)->nullable();
            $table->string('nomor_hp', 15);
            $table->string('email', 100);
            /**
             * jenis kelamin :
             * 
             * laki-laki
             * perempuan
             */
            $table->string('jenis_kelamin', 9);
            $table->string('alamat', 255);
            $table->string('foto_ktm', 100)->nullable();
            $table->boolean('workshop')->default(false);
            $table->boolean('seminar')->default(false);
            $table->boolean('talkshow')->default(false);
            /**
             * kategori workshop :
             * 
             * UI/UX Design
             * Web Services
             * Cyber Security
             * Data Science
             */
            $table->string('kategori_workshop', 14)->nullable();
            $table->boolean('validasi_workshop')->default(false);
            $table->boolean('validasi_seminar')->default(false);
            $table->boolean('validasi_talkshow')->default(false);
            /**
             * jenis pembayaran
             * 
             * 1. Langsung
             * 2. Transfer
             */
            $table->string('jenis_pembayaran', 10)->nullable();
            $table->boolean('konfirmasi_bayar')->default(false);
            $table->boolean('hapus')->default(false);
            $table->timestamps();

            $table->primary('id_peserta');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesertas');
    }
}
