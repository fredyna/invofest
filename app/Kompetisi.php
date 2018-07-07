<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Kompetisi extends Model
{
    protected $fillable = [
        'user_id', 'jenis_lomba', 'asal_sekolah', 'nama_ketua_tim',
        'no_ketua_tim', 'email_ketua_tim', 'foto_ketua_tim'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
