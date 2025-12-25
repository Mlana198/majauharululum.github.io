<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrangTua extends Model
{
    protected $fillable = [
        'calon_siswa_id',
        'nama_ayah',
        'pekerjaan_ayah',
        'nohp_ayah',
        'nama_ibu',
        'pekerjaan_ibu',
        'nohp_ibu',
        'nama_wali',
        'pekerjaan_wali',
        'nohp_wali',
        'alamat_wali',
    ];

    public function calonSiswa()
    {
        return $this->belongsTo(CalonSiswa::class);
    }
}
