<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BerkasSiswa extends Model
{
    use HasFactory;

    protected $table = 'berkas_siswa';
    protected $fillable = [
        'calon_siswa_id',
        'foto',
        'fc_ijazah',
        'ktp_ortu',
        'kk',
        'akta_lahir',
    ];

    public function calonSiswa()
    {
        return $this->belongsTo(CalonSiswa::class);
    }

}
