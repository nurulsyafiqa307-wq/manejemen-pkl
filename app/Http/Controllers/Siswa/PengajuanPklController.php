<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\PengajuanPkl;
use App\Models\TempatPkl;
use Illuminate\Http\Request;

class PengajuanPklController extends Controller
{
    /**
     * Menampilkan semua pengajuan PKL milik siswa.
     */
    public function index()
    {
        $siswa = auth()->user()->siswa;

        if (!$siswa) {
            abort(403, 'Data siswa tidak ditemukan.');
        }

        $pengajuans = PengajuanPkl::with([
            'tempatPkl',
            'siswa.guruPembimbing'
        ])
            ->where('siswa_id', $siswa->id)
            ->latest()
            ->get();

        return view('siswa.pengajuan.index', compact('pengajuans'));
    }

    /**
     * Menampilkan form pengajuan PKL.
     */
    public function create()
    {
        $siswa = auth()->user()->siswa;

        if (!$siswa) {
            abort(403, 'Data siswa tidak ditemukan.');
        }

        // Cek apakah siswa sudah ada pengajuan yang Lolos
        $sudahLolos = PengajuanPkl::where('siswa_id', $siswa->id)
            ->where('status', 'Lolos')
            ->exists();

        if ($sudahLolos) {
            return redirect()
                ->route('siswa.pengajuan.index')
                ->with(
                    'success',
                    'Kamu sudah lolos PKL dan tidak perlu mengajukan lagi.'
                );
        }

        // Ambil semua tempat PKL yang masih memiliki kuota
        $tempatPkls = TempatPkl::orderBy('nama_perusahaan')
            ->get()
            ->filter(function ($tempat) {

                $jumlahLolos = PengajuanPkl::where('tempat_pkl_id', $tempat->id)
                    ->where('status', 'Lolos')
                    ->count();

                return $jumlahLolos < $tempat->kuota;
            });

        return view(
            'siswa.pengajuan.create',
            compact('tempatPkls')
        );
    }

    /**
     * Menyimpan pengajuan PKL baru.
     */
    public function store(Request $request)
    {
        $siswa = auth()->user()->siswa;

        if (!$siswa) {
            abort(403, 'Data siswa tidak ditemukan.');
        }

        // Kalau siswa sudah Lolos, tidak boleh mengajukan lagi
        $sudahLolos = PengajuanPkl::where('siswa_id', $siswa->id)
            ->where('status', 'Lolos')
            ->exists();

        if ($sudahLolos) {
            abort(403, 'Kamu sudah lolos PKL.');
        }

        // Tidak boleh membuat pengajuan baru
        // kalau masih ada pengajuan yang menunggu seleksi
        $masihMenunggu = PengajuanPkl::where('siswa_id', $siswa->id)
            ->where('status', 'Menunggu Seleksi')
            ->exists();

        if ($masihMenunggu) {
            return redirect()
                ->route('siswa.pengajuan.index')
                ->with(
                    'success',
                    'Kamu masih memiliki pengajuan yang sedang menunggu seleksi.'
                );
        }

        $validated = $request->validate([
            'tempat_pkl_id' => 'required|exists:tempat_pkls,id',
        ]);

        // Ambil tempat PKL yang dipilih
        $tempat = TempatPkl::findOrFail($validated['tempat_pkl_id']);

        // Hitung jumlah siswa yang sudah LOLOS
        $jumlahLolos = PengajuanPkl::where('tempat_pkl_id', $tempat->id)
            ->where('status', 'Lolos')
            ->count();

        // Cek apakah kuota sudah penuh
        if ($jumlahLolos >= $tempat->kuota) {
            return redirect()
                ->route('siswa.pengajuan.create')
                ->with(
                    'success',
                    'Maaf, kuota PKL di ' . $tempat->nama_perusahaan . ' sudah penuh.'
                );
        }

        // Simpan pengajuan
        PengajuanPkl::create([
            'siswa_id' => $siswa->id,
            'tempat_pkl_id' => $tempat->id,
            'tanggal_pengajuan' => now()->toDateString(),
            'status' => 'Menunggu Seleksi',
        ]);

        return redirect()
            ->route('siswa.pengajuan.index')
            ->with(
                'success',
                'Pengajuan PKL berhasil dikirim dan sedang menunggu seleksi.'
            );
    }
}