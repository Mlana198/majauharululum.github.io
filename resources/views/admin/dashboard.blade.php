@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
<h1 class="text-3xl font-bold mb-6">Admin Dashboard</h1>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

    <a href="{{ route('admin.about.edit') }}" class="block p-5 bg-blue-600 text-white rounded-xl hover:bg-blue-700">
        <h2 class="text-xl font-semibold">Kelola About</h2>
        <p class="text-sm mt-2">Edit profil sekolah</p>
    </a>

    <a href="{{ route('admin.news.index') }}" class="block p-5 bg-green-600 text-white rounded-xl hover:bg-green-700">
        <h2 class="text-xl font-semibold">Kelola News</h2>
        <p class="text-sm mt-2">Berita sekolah</p>
    </a>

    <a href="{{ route('admin.contact') }}" class="block p-5 bg-yellow-600 text-white rounded-xl hover:bg-yellow-700">
        <h2 class="text-xl font-semibold">Kelola Contact</h2>
        <p class="text-sm mt-2">Pesan masuk</p>
    </a>

    <a href="{{ route('admin.ppdb.index') }}" class="block p-5 bg-purple-600 text-white rounded-xl hover:bg-purple-700">
        <h2 class="text-xl font-semibold">Kelola PPDB</h2>
        <p class="text-sm mt-2">Data pendaftar</p>
    </a>

    <a href="{{ route('admin.tes-masuk.index') }}" class="block p-5 bg-red-600 text-white rounded-xl hover:bg-red-700">
        <h2 class="text-xl font-semibold">Tes Masuk</h2>
        <p class="text-sm mt-2">Kelola soal & hasil</p>
    </a>

</div>
@endsection
