<?php
namespace App\Exports;

use App\Models\CalonSiswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PendaftarExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return CalonSiswa::with('orangTua')->get()->map(function($siswa) {
            return [
                'Nama' => $siswa->nama,
                'Tempat Lahir' => $siswa->tempat_lahir,
                'Tanggal Lahir' => $siswa->tanggal_lahir,
                'Jenis Kelamin' => $siswa->jenis_kelamin,
                'Agama' => $siswa->agama,
                'Alamat' => $siswa->alamat,
                'No HP' => $siswa->nohp_siswa,
                'Status Keluarga' => $siswa->status_keluarga,
                'Asal Sekolah' => $siswa->asal_sekolah,
                'Tahun Lulus' => $siswa->tahun_lulus,
                'Nomor STL' => $siswa->nomor_stl,
                'Nama Ayah' => $siswa->orangTua->nama_ayah ?? '',
                'Pekerjaan Ayah' => $siswa->orangTua->pekerjaan_ayah ?? '',
                'No HP Ayah' => $siswa->orangTua->nohp_ayah ?? '',
                'Nama Ibu' => $siswa->orangTua->nama_ibu ?? '',
                'Pekerjaan Ibu' => $siswa->orangTua->pekerjaan_ibu ?? '',
                'No HP Ibu' => $siswa->orangTua->nohp_ibu ?? '',
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Nama', 'Tempat Lahir', 'Tanggal Lahir', 'Jenis Kelamin', 'Agama', 'Alamat',
            'No HP', 'Status Keluarga', 'Asal Sekolah', 'Tahun Lulus', 'Nomor STL',
            'Nama Ayah', 'Pekerjaan Ayah', 'No HP Ayah',
            'Nama Ibu', 'Pekerjaan Ibu', 'No HP Ibu',
        ];
    }
}
