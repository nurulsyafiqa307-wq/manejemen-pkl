<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PengajuanPkl;
use App\Models\TempatPkl;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $query = PengajuanPkl::with(['siswa', 'tempatPkl']);

        // Pencarian
        if ($request->filled('search')) {
            $search = trim($request->search);

            $query->where(function ($q) use ($search) {
                $q->whereHas('siswa', function ($siswa) use ($search) {
                    $siswa->where('nama', 'like', '%' . $search . '%')
                        ->orWhere('nis', 'like', '%' . $search . '%');
                })
                ->orWhereHas('tempatPkl', function ($tempat) use ($search) {
                    $tempat->where(
                        'nama_perusahaan',
                        'like',
                        '%' . $search . '%'
                    );
                });
            });
        }

        // Filter tahun
        if ($request->filled('tahun')) {
            $query->whereYear(
                'tanggal_pengajuan',
                $request->tahun
            );
        }

        // Filter tempat PKL
        if ($request->filled('tempat_pkl_id')) {
            $query->where(
                'tempat_pkl_id',
                $request->tempat_pkl_id
            );
        }

        $laporans = $query
            ->orderBy('tanggal_pengajuan', 'desc')
            ->get();

        // Daftar tahun yang tersedia
        $years = PengajuanPkl::query()
            ->whereNotNull('tanggal_pengajuan')
            ->selectRaw('YEAR(tanggal_pengajuan) as tahun')
            ->distinct()
            ->orderByDesc('tahun')
            ->pluck('tahun');

        // Daftar tempat PKL
        $tempatPkls = TempatPkl::orderBy(
            'nama_perusahaan'
        )->get();

        return view(
            'admin.laporan.index',
            compact(
                'laporans',
                'years',
                'tempatPkls'
            )
        );
    }

    public function pdf(Request $request)
    {
        $query = PengajuanPkl::with([
            'siswa',
            'tempatPkl'
        ]);

        // Pencarian
        if ($request->filled('search')) {
            $search = trim($request->search);

            $query->where(function ($q) use ($search) {
                $q->whereHas('siswa', function ($siswa) use ($search) {
                    $siswa->where('nama', 'like', '%' . $search . '%')
                        ->orWhere('nis', 'like', '%' . $search . '%');
                })
                ->orWhereHas('tempatPkl', function ($tempat) use ($search) {
                    $tempat->where(
                        'nama_perusahaan',
                        'like',
                        '%' . $search . '%'
                    );
                });
            });
        }

        // Cetak per tahun
        if ($request->filled('tahun')) {
            $query->whereYear(
                'tanggal_pengajuan',
                $request->tahun
            );
        }

        // Cetak per tempat PKL
        if ($request->filled('tempat_pkl_id')) {
            $query->where(
                'tempat_pkl_id',
                $request->tempat_pkl_id
            );
        }

        $laporans = $query
            ->orderBy('tanggal_pengajuan', 'desc')
            ->get();

        $tahun = $request->tahun;

        $tempatPkl = null;

        if ($request->filled('tempat_pkl_id')) {
            $tempatPkl = TempatPkl::find(
                $request->tempat_pkl_id
            );
        }

        $pdf = Pdf::loadView(
            'admin.laporan.pdf',
            compact(
                'laporans',
                'tahun',
                'tempatPkl'
            )
        );

        $namaFile = 'Laporan-PKL';

        if ($tahun) {
            $namaFile .= '-' . $tahun;
        }

        if ($tempatPkl) {
            $namaFile .= '-' .
                preg_replace(
                    '/[^A-Za-z0-9\-]/',
                    '-',
                    $tempatPkl->nama_perusahaan
                );
        }

        return $pdf->download(
            $namaFile . '.pdf'
        );
    }
}