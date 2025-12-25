<?php

namespace App\Http\Controllers;

use App\Models\TesSoal;
use Illuminate\Http\Request;

class AdminSoalController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'pertanyaan'     => 'required',
            'opsi_a'         => 'required',
            'opsi_b'         => 'required',
            'opsi_c'         => 'required',
            'opsi_d'         => 'required',
            'jawaban_benar'  => 'required|in:a,b,c,d',
        ]);

        TesSoal::create($request->all());

        return back()->with('success', 'Soal berhasil ditambahkan');
    }

    public function destroy($id)
    {
        TesSoal::findOrFail($id)->delete();
        return back()->with('success', 'Soal berhasil dihapus');
    }
}
