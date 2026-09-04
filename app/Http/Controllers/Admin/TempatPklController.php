<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TempatPkl;
use Illuminate\Http\Request;

class TempatPklController extends Controller
{
    public function index(Request $request)
    {
        $search = trim($request->input('search', ''));

        $tempats = TempatPkl::when($search !== '', function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('nama_perusahaan', 'like', '%' . $search . '%')
                        ->orWhere('bidang', 'like', '%' . $search . '%')
                        ->orWhere('alamat', 'like', '%' . $search . '%')
                        ->orWhere('no_hp', 'like', '%' . $search . '%')
                        ->orWhere('keterangan', 'like', '%' . $search . '%');
                });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.tempat.index', compact('tempats', 'search'));
    }

    public function create()
    {
        return view('admin.tempat.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_perusahaan' => 'required',
            'bidang' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'kuota' => 'required|integer|min:0',
            'keterangan' => 'nullable',
        ]);

        TempatPkl::create($request->all());

        return redirect()
            ->route('admin.tempat.index')
            ->with('success', 'Tempat PKL berhasil ditambahkan.');
    }

    public function show(TempatPkl $tempat)
    {
        return view('admin.tempat.show', compact('tempat'));
    }

    public function edit(TempatPkl $tempat)
    {
        return view('admin.tempat.edit', compact('tempat'));
    }

    public function update(Request $request, TempatPkl $tempat)
    {
        $request->validate([
            'nama_perusahaan' => 'required',
            'bidang' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'kuota' => 'required|integer|min:0',
            'keterangan' => 'nullable',
        ]);

        $tempat->update($request->all());

        return redirect()
            ->route('admin.tempat.index')
            ->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(TempatPkl $tempat)
    {
        $tempat->delete();

        return redirect()
            ->route('admin.tempat.index')
            ->with('success', 'Data berhasil dihapus.');
    }
}