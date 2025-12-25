@extends('layouts.user')

@section('title', 'Formulir Siswa')

@section('content')
<div class="mx-auto max-w-5xl px-6 lg:px-8">
  <div class="mb-6">
    <h1 class="text-5xl font-semibold text-white">Data Calon Siswa</h1>
  </div>

  <div class="bg-white rounded-2xl shadow px-6 py-6">
    <h2 class="text-xl font-semibold mb-2">Formulir Siswa Baru</h2>
    <p class="text-sm text-gray-600 mb-4">
      Harap lengkapi semua data calon siswa di bawah ini !!
    </p>

    <form
      id="siswaForm"
      action="{{ route('formulir.siswa.store') }}"
      method="POST"
      class="space-y-6"
    >
      @csrf

      <!-- NAMA & TEMPAT LAHIR -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <label class="block text-sm font-medium mb-1">Nama Lengkap</label>
          <input type="text" name="nama" class="w-full rounded-md border-gray-300">
        </div>

        <div>
          <label class="block text-sm font-medium mb-1">Tempat Lahir</label>
          <input type="text" name="tempat_lahir" class="w-full rounded-md border-gray-300">
        </div>
      </div>

      <!-- TANGGAL LAHIR -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div>
          <label class="block text-sm font-medium mb-1">Tanggal</label>
          <select id="dob_day" class="w-full rounded-md border-gray-300" required>
            <option value="" disabled selected>Pilih Tanggal</option>
            @for ($i = 1; $i <= 31; $i++)
              <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}">{{ $i }}</option>
            @endfor
          </select>
        </div>

        <div>
          <label class="block text-sm font-medium mb-1">Bulan</label>
          <select id="dob_month" class="w-full rounded-md border-gray-300" required>
            <option value="" disabled selected>Pilih Bulan</option>
            <option value="01">Januari</option>
            <option value="02">Februari</option>
            <option value="03">Maret</option>
            <option value="04">April</option>
            <option value="05">Mei</option>
            <option value="06">Juni</option>
            <option value="07">Juli</option>
            <option value="08">Agustus</option>
            <option value="09">September</option>
            <option value="10">Oktober</option>
            <option value="11">November</option>
            <option value="12">Desember</option>
          </select>
        </div>

        <div>
          <label class="block text-sm font-medium mb-1">Tahun</label>
          <select id="dob_year" class="w-full rounded-md border-gray-300" required>
            <option value="" disabled selected>Pilih Tahun</option>
            @for ($y = date('Y'); $y >= 1980; $y--)
              <option value="{{ $y }}">{{ $y }}</option>
            @endfor
          </select>
        </div>
      </div>

      <input type="hidden" name="tanggal_lahir" id="tanggal_lahir">

      <!-- AGAMA, JK, ANAK KE -->
      <div class="grid grid-cols-1 md:grid-cols-6 gap-4">
        <div class="md:col-span-2">
          <label class="block text-sm font-medium mb-1">Agama</label>
          <select name="agama" class="w-full rounded-md border-gray-300" required>
            <option disabled selected>Pilih Agama</option>
            <option value="islam">Islam</option>
            <option value="kristen_protestan">Kristen Protestan</option>
            <option value="katholik">Katholik</option>
            <option value="hindu">Hindu</option>
            <option value="buddha">Buddha</option>
            <option value="konghucu">Konghucu</option>
          </select>
        </div>

        <div class="md:col-span-2">
          <label class="block text-sm font-medium mb-1">Jenis Kelamin</label>
          <div class="flex gap-6 items-center">
            <label class="flex items-center gap-2">
              <input type="radio" name="jenis_kelamin" value="laki-laki" required>
              <span>Laki-laki</span>
            </label>
            <label class="flex items-center gap-2">
              <input type="radio" name="jenis_kelamin" value="perempuan" required>
              <span>Perempuan</span>
            </label>
          </div>
        </div>

        <div>
          <label class="block text-sm font-medium mb-1">Anak Ke</label>
          <select name="anak_ke" class="w-full rounded-md border-gray-300" required>
            <option disabled selected>Pilih Anak Ke</option>
            @for ($i = 1; $i <= 10; $i++)
              <option value="{{ $i }}">{{ $i }}</option>
            @endfor
          </select>
        </div>
      </div>

      <!-- ALAMAT & KONTAK -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div>
          <label class="block text-sm font-medium mb-1">Alamat</label>
          <textarea name="alamat" class="w-full rounded-md border-gray-300"></textarea>
        </div>

        <div>
          <label class="block text-sm font-medium mb-1">No HP</label>
          <input type="text" name="nohp_siswa" class="w-full rounded-md border-gray-300">
        </div>

        <div>
          <label class="block text-sm font-medium mb-1">Status Dalam Keluarga</label>
          <input type="text" name="status_keluarga" class="w-full rounded-md border-gray-300">
        </div>
      </div>

      <!-- ASAL SEKOLAH -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div>
          <label class="block text-sm font-medium mb-1">Asal Sekolah</label>
          <input type="text" name="asal_sekolah" class="w-full rounded-md border-gray-300">
        </div>

        <div>
          <label class="block text-sm font-medium mb-1">Tahun Lulus</label>
          <input type="text" name="tahun_lulus" class="w-full rounded-md border-gray-300">
        </div>

        <div>
          <label class="block text-sm font-medium mb-1">Nomor STL</label>
          <input type="text" name="nomor_stl" class="w-full rounded-md border-gray-300">
        </div>
      </div>

      <!-- SUBMIT -->
      <div>
        <button
          type="submit"
          class="flex justify-center mt-5 w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-lg font-medium">
          Simpan & Lanjutkan
        </button>
      </div>

    </form>
  </div>
</div>

<script>
  const day   = document.getElementById('dob_day');
  const month = document.getElementById('dob_month');
  const year  = document.getElementById('dob_year');
  const dob   = document.getElementById('tanggal_lahir');

  function updateDOB() {
    if (day.value && month.value && year.value) {
      dob.value = `${year.value}-${month.value}-${day.value}`;
    }
  }

  day.addEventListener('change', updateDOB);
  month.addEventListener('change', updateDOB);
  year.addEventListener('change', updateDOB);
</script>
@endsection


