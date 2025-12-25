@extends('layouts.admin')

@section('title', 'Kelola Tes Masuk')

@section('content')
<h1 class="text-3xl font-bold mb-6">Kelola Tes Masuk</h1>


<div class="p-5 mb-10 bg-blue-600 text-white rounded-xl shadow">
    <h2 class="text-xl text-center font-semibold">Manajemen Tes Masuk</h2>
</div>

{{-- Kontrol Tes --}}
<div class="bg-white p-4 rounded shadow mb-8">
    <h2 class="font-semibold mb-3">Kontrol Tes</h2>

    <form method="POST" action="{{ route('admin.tes.control') }}" class="flex flex-wrap items-center gap-3">
        @csrf

        <label class="text-sm font-medium">Durasi (menit)</label>
        <input type="number" name="durasi"
               class="border rounded px-3 py-2 w-32"
               value="{{ $durasi ?? 60 }}">

        <button name="status" value="aktif"
                class="bg-green-600 text-white px-4 py-2 rounded">
            Aktifkan
        </button>

        <button name="status" value="nonaktif"
                class="bg-red-600 text-white px-4 py-2 rounded">
            Nonaktifkan
        </button>
    </form>
</div>

{{-- Daftar Soal --}}
<div class="bg-white p-4 rounded shadow mb-8">
    <h2 class="font-semibold mb-4">Daftar Soal</h2>

    <div class="overflow-x-auto">
        <table class="w-full border text-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border p-2">No</th>
                    <th class="border p-2">Pertanyaan</th>
                    <th class="border p-2">Jawaban</th>
                    <th class="border p-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
            @forelse($soals as $i => $soal)
                <tr class="hover:bg-gray-50">
                    <td class="border p-2 text-center">{{ $i + 1 }}</td>
                    <td class="border p-2">{{ $soal->pertanyaan }}</td>
                    <td class="border p-2 text-center font-semibold">
                        {{ strtoupper($soal->jawaban_benar) }}
                    </td>
                    <td class="border p-2 text-center">
                        <form method="POST"
                              action="{{ route('admin.soal.destroy', $soal->id) }}">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600 hover:underline">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center p-4 text-gray-500">
                        Belum ada soal
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- Tambah Soal --}}
<div class="bg-white p-4 rounded shadow mb-8">
    <h2 class="font-semibold mb-4">Tambah Soal Baru</h2>

    <form method="POST" action="{{ route('admin.soal.store') }}" class="space-y-3">
        @csrf

        <textarea name="pertanyaan"
                  class="border rounded w-full p-2"
                  placeholder="Pertanyaan"
                  required></textarea>

        <input name="opsi_a" class="input" placeholder="Opsi A" required>
        <input name="opsi_b" class="input" placeholder="Opsi B" required>
        <input name="opsi_c" class="input" placeholder="Opsi C" required>
        <input name="opsi_d" class="input" placeholder="Opsi D" required>

        <select name="jawaban_benar" class="input w-32">
            <option value="a">A</option>
            <option value="b">B</option>
            <option value="c">C</option>
            <option value="d">D</option>
        </select>

        <button class="bg-blue-600 text-white px-4 py-2 rounded">
            Simpan Soal
        </button>
    </form>
</div>

{{-- Hasil Tes --}}
<div class="bg-white p-4 rounded shadow">
    <h2 class="font-semibold mb-4">Hasil Tes Peserta</h2>

    <div class="overflow-x-auto">
        <table class="w-full border text-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border p-2">No</th>
                    <th class="border p-2">Nama</th>
                    <th class="border p-2">Total Soal</th>
                    <th class="border p-2">Benar</th>
                    <th class="border p-2">Nilai</th>
                </tr>
            </thead>
            <tbody>
            @forelse($hasils as $i => $hasil)
                <tr>
                    <td class="border p-2 text-center">{{ $i + 1 }}</td>
                    <td class="border p-2">{{ $hasil->calonSiswa->nama }}</td>
                    <td class="border p-2 text-center">{{ $hasil->total_soal }}</td>
                    <td class="border p-2 text-center">{{ $hasil->jawaban_benar }}</td>
                    <td class="border p-2 text-center font-semibold">
                        {{ $hasil->nilai }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center p-4 text-gray-500">
                        Belum ada hasil tes
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
