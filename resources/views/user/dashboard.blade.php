@extends('layouts.user')

@section('title', 'User Dashboard')

@section('content')
<div class="max-w-4xl mx-auto bg-white shadow rounded-2xl p-6">
        <h1 class="text-2xl font-semibold mb-4">Profil Calon Peserta Didik</h1>


        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <p class="font-medium">Nama Lengkap:</p>
                <p class="text-gray-700">{{ $user->name ?? '-' }}</p>
            </div>

            <div>
                <p class="font-medium">Tempat, Tanggal Lahir:</p>
                <p class="text-gray-700">
                    {{ $calonSiswa->tempat_lahir ?? '-' }},
                    {{ optional($calonSiswa)->tanggal_lahir
                        ? \Carbon\Carbon::parse($calonSiswa->tanggal_lahir)->format('d-m-Y')
                        : '-' }}
                </p>
            </div>

            <div>
                <p class="font-medium">Agama:</p>
                <p class="text-gray-700">
                    {{ $calonSiswa ? ucfirst(str_replace('_',' ',$calonSiswa->agama)) : '-' }}
                </p>
            </div>

            <div>
                <p class="font-medium">Jenis Kelamin:</p>
                <p class="text-gray-700">
                    {{ $calonSiswa ? ucfirst($calonSiswa->jenis_kelamin) : '-' }}
                </p>
            </div>

            <div>
                <p class="font-medium">Alamat:</p>
                <p class="text-gray-700">{{ $calonSiswa->alamat ?? '-' }}</p>
            </div>

            <div>
                <p class="font-medium">Kontak:</p>
                <p class="text-gray-700">
                    {{ $calonSiswa->nohp_siswa ?? $user->no_hp ?? '-' }}
                </p>
            </div>

        </div>


        @if($hasil)

            <div class="mt-6 bg-green-50 border border-green-300 p-4 rounded">
                <h2 class="font-semibold text-lg mb-2">Hasil Tes Masuk</h2>
                <p>Total Soal: {{ $hasil->total_soal }}</p>
                <p>Jawaban Benar: {{ $hasil->jawaban_benar }}</p>
                <p class="font-bold">Nilai: {{ $hasil->nilai }}</p>
            </div>
        @else
            <div class="mt-6 bg-yellow-50 border border-yellow-300 p-4 rounded">
                <p>Anda belum mengikuti tes masuk.</p>
            </div>
        @endif


        <div class="mt-6">
            <a href="/test" class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">Lanjut Tes Masuk</a>
        </div>
    </div>
@endsection