<?php

namespace App\Http\Controllers;

use App\Models\TesSoal;
use App\Models\TesJawaban;
use App\Models\TesHasil;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TesMasukController extends Controller
{
    public function index()
    {
        $soals = TesSoal::all();
        return view('tes.index', compact('soals'));
    }

    public function submit(Request $request)
    {
        // 1. Validasi dasar
        $request->validate([
            'jawaban' => 'required|array'
        ]);

        // 2. Ambil calon siswa (aman & eksplisit)
        $calonSiswaId = Auth::user()
            ->calonSiswa
            ->id ?? abort(403);

        // 3. Cegah submit ulang
        if (TesHasil::where('calon_siswa_id', $calonSiswaId)->exists()) {
            return redirect('/user');
        }

        // 4. VALIDASI SEMUA SOAL TERJAWAB ✅ (INI POSISI YANG BENAR)
        if (count($request->jawaban) !== TesSoal::count()) {
            abort(422, 'Semua soal wajib dijawab');
        }

        // 5. Ambil soal yang dijawab user
        $soals = TesSoal::whereIn(
            'id',
            array_keys($request->jawaban)
        )->get();

        $total = $soals->count();
        $benar = 0;

        // 6. Proses jawaban
        foreach ($soals as $soal) {
            $jawabanUser = $request->jawaban[$soal->id];
            $isBenar = $jawabanUser === $soal->jawaban_benar;

            TesJawaban::create([
                'calon_siswa_id' => $calonSiswaId,
                'tes_soal_id'    => $soal->id,
                'jawaban'        => $jawabanUser,
                'benar'          => $isBenar,
            ]);

            if ($isBenar) {
                $benar++;
            }
        }

        // 7. Hitung nilai
        $nilai = intval(($benar / $total) * 100);

        // 8. Simpan hasil
        TesHasil::create([
            'calon_siswa_id' => $calonSiswaId,
            'total_soal'     => $total,
            'jawaban_benar'  => $benar,
            'nilai'          => $nilai,
            'selesai_tes'    => now(),
        ]);

        return redirect()
            ->route('user.dashboard')
            ->with('success', 'Tes berhasil diselesaikan');
    }

}

