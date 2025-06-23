<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    //
    protected $table = 'tb_pasien';
    protected $fillable = [
        'nama',
        'umur',
        'jenis_kelamin',
        'alamat'
    ];
}
