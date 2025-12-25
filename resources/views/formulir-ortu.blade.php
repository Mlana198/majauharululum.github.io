@extends('layouts.user')
@section('title', 'Formulir Orang Tua/Wali')
@section('content')
<body class="relative isolate bg-gray-900 py-24 sm:py-32">
    <div aria-hidden="true" class="hidden sm:absolute sm:-top-10 sm:right-1/2 sm:-z-10 sm:mr-10 sm:block sm:transform-gpu sm:blur-3xl">
        <div style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"
             class="aspect-1097/845 w-274.25 bg-linear-to-tr from-[#ff4694] to-[#776fff] opacity-20"></div>
    </div>

    <div aria-hidden="true" class="absolute -top-52 left-1/2 -z-10 -translate-x-1/2 transform-gpu blur-3xl sm:-top-112 sm:ml-16 sm:translate-x-0">
        <div style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"
             class="aspect-1097/845 w-274.25 bg-linear-to-tr from-[#ff4694] to-[#776fff] opacity-20"></div>
    </div>

    <div class="mx-auto max-w-5xl px-6 lg:px-8">
        <div class="mb-6">
            <h1 class="text-5xl font-semibold text-white">Data Orang Tua/Wali</h1>
        </div>

        <div class="bg-white rounded-2xl shadow px-6 py-6">
            <h2 class="text-xl font-semibold mb-2">Formulir Orang Tua/Wali Siswa Baru</h2>
            <p class="text-sm text-gray-600 mb-4">
                Harap lengkapi semua data Orang Tua calon siswa di bawah ini !!
            </p>

            <form
                action="{{ route('formulir.ortu.store', $calonSiswa->id) }}"
                method="POST"
                class="space-y-6"
            >
                @csrf

                <!-- AYAH -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">Nama Ayah</label>
                        <input type="text" name="nama_ayah" class="w-full rounded-md border-gray-300">
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-1">Pekerjaan Ayah</label>
                        <input type="text" name="pekerjaan_ayah" class="w-full rounded-md border-gray-300">
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-1">No HP Ayah</label>
                        <input type="text" name="nohp_ayah" class="w-full rounded-md border-gray-300">
                    </div>
                </div>

                <!-- IBU -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">Nama Ibu</label>
                        <input type="text" name="nama_ibu" class="w-full rounded-md border-gray-300">
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-1">Pekerjaan Ibu</label>
                        <input type="text" name="pekerjaan_ibu" class="w-full rounded-md border-gray-300">
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-1">No HP Ibu</label>
                        <input type="text" name="nohp_ibu" class="w-full rounded-md border-gray-300">
                    </div>
                </div>

                <!-- WALI -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">Nama Wali</label>
                        <input type="text" name="nama_wali" class="w-full rounded-md border-gray-300">
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-1">Pekerjaan Wali</label>
                        <input type="text" name="pekerjaan_wali" class="w-full rounded-md border-gray-300">
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-1">No HP Wali</label>
                        <input type="text" name="nohp_wali" class="w-full rounded-md border-gray-300">
                    </div>
                </div>

                <!-- ALAMAT -->
                <div>
                    <label class="block text-sm font-medium mb-1">Alamat Wali</label>
                    <textarea
                        name="alamat_wali"
                        class="w-full rounded-md border-gray-300"
                        rows="3"></textarea>
                </div>

                <!-- SUBMIT -->
                <button
                    type="submit"
                    class="flex justify-center mt-5 w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-lg font-medium">
                    Simpan & Lanjutkan
                </button>
            </form>
        </div>
    </div>
</body>
@endsection
