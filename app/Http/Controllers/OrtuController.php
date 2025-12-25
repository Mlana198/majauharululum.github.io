<?php

namespace App\Http\Controllers;

use App\Models\CalonSiswa;
use App\Models\OrangTua;
use Illuminate\Http\Request;

class OrtuController extends Controller
{
    public function create(CalonSiswa $calonSiswa)
    {
        return view('formulir-ortu', compact('calonSiswa'));
    }

    public function store(Request $request, CalonSiswa $calonSiswa)
    {
        $validated = $request->validate([
            'nama_ayah'       => 'nullable|string|max:255',
            'pekerjaan_ayah'  => 'nullable|string|max:255',
            'nohp_ayah'       => 'nullable|string|max:20',

            'nama_ibu'        => 'nullable|string|max:255',
            'pekerjaan_ibu'   => 'nullable|string|max:255',
            'nohp_ibu'        => 'nullable|string|max:20',

            'nama_wali'       => 'nullable|string|max:255',
            'pekerjaan_wali'  => 'nullable|string|max:255',
            'nohp_wali'       => 'nullable|string|max:20',

            'alamat_wali'     => 'nullable|string',
        ]);

        $validated['calon_siswa_id'] = $calonSiswa->id;

        OrangTua::create($validated);

        return redirect()
            ->route('upload.form', $calonSiswa->id)
            ->with('success', 'Data orang tua berhasil disimpan.');

    }
}
