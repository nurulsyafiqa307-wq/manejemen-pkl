<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class GuruController extends Controller
{
    public function index(Request $request)
{
    $search = trim($request->input('search', ''));

    $gurus = Guru::with('user')
        ->when($search !== '', function ($query) use ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', '%' . $search . '%')
                    ->orWhere('nip', 'like', '%' . $search . '%')
                    ->orWhere('no_hp', 'like', '%' . $search . '%')
                    ->orWhereHas('user', function ($userQuery) use ($search) {
                        $userQuery->where('email', 'like', '%' . $search . '%');
                    });
            });
        })
        ->latest()
        ->paginate(10)
        ->withQueryString();

    return view(
        'admin.guru.index',
        compact('gurus', 'search')
    );
}

    public function create()
    {
        return view('admin.guru.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'required|string|max:50|unique:gurus,nip',
            'no_hp' => 'nullable|string|max:20',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        DB::transaction(function () use ($validated) {

            $user = User::create([
                'name' => $validated['nama'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'role_id' => 2,
            ]);

            Guru::create([
                'user_id' => $user->id,
                'nip' => $validated['nip'],
                'nama' => $validated['nama'],
                'no_hp' => $validated['no_hp'] ?? null,
            ]);
        });

        return redirect()->route('admin.guru.index')
            ->with('success', 'Data guru berhasil ditambahkan.');
    }

    public function show(Guru $guru)
    {
        return view('admin.guru.show', compact('guru'));
    }

    public function edit(Guru $guru)
    {
        return view('admin.guru.edit', compact('guru'));
    }

    public function update(Request $request, Guru $guru)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'required|string|max:50|unique:gurus,nip,' . $guru->id,
            'no_hp' => 'nullable|string|max:20',
            'email' => 'required|email|unique:users,email,' . $guru->user_id,
            'password' => 'nullable|string|min:8',
        ]);

        DB::transaction(function () use ($guru, $validated) {

            $guru->update([
                'nama' => $validated['nama'],
                'nip' => $validated['nip'],
                'no_hp' => $validated['no_hp'] ?? null,
            ]);

            $guru->user->update([
                'name' => $validated['nama'],
                'email' => $validated['email'],
            ]);

            if (!empty($validated['password'])) {
                $guru->user->update([
                    'password' => Hash::make($validated['password']),
                ]);
            }
        });

        return redirect()->route('admin.guru.index')
            ->with('success', 'Data guru berhasil diperbarui.');
    }

    public function destroy(Guru $guru)
    {
        DB::transaction(function () use ($guru) {

            $user = $guru->user;

            $guru->delete();

            if ($user) {
                $user->delete();
            }
        });

        return redirect()->route('admin.guru.index')
            ->with('success', 'Data guru berhasil dihapus.');
    }
}