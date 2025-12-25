<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\TesHasil;

class CalonSiswa extends Model
{
    protected $fillable = [
        'user_id',
        'nama',
        'tempat_lahir',
        'agama',
        'jenis_kelamin',
        'anak_ke',
        'alamat',
        'nohp_siswa',
        'status_keluarga',
        'asal_sekolah',
        'tahun_lulus',
        'nomor_stl',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];

    public function orangTua()
    {
        return $this->hasOne(OrangTua::class);
    }

    public function berkas()
    {
        return $this->hasOne(BerkasSiswa::class);
    }


    public function hasilTes()
    {
        return $this->hasOne(TesHasil::class, 'calon_siswa_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
}
