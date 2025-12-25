@extends('layouts.admin')

@section('title', 'Kelola News')

@section('content')
<h1 class="text-2xl font-bold mb-6">Kelola News</h1>

<div class="mb-8 bg-green-600 text-white rounded-xl p-4 text-center font-semibold">
    Tambah Berita
</div>

<form method="POST"
      action="{{ route('admin.news.store') }}"
      enctype="multipart/form-data"
      class="space-y-6">

    @csrf

    <div>
        <label class="block font-medium mb-1">Judul</label>
        <input type="text"
               name="title"
               class="w-full rounded-md border-gray-300"
               required>
    </div>

    <div>
        <label class="block font-medium mb-1">Isi Berita</label>
        <textarea name="body"
                  rows="6"
                  class="w-full rounded-md border-gray-300"
                  required></textarea>
    </div>

    <div>
        <label class="block font-medium mb-1">Foto Berita</label>
        <input type="file"
               name="image"
               class="w-full border p-2 rounded-lg bg-white">
    </div>

    <button class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg">
        Simpan Berita
    </button>
</form>
@endsection
