<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TesJawaban extends Model
{
    protected $fillable = [
        'calon_siswa_id',
        'tes_soal_id',
        'jawaban',
        'benar'
    ];
}
