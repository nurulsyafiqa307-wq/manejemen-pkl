<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Penilaian;
use Illuminate\Support\Facades\Auth;

class PenilaianController extends Controller
{
    /**
     * Menampilkan penilaian milik siswa yang sedang login.
     */
    public function index()
    {
        $siswa = Auth::user()->siswa;

        if (!$siswa) {
            abort(403, 'Data siswa tidak ditemukan.');
        }

        $penilaian = Penilaian::where('siswa_id', $siswa->id)
            ->latest()
            ->first();

        return view('siswa.penilaian.index', compact('penilaian'));
    }
}