<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Rekap PPDB</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 10px;
            margin: 0;
            padding: 0;
        }
        h2 {
            text-align: center;
            margin-bottom: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
        }
        th, td {
            border: 1px solid black;
            padding: 4px;
            word-wrap: break-word;
            font-size: 9px;
        }
        th {
            background-color: #f0f0f0;
        }
        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tbody tr:nth-child(odd) {
            background-color: #ffffff;
        }
        tr {
            page-break-inside: avoid;
        }
    </style>
</head>
<body>
    <h2>Rekap Data Calon Siswa PPDB</h2>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Tempat, Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Agama</th>
                <th>Alamat</th>
                <th>No HP Siswa</th>
                <th>Status Keluarga</th>
                <th>Asal Sekolah</th>
                <th>Tahun Lulus</th>
                <th>Nomor STL</th>
                <th>Nama Ayah</th>
                <th>Pekerjaan Ayah</th>
                <th>No HP Ayah</th>
                <th>Nama Ibu</th>
                <th>Pekerjaan Ibu</th>
                <th>No HP Ibu</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pendaftar as $index => $siswa)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $siswa->nama }}</td>
                    <td>{{ $siswa->tempat_lahir }}, {{ \Carbon\Carbon::parse($siswa->tanggal_lahir)->format('d-m-Y') }}</td>
                    <td>{{ $siswa->jenis_kelamin }}</td>
                    <td>{{ $siswa->agama }}</td>
                    <td>{{ $siswa->alamat }}</td>
                    <td>{{ $siswa->nohp_siswa }}</td>
                    <td>{{ $siswa->status_keluarga }}</td>
                    <td>{{ $siswa->asal_sekolah }}</td>
                    <td>{{ $siswa->tahun_lulus ?? '-' }}</td>
                    <td>{{ $siswa->nomor_stl ?? '-' }}</td>
                    <td>{{ $siswa->orangTua->nama_ayah ?? '-' }}</td>
                    <td>{{ $siswa->orangTua->pekerjaan_ayah ?? '-' }}</td>
                    <td>{{ $siswa->orangTua->nohp_ayah ?? '-' }}</td>
                    <td>{{ $siswa->orangTua->nama_ibu ?? '-' }}</td>
                    <td>{{ $siswa->orangTua->pekerjaan_ibu ?? '-' }}</td>
                    <td>{{ $siswa->orangTua->nohp_ibu ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
