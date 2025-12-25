<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PpdbJadwal;
use Illuminate\Http\Request;

class PpdbJadwalController extends Controller
{
    public function edit()
    {
        $jadwal = PpdbJadwal::first();

        return view('admin.ppdb-jadwal', compact('jadwal'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'pendaftaran' => 'required',
            'tes_masuk' => 'required',
            'pengumuman' => 'required',
        ]);

        PpdbJadwal::updateOrCreate(['id' => 1], $data);

        return back()->with('success', 'Jadwal PPDB berhasil diperbarui');
    }
}