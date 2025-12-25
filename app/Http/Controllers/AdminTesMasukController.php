<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TesSoal;
use App\Models\TesHasil;
use App\Models\Setting;

class AdminTesMasukController extends Controller
{
    public function index()
    {
        return view('admin.tes-masuk', [
            'soals' => TesSoal::all(),
            'hasils' => TesHasil::with('calonSiswa')->latest()->get(),
            'durasi' => Setting::where('key','durasi_tes')->value('value') ?? 60,
            'status' => Setting::where('key','tes_status')->value('value') ?? 'nonaktif',
        ]);
    }

    public function control(Request $request)
    {
        $request->validate([
            'durasi' => 'required|integer|min:1',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        // contoh (bebas mau simpan ke DB / setting)
        Setting([
            'durasi_tes' => $request->durasi,
            'tes_status' => $request->status,
        ]);

        return back()->with('success', 'Pengaturan tes diperbarui');
    }
}

