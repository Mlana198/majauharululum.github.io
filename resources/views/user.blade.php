{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>User</title>
</head>
<x-navbar></x-navbar>

<body class="relative isolate bg-gray-900 py-24 sm:py-32 ">
    <div aria-hidden="true" class="hidden sm:absolute sm:-top-10 sm:right-1/2 sm:-z-10 sm:mr-10 sm:block sm:transform-gpu sm:blur-3xl">
        <div style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)" class="aspect-1097/845 w-274.25 bg-linear-to-tr from-[#ff4694] to-[#776fff] opacity-20"></div>
    </div>
    <div aria-hidden="true" class="absolute -top-52 left-1/2 -z-10 -translate-x-1/2 transform-gpu blur-3xl sm:-top-112 sm:ml-16 sm:translate-x-0">
        <div style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)" class="aspect-1097/845 w-274.25 bg-linear-to-tr from-[#ff4694] to-[#776fff] opacity-20"></div>
    </div>
    <div class="max-w-4xl mx-auto bg-white shadow rounded-2xl p-6">
        <h1 class="text-2xl font-semibold mb-4">Profil Calon Peserta Didik</h1>


        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <p class="font-medium">Nama Lengkap:</p>
                {{-- <p class="text-gray-700">{{ $user->nama }}</p> --}}
            </div>
            <div>
                <p class="font-medium">Tempat, Tanggal Lahir:</p>
                {{-- <p class="text-gray-700">{{ $user->tempat_lahir }}, {{ $user->dob }}</p> --}}
            </div>
            <div>
                <p class="font-medium">Agama:</p>
                {{-- <p class="text-gray-700">{{ $user->agama }}</p> --}}
            </div>
            <div>
                <p class="font-medium">Jenis Kelamin:</p>
                {{-- <p class="text-gray-700">{{ $user->jenis_kelamin }}</p> --}}
            </div>
        </div>


        <h2 class="text-xl font-semibold mt-6 mb-2">Alamat</h2>
            {{-- <p class="text-gray-700">{{ $user->alamat_lengkap }}</p> --}}


        <h2 class="text-xl font-semibold mt-6 mb-2">Kontak</h2>
            {{-- <p class="text-gray-700">No HP: {{ $user->nohp_siswa }}</p> --}}

        @if($hasil?->exists)
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
    {{-- </div>

    
</body>
{{-- <x-footer></x-footer> --}}

{{-- </html> --}}