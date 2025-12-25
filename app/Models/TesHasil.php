<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TesHasil extends Model
{
    protected $fillable = [
        'calon_siswa_id',
        'total_soal',
        'jawaban_benar',
        'nilai',
        'selesai_tes',
    ];

    public function calonSiswa()
    {
        return $this->belongsTo(CalonSiswa::class);
    }
}
