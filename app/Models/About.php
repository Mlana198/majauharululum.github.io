<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = [
        'jumlah_guru',
        'jumlah_siswa',
        'pengantar_kepala',
        'struktur_organisasi'
    ];
}
