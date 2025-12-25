<?php

namespace App\Http\Controllers;

use App\Models\CalonSiswa;
use App\Models\TesHasil;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();

        // dd($user->calonSiswa->hasilTes);

        $calonSiswa = $user->calonSiswa; // null-safe
        $hasil = $calonSiswa?->hasilTes;

        return view('user.dashboard', compact('user', 'calonSiswa', 'hasil'));
    }
}
