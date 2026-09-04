<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Models\Guru;
use App\Models\PengajuanPKL;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $siswaCount     = Siswa::count();
        $guruCount      = Guru::count();
        $pengajuanCount = PengajuanPKL::count();

        // Status pengajuan
        $pendingCount = PengajuanPKL::where('status', 'Menunggu Seleksi')->count();

        // Jurnal — aman kalau tabel belum ada
        $jurnalCount  = 0;
        $recentJurnal = collect();

        try {
            if (Schema::hasTable('jurnal_pkls')) {
                $jurnalCount  = \App\Models\JurnalPKL::count();
                $recentJurnal = \App\Models\JurnalPKL::with('siswa')->latest()->take(3)->get();
            }
        } catch (\Throwable $e) {
        }

        // Progress PKL (ambil dari tabel pengajuan)
        $pklAktif = PengajuanPKL::where('status', 'Lolos')->count();
        $pklSelesai = 0;
        $pklBelum = $siswaCount - $pklAktif;

        if ($pklBelum < 0) {
            $pklBelum = 0;
        }

        $recentSiswa = Siswa::latest()->take(5)->get();

        $pendingPengajuan = PengajuanPKL::with('siswa')
            ->where('status', 'Menunggu Seleksi')
            ->latest()
            ->take(3)
            ->get();

        return view('admin.dashboard', compact(
            'siswaCount',
            'guruCount',
            'pengajuanCount',
            'pendingCount',
            'jurnalCount',
            'recentSiswa',
            'pendingPengajuan',
            'recentJurnal',
            'pklAktif',
            'pklSelesai',
            'pklBelum',
        ));
    }
}