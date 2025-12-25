<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function edit()
    {
        $about = About::first();
        return view('admin.about', compact('about'));
    }

    public function update(Request $request)
    {
        $about = About::first();

        if (!$about) {
            $about = About::create($request->only([
                'jumlah_guru',
                'jumlah_siswa',
                'pengantar_kepala'
            ]));
        }


        $data = $request->validate([
            'jumlah_guru' => 'required|integer',
            'jumlah_siswa' => 'required|integer',
            'pengantar_kepala' => 'required|string',
            'struktur_organisasi' => 'nullable|image'
        ]);

        if ($request->hasFile('struktur_organisasi')) {
            $data['struktur_organisasi'] =
                $request->file('struktur_organisasi')->store('about', 'public');
        }

        $about->update($data);

        return back()->with('success', 'Data About diperbarui');
    }

    public function show()
    {
        $about = About::first();
        return view('about', compact('about'));
    }
}
