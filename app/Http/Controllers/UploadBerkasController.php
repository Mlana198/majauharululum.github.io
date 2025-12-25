<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BerkasSiswa;
use App\Models\CalonSiswa;

class UploadBerkasController extends Controller
{
    public function create(CalonSiswa $calonSiswa)
    {
        return view('upload', compact('calonSiswa'));
    }

    public function store(Request $request, CalonSiswa $calonSiswa)
    {
        $request->validate([
            'foto'      => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'fc_ijazah'  => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'ktp_ortu'  => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'kk'        => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'akta_lahir'=> 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',

        ]);

        $data = [
            'calon_siswa_id' => $calonSiswa->id,
        ];

        foreach (['foto','fc_ijazah','ktp_ortu','kk','akta_lahir'] as $file) {
            if ($request->hasFile($file)) {
                $data[$file] = $request->file($file)->store('berkas', 'public');
            }
        }

        // agar 1 siswa hanya punya 1 berkas
        BerkasSiswa::updateOrCreate(
            ['calon_siswa_id' => $calonSiswa->id],
            $data
        );

        return redirect()
        ->route('user.dashboard', $calonSiswa->id)
        ->with('success', 'Berkas berhasil diupload');

    }
}
