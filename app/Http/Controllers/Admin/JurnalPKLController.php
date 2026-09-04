<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JurnalPKL;
use App\Models\Siswa;
use Illuminate\Http\Request;

class JurnalPKLController extends Controller
{
    public function index(Request $request)
    {
        $search = trim($request->input('search', ''));

        $jurnals = JurnalPKL::with('siswa')
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($q) use ($search) {

                    // Cari berdasarkan nama siswa
                    $q->whereHas('siswa', function ($siswaQuery) use ($search) {
                        $siswaQuery->where('nama', 'like', '%' . $search . '%');
                    });

                    // Cari berdasarkan tanggal dd/mm/YYYY
                    $q->orWhereRaw(
                        "DATE_FORMAT(tanggal, '%d/%m/%Y') LIKE ?",
                        ['%' . $search . '%']
                    );

                    // Cari berdasarkan tahun
                    if (preg_match('/^\d{4}$/', $search)) {
                        $q->orWhereYear('tanggal', $search);
                    }

                    // Cari berdasarkan bulan angka
                    if (is_numeric($search) && (int) $search >= 1 && (int) $search <= 12) {
                        $q->orWhereMonth('tanggal', (int) $search);
                    }

                    // Cari berdasarkan nama bulan Indonesia
                    $bulan = [
                        'januari' => 1,
                        'februari' => 2,
                        'maret' => 3,
                        'april' => 4,
                        'mei' => 5,
                        'juni' => 6,
                        'juli' => 7,
                        'agustus' => 8,
                        'september' => 9,
                        'oktober' => 10,
                        'november' => 11,
                        'desember' => 12,
                    ];

                    $bulanKey = strtolower($search);

                    if (isset($bulan[$bulanKey])) {
                        $q->orWhereMonth('tanggal', $bulan[$bulanKey]);
                    }
                });
            })
            ->latest('tanggal')
            ->latest('id_jurnal')
            ->paginate(10)
            ->withQueryString();

        return view('admin.jurnal.index', compact('jurnals', 'search'));
    }

    public function create()
    {
        $siswas = Siswa::all();

        return view('admin.jurnal.create', compact('siswas'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'tanggal' => 'required|date',
            'jam_masuk' => 'required',
            'jam_pulang' => 'required',
            'kegiatan' => 'required|string',
            'kon' => 'nullable|string',
            'solusi' => 'nullable|string',
            'foto' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('jurnal', 'public');
        }

        $data['status_jurnal'] = 'Menunggu Review';

        JurnalPKL::create($data);

        return redirect()
            ->route('admin.jurnal.index')
            ->with('success', 'Jurnal berhasil ditambahkan.');
    }

    public function show(int $id)
    {
        $jurnal = JurnalPKL::with('siswa')->findOrFail($id);

        return view('admin.jurnal.show', compact('jurnal'));
    }

    public function edit(int $id)
    {
        $jurnal = JurnalPKL::findOrFail($id);
        $siswas = Siswa::all();

        return view('admin.jurnal.edit', compact('jurnal', 'siswas'));
    }

    public function update(Request $request, int $id)
    {
        $jurnal = JurnalPKL::findOrFail($id);

        $data = $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'tanggal' => 'required|date',
            'jam_masuk' => 'required',
            'jam_pulang' => 'required',
            'kegiatan' => 'required|string',
            'kon' => 'nullable|string',
            'solusi' => 'nullable|string',
            'foto' => 'nullable|image|max:2048',
            'status_jurnal' => 'required|in:Menunggu Review,Disetujui,Perlu Revisi',
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('jurnal', 'public');
        }

        $jurnal->update($data);

        return redirect()
            ->route('admin.jurnal.index')
            ->with('success', 'Jurnal berhasil diperbarui.');
    }

    public function destroy(int $id)
    {
        $jurnal = JurnalPKL::findOrFail($id);

        $jurnal->delete();

        return redirect()
            ->route('admin.jurnal.index')
            ->with('success', 'Jurnal berhasil dihapus.');
    }
}