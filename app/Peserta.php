<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    protected $primaryKey = 'id_peserta';
    public $incrementing = false;
    protected $keyType = 'string';
}
