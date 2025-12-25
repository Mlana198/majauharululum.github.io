@extends('layouts.admin')

@section('title', 'Kelola About')

@section('content')
<div class="max-w-7xl mx-10 bg-white shadow rounded-2xl p-6">

    <h1 class="text-3xl font-bold mb-6">Kelola About</h1>

    <div class="p-5 mb-10 bg-blue-600 text-white rounded-xl shadow">
        <h2 class="text-xl text-center font-semibold">Form About Sekolah</h2>
    </div>

    {{-- FORM --}}
    <form method="POST"
          action="{{ route('admin.about.update') }}"
          enctype="multipart/form-data">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
            <div>
                <label class="block text-lg font-medium mb-1">Jumlah Guru</label>
                <input type="number"
                       name="jumlah_guru"
                       class="w-full rounded-md border-gray-300"
                       value="{{ old('jumlah_guru', $about->jumlah_guru ?? '') }}">
            </div>

            <div>
                <label class="block text-lg font-medium mb-1">Jumlah Siswa</label>
                <input type="number"
                       name="jumlah_siswa"
                       class="w-full rounded-md border-gray-300"
                       value="{{ old('jumlah_siswa', $about->jumlah_siswa ?? '') }}">
            </div>
        </div>

        <div class="mb-10">
            <label class="block text-lg font-medium mb-1">Pengantar Kepala Madrasah</label>
            <textarea name="pengantar_kepala"
                      class="w-full rounded-md border-gray-300 h-40">{{ old('pengantar_kepala', $about->pengantar_kepala ?? '') }}</textarea>
        </div>

        <div class="mb-10">
            <label class="block text-lg font-medium mb-1">Struktur Organisasi</label>
            <input type="file"
                   name="struktur_organisasi"
                   class="w-full border p-2 rounded-lg bg-white">
        </div>

        <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg">
            Simpan Perubahan
        </button>
    </form>

</div>
@endsection
