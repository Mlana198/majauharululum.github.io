<?php

namespace App\Http\Controllers;

use App\Models\CalonSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;


class CalonSiswaController extends Controller
{
    
    public function store(Request $request)
    {
        // 1. VALIDASI DATA
        $validated = $request->validate([
            'nama'            => 'required|string|max:255',
            'tempat_lahir'    => 'required|string|max:255',
            'tanggal_lahir'   => 'required|date|before:today',

            'agama'           => 'required|in:islam,kristen_protestan,katholik,hindu,buddha,konghucu',
            'jenis_kelamin'   => 'required|in:laki-laki,perempuan',
            'anak_ke'         => 'required|integer|min:1|max:10',

            'alamat'          => 'required|string',
            'nohp_siswa'      => 'required|string|max:20',
            'status_keluarga' => 'required|string|max:100',

            'asal_sekolah'    => 'required|string|max:255',
            'tahun_lulus'     => 'nullable|digits:4',
            'nomor_stl'       => 'nullable|string|max:100',
        ]);

        $validated['user_id'] = Auth::id();


        // 2. NORMALISASI DATA (opsional tapi sehat)
        $validated['tanggal_lahir'] = Carbon::parse($validated['tanggal_lahir'])
                                            ->format('Y-m-d');

        // 3. SIMPAN KE DATABASE
        $calonSiswa = CalonSiswa::create($validated);

        // 4. RESPONSE
        return redirect()
            ->route('formulir.ortu', $calonSiswa->id)
            ->with('success', 'Data siswa berhasil disimpan.');
    }
}
