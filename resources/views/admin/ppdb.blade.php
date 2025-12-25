@extends('layouts.admin')

@section('title', 'Kelola PPDB')

@section('content')
<h1 class="text-3xl font-bold mb-6">Kelola PPDB</h1>


<div class="p-5 mb-8 bg-blue-600 text-white rounded-xl shadow">
    <h2 class="text-xl text-center font-semibold">Data Pendaftar PPDB</h2>
</div>

<form method="POST" action="{{ route('admin.ppdb.jadwal.update') }}" class="my-10">
@csrf

<div class="grid grid-cols-1 md:grid-cols-3 gap-4 max-w-full">
    <div>
        <label class="font-medium">Jadwal Pendaftaran</label>
        <input type="text" name="pendaftaran"
               class="w-full border rounded p-2"
               value="{{ $jadwal->pendaftaran ?? '' }}">
    </div>

    <div>
        <label class="font-medium">Jadwal Tes Masuk</label>
        <input type="text" name="tes_masuk"
               class="w-full border rounded p-2"
               value="{{ $jadwal->tes_masuk ?? '' }}">
    </div>

    <div>
        <label class="font-medium">Jadwal Pengumuman</label>
        <input type="text" name="pengumuman"
               class="w-full border rounded p-2"
               value="{{ $jadwal->pengumuman ?? '' }}">
    </div>

    <!-- Tombol tetap berada di bawah grid -->
    <div class="md:col-span-3">
        <button class="bg-blue-600 text-white px-6 py-2 rounded mt-2">
            Simpan
        </button>
    </div>
</div>

</form>

<a href="{{ route('admin.ppdb.downloadAll') }}"
   class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded mb-4 inline-block">
   Download Excel + PDF + Berkas
</a>


<table class="w-full table-auto border border-gray-300 text-sm">
    <thead class="bg-gray-200">
        <tr>
            <th class="border p-3">No</th>
            <th class="border p-3">Nama</th>
            <th class="border p-3">TTL</th>
            <th class="border p-3">JK</th>
            <th class="border p-3">Agama</th>
            <th class="border p-3">Asal Sekolah</th>
            <th class="border p-3">Orang Tua</th>
            <th class="border p-3">Berkas</th>
            <th class="border p-3">Aksi</th>
        </tr>
    </thead>

    <tbody>
    @forelse ($pendaftar as $i => $s)
        <tr class="hover:bg-gray-50">
            <td class="border p-3 text-center">{{ $i + 1 }}</td>
            <td class="border p-3 font-medium">{{ $s->nama }}</td>
            <td class="border p-3">
                {{ $s->tempat_lahir }},
                {{ \Carbon\Carbon::parse($s->tanggal_lahir)->format('d-m-Y') }}
            </td>
            <td class="border p-3 text-center">{{ ucfirst($s->jenis_kelamin) }}</td>
            <td class="border p-3 text-center">{{ ucfirst(str_replace('_',' ',$s->agama)) }}</td>
            <td class="border p-3">{{ $s->asal_sekolah }}</td>

            <td class="border p-3">
                @if($s->orangTua)
                    Ayah: {{ $s->orangTua->nama_ayah }}<br>
                    Ibu: {{ $s->orangTua->nama_ibu }}
                @else
                    <span class="text-red-600">Belum diisi</span>
                @endif
            </td>

            <td class="border p-3 text-center">
                @if($s->berkas)
                    <span class="px-2 py-1 bg-green-200 text-green-800 rounded text-xs">
                        Lengkap
                    </span>
                @else
                    <span class="px-2 py-1 bg-yellow-200 text-yellow-800 rounded text-xs">
                        Belum Upload
                    </span>
                @endif
            </td>

            <td class="border p-3 space-y-1">
                @if($s->berkas)
                    @foreach (['foto','fc_ijazah','kk','ktp_ortu','akta_lahir'] as $file)
                        @if($s->berkas->$file)
                            <a href="{{ route('admin.ppdb.download', [$s->id, $file]) }}"
                               class="block text-blue-600 hover:underline">
                                {{ strtoupper(str_replace('_',' ',$file)) }}
                            </a>
                        @endif
                    @endforeach
                @else
                    <span class="text-gray-400 text-xs">Tidak ada berkas</span>
                @endif
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="9" class="p-5 text-center text-gray-500">
                Belum ada pendaftar.
            </td>
        </tr>
    @endforelse
    </tbody>
</table>
</div>
@endsection
