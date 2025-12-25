<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use ZipArchive;
use App\Models\CalonSiswa;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\PendaftarExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class AdminPpdbController extends Controller
{
    public function index()
    {
        $pendaftar = CalonSiswa::with(['orangTua', 'berkas'])
            ->latest()
            ->get();

        return view('admin.ppdb', compact('pendaftar'));
    }

    public function downloadAll()
    {
        $pendaftar = CalonSiswa::with(['orangTua', 'berkas'])->get();

        // Folder sementara
        $tempDir = storage_path('app/temp');
        if (!is_dir($tempDir)) mkdir($tempDir, 0755, true);

        $zipName = 'PPDB_' . now()->format('Ymd_His') . '.zip';
        $zipPath = $tempDir . '/' . $zipName;

        $zip = new ZipArchive;
        if (!$zip->open($zipPath, ZipArchive::CREATE | ZipArchive::OVERWRITE)) {
            throw new \Exception("Tidak bisa membuat file ZIP di $zipPath");
        }

        /** ========= EXCEL ========= */
        $excelRelative = 'temp/data_pendaftar.xlsx';
        $excelAbsolute = Storage::disk('local')->path($excelRelative);
        Excel::store(new PendaftarExport, $excelRelative, 'local');
        if (!file_exists($excelAbsolute)) throw new \Exception("File Excel tidak ditemukan: $excelAbsolute");
        $zip->addFile($excelAbsolute, 'data_pendaftar.xlsx');

        /** ========= PDF ========= */
        $pdf = Pdf::loadView('admin.ppdb.rekap-pdf', compact('pendaftar'))
            ->setPaper('a4', 'landscape');
        $pdfRelative = 'temp/rekap_ppdb.pdf';
        $pdfAbsolute = Storage::disk('local')->path($pdfRelative);
        Storage::disk('local')->put($pdfRelative, $pdf->output());
        if (!file_exists($pdfAbsolute)) throw new \Exception("File PDF tidak ditemukan: $pdfAbsolute");
        $zip->addFile($pdfAbsolute, 'rekap_ppdb.pdf');

        /** ========= BERKAS SISWA ========= */
        foreach ($pendaftar as $s) {
            if (!$s->berkas) continue;

            // Folder per siswa
            $folder = 'berkas/' . str_replace(' ', '_', $s->nama);
            $zip->addEmptyDir($folder);

            // Jenis berkas
            foreach (['foto','fc_ijazah','kk','ktp_ortu','akta_lahir'] as $file) {
                $path = $s->berkas->$file;
                if ($path && Storage::disk('public')->exists($path)) {
                    $zip->addFile(
                        Storage::disk('public')->path($path),
                        "$folder/" . basename($path)
                    );
                } else {
                    Log::warning("File tidak ditemukan untuk $s->nama: $file => $path");
                }
            }
        }

        $zip->close();

        // Bersihkan file sementara
        if (file_exists($excelAbsolute)) unlink($excelAbsolute);
        if (file_exists($pdfAbsolute)) unlink($pdfAbsolute);

        return response()->download($zipPath)->deleteFileAfterSend(true);
    }


    public function download($id, $file)
    {
        $siswa = CalonSiswa::with('berkas')->findOrFail($id);
        if (!$siswa->berkas || !$siswa->berkas->$file) abort(404);

        return response()->download(
            Storage::disk('local')->path($siswa->berkas->$file)
        );
    }
}
