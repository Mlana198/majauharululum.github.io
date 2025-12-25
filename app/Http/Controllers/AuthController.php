<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validasi input login
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Cek kredensial
        if (!Auth::attempt($credentials)) {
            return back()->withErrors([
                'email' => 'Login gagal, email atau password salah',
            ])->withInput();
        }

        // Regenerate session
        $request->session()->regenerate();

        // Redirect sesuai role
        $user = Auth::user();
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('user.dashboard');
        }

        // Pastikan user punya ID untuk calonSiswa
        if (!$user->id) {
            Auth::logout();
            return redirect('/login')->withErrors([
                'email' => 'Data user tidak valid, silakan login ulang',
            ]);
        }

        // // Redirect user ke dashboard dengan parameter calonSiswa
        // return redirect()->route('user.dashboard', ['calonSiswa' => $user->id]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function register(Request $request)
    {
        // Validasi input registrasi
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'no_hp' => 'nullable|string|max:20',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Buat user baru
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'no_hp' => $data['no_hp'] ?? null,
            'password' => Hash::make($data['password']),
            'role' => 'user',
        ]);

        return redirect('/login')->with('success', 'Registrasi berhasil, silakan login');
    }
}
