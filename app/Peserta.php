<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    protected $primaryKey = 'id_peserta';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_peserta', 'kategori', 'nama', 'asal_institusi', 'nomor_hp', 'email', 'jenis_kelamin', 'alamat', 'foto_ktm', 'workshop', 'seminar', 'talkshow', 'kategori_workshop', 'validasi_workshop', 'validasi_seminar', 'validasi_talkshow', 'jenis_pembayaran', 'konfirmasi_bayar', 'hapus'
    ];
}
