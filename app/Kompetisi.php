<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Kompetisi extends Model
{
    protected $fillable = [
        'user_id', 'jenis_lomba', 'asal_sekolah', 'nama_ketua_tim',
        'no_ketua_tim', 'email_ketua_tim', 'foto_ketua_tim', 'nama_anggota_1', 'no_anggota_1', 'email_anggota_1', 'foto_anggota_1','nama_anggota_2', 'no_anggota_2', 'email_anggota_2', 'foto_anggota_2', 'berkas_konfirmasi', 'lock', 'konfirmasi', 'link_berkas', 'link_video', 'hapus'
    ];

    

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
