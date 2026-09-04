<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Penilaian;
use App\Models\Siswa;
use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    public function index(Request $request)
    {
        $search = trim($request->input('search', ''));

        $penilaians = Penilaian::with('siswa')
            ->when($search !== '', function ($query) use ($search) {
                $query->whereHas('siswa', function ($siswaQuery) use ($search) {
                    $siswaQuery->where('nama', 'like', '%' . $search . '%')
                        ->orWhere('nis', 'like', '%' . $search . '%')
                        ->orWhere('kelas', 'like', '%' . $search . '%')
                        ->orWhere('jurusan', 'like', '%' . $search . '%');
                });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.penilaian.index', compact('penilaians'));
    }

    public function create()
    {
        $siswas = Siswa::all();

        return view('admin.penilaian.create', compact('siswas'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'disiplin' => 'required|integer|min:0|max:100',
            'komunikasi' => 'required|integer|min:0|max:100',
            'kerjasama' => 'required|integer|min:0|max:100',
            'tanggung_jawab' => 'required|integer|min:0|max:100',
            'keterampilan' => 'required|integer|min:0|max:100',
            'catatan' => 'nullable|string',
        ]);

        $data['rata_rata'] = (
            $data['disiplin'] +
            $data['komunikasi'] +
            $data['kerjasama'] +
            $data['tanggung_jawab'] +
            $data['keterampilan']
        ) / 5;

        $penilaian = Penilaian::create($data);

Siswa::where('id', $data['siswa_id'])
    ->update([
        'status_pkl' => 'Selesai PKL',
    ]);

        return redirect()
            ->route('admin.penilaian.index')
            ->with('success', 'Penilaian berhasil ditambahkan.');
    }

    public function show(int $id)
    {
        $penilaian = Penilaian::with('siswa')->findOrFail($id);

        return view('admin.penilaian.show', compact('penilaian'));
    }

    public function edit(int $id)
    {
        $penilaian = Penilaian::findOrFail($id);
        $siswas = Siswa::all();

        return view('admin.penilaian.edit', compact('penilaian', 'siswas'));
    }

    public function update(Request $request, int $id)
    {
        $penilaian = Penilaian::findOrFail($id);

        $data = $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'disiplin' => 'required|integer|min:0|max:100',
            'komunikasi' => 'required|integer|min:0|max:100',
            'kerjasama' => 'required|integer|min:0|max:100',
            'tanggung_jawab' => 'required|integer|min:0|max:100',
            'keterampilan' => 'required|integer|min:0|max:100',
            'catatan' => 'nullable|string',
        ]);

        $data['rata_rata'] = (
            $data['disiplin'] +
            $data['komunikasi'] +
            $data['kerjasama'] +
            $data['tanggung_jawab'] +
            $data['keterampilan']
        ) / 5;

        $penilaian->update($data);

        return redirect()
            ->route('admin.penilaian.index')
            ->with('success', 'Penilaian berhasil diperbarui.');
    }

    public function destroy(int $id)
{
    $penilaian = Penilaian::findOrFail($id);

    $siswa = $penilaian->siswa;

    $penilaian->delete();

    if ($siswa) {
        $siswa->update([
            'status_pkl' => 'Sedang PKL',
        ]);
    }

    return redirect()
        ->route('admin.penilaian.index')
        ->with('success', 'Penilaian berhasil dihapus.');
}
}