@extends('layouts.user')
@section('title', 'Upload Berkas')
@section('content')
<div class="max-w-4xl mx-auto bg-white p-8 rounded-xl shadow">

    <h1 class="text-3xl font-bold mb-4">Upload Berkas</h1>

    {{-- ERROR VALIDASI --}}
    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
            <ul class="list-disc ml-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST"
          action="{{ route('upload.store', $calonSiswa) }}"
          enctype="multipart/form-data">
        @csrf

        <div class="space-y-4">

            <div>
                <label class="block font-medium">Foto</label>
                <input type="file" name="foto" class="w-full border p-2 rounded">
            </div>

            <div>
                <label class="block font-medium">Ijazah</label>
                <input type="file" name="fc_ijazah" class="w-full border p-2 rounded">
            </div>

            <div>
                <label class="block font-medium">KTP Orang Tua</label>
                <input type="file" name="ktp_ortu" class="w-full border p-2 rounded">
            </div>

            <div>
                <label class="block font-medium">Kartu Keluarga</label>
                <input type="file" name="kk" class="w-full border p-2 rounded">
            </div>

            <div>
                <label class="block font-medium">Akta Lahir</label>
                <input type="file" name="akta_lahir" class="w-full border p-2 rounded">
            </div>

            <button type="submit"
                class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700">
                Simpan Berkas
            </button>

            <a href="/test" class="block text-center text-sm text-gray-500 mt-2">
                Lewati
            </a>
        </div>
    </form>
</div>
@endsection

  