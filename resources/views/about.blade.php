<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>About</title>
</head>
<body>

<x-navbar></x-navbar>

<div class="relative isolate overflow-hidden bg-gray-900 py-24 sm:py-32">
  <div aria-hidden="true" class="hidden sm:absolute sm:-top-10 sm:right-1/2 sm:-z-10 sm:mr-10 sm:block sm:transform-gpu sm:blur-3xl">
      <div style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"
           class="aspect-1097/845 w-274.25 bg-linear-to-tr from-[#ff4694] to-[#776fff] opacity-20"></div>
  </div>
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl lg:mx-0">
            <h2 class="text-5xl font-semibold tracking-tight text-white sm:text-7xl">
                Madrasah Aliyah (MA) Jauharul Ulum
            </h2>
            <p class="mt-8 text-lg font-medium text-gray-300 sm:text-xl/8">
                Sekolah swasta berbasis keagamaan yang berdiri sejak 2008 dan berakreditasi B.
            </p>
        </div>

        <div class="mx-auto mt-10 max-w-2xl lg:mx-0 lg:max-w-none">
            <dl class="mt-16 grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-4">
                <div class="flex flex-col-reverse gap-1">
                    <dt class="text-base/7 text-gray-300">Jumlah Siswa</dt>
                    <dd class="text-4xl font-semibold text-white">
                        {{ $about->jumlah_siswa ?? '-'}}
                    </dd>
                </div>

                <div class="flex flex-col-reverse gap-1">
                    <dt class="text-base/7 text-gray-300">Jumlah Guru</dt>
                    <dd class="text-4xl font-semibold text-white">
                        {{ $about->jumlah_guru ?? '-'}}
                    </dd>
                </div>
            </dl>
        </div>
    </div>
</div>

<div class="relative isolate overflow-hidden bg-gray-900 py-24 sm:py-32">
  <div aria-hidden="true" class="hidden sm:absolute sm:-top-10 sm:right-1/2 sm:-z-10 sm:mr-10 sm:block sm:transform-gpu sm:blur-3xl">
      <div style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"
           class="aspect-1097/845 w-274.25 bg-linear-to-tr from-[#ff4694] to-[#776fff] opacity-20"></div>
  </div>
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl lg:text-center">
            <p class="mt-2 text-4xl font-semibold tracking-tight text-white sm:text-5xl">
                Pengantar Kepala Madrasah
            </p>

            <p class="mt-20 text-lg/8 text-gray-300 text-justify">
                {{ $about->pengantar_kepala ?? 'Belum ada pengantar dari kepala madrasah.' }}
            </p>
        </div>

        @if(optional($about)->struktur_organisasi)
        <div class="mx-auto mt-16 max-w-4xl">
            <img src="{{ asset('storage/'.optional($about)->struktur_organisasi) }}"
             class="rounded-xl shadow">
        </div>
        @endif
    </div>
</div>


<div class="relative isolate overflow-hidden bg-gray-900 py-24 sm:py-32">
  <div aria-hidden="true" class="hidden sm:absolute sm:-top-10 sm:right-1/2 sm:-z-10 sm:mr-10 sm:block sm:transform-gpu sm:blur-3xl">
      <div style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"
           class="aspect-1097/845 w-274.25 bg-linear-to-tr from-[#ff4694] to-[#776fff] opacity-20"></div>
  </div>
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:text-center">
                <h2 class="text-4xl font-semibold tracking-tight text-white sm:text-5xl">
                    Profil Madrasah
                </h2>
                <p class="mt-4 text-lg text-gray-300">
                    Informasi umum, legalitas, serta arah pendidikan MA Jauharul Ulum
                </p>
            </div>

            <div class="mt-16 grid gap-6 md:grid-cols-2">
                {{-- Card 1 --}}
                <div class="bg-gray-800 border-l-4 border-emerald-500 rounded-xl shadow p-6 transition hover:scale-[1.02]">
                    <h3 class="font-semibold text-lg text-white mb-3">
                        Identitas Sekolah
                    </h3>
                    <ul class="space-y-1 text-gray-300">
                        <li><strong>Nama:</strong> MA Jauharul Ulum</li>
                        <li><strong>Status:</strong> Swasta</li>
                        <li><strong>Naungan:</strong> Kementerian Agama RI</li>
                        <li><strong>Berdiri:</strong> 19 Desember 2008</li>
                        <li><strong>SK:</strong> Kw.13.4/4/PP.03.2/3168/2008</li>
                        <li><strong>Alamat:</strong> Kendit, Paowan, Situbondo</li>
                    </ul>
                </div>

                {{-- Card 2 --}}
                <div class="bg-gray-800 border-l-4 border-yellow-500 rounded-xl shadow p-6 transition hover:scale-[1.02]">
                    <h3 class="font-semibold text-lg text-white mb-3">
                        Akreditasi & Legalitas
                    </h3>
                    <ul class="space-y-1 text-gray-300">
                        <li><strong>Status:</strong> B</li>
                        <li><strong>Nilai:</strong> 83 / 100</li>
                        <li><strong>SK:</strong> 164/BAP-S/M/SK/XI/2017</li>
                        <li><strong>Tanggal:</strong> 17 November 2017</li>
                    </ul>
                </div>

                {{-- Card 3 --}}
                <div class="bg-gray-800 border-l-4 border-blue-500 rounded-xl shadow p-6 md:col-span-2 transition hover:scale-[1.02]">
                    <h3 class="font-semibold text-lg text-white mb-3">
                        Visi & Misi
                    </h3>
                    <p class="text-gray-300 mb-3">
                        Terwujudnya peserta didik yang berkualitas dalam IPTEK dengan IMTAQ
                        serta berakhlakul karimah.
                    </p>
                    <ul class="list-disc list-inside space-y-1 text-gray-300">
                        <li>Semangat IMTAQ & IPTEK</li>
                        <li>Penelitian berorientasi masa depan</li>
                        <li>Pembelajaran kreatif & inovatif</li>
                        <li>Pengamalan nilai Islam</li>
                        <li>Peduli lingkungan</li>
                    </ul>
                </div>

                {{-- Card 4 --}}
                <div class="bg-gray-800 border-l-4 border-teal-500 rounded-xl shadow p-6 transition hover:scale-[1.02]">
                    <h3 class="font-semibold text-lg text-white mb-3">
                        Kurikulum & Kegiatan
                    </h3>
                    <ul class="list-disc list-inside space-y-1 text-gray-300">
                        <li>Kurikulum nasional bernuansa Islami</li>
                        <li>Pendidikan karakter</li>
                        <li>Ekstrakurikuler minat & bakat</li>
                    </ul>
                </div>

                {{-- Card 5 --}}
                <div class="bg-gray-800 border-l-4 border-indigo-500 rounded-xl shadow p-6 transition hover:scale-[1.02]">
                    <h3 class="font-semibold text-lg text-white mb-3">
                        Pengelolaan
                    </h3>
                    <p class="text-gray-300">
                        <strong>Operator Madrasah:</strong><br>
                        Risqiyatul Maulia, S.Pd
                    </p>
                </div>
            </div>
    </div>


<x-footer></x-footer>

</body>
</html>
