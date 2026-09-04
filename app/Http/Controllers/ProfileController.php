<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Menampilkan halaman profil sesuai role user.
     */
    public function edit(Request $request): View
    {
        $user = $request->user();

        // Siswa
        if ((int) $user->role_id === 3) {
            return view('profile.edit', [
                'user' => $user,
                'siswa' => $user->siswa,
            ]);
        }

        // Guru
        if ((int) $user->role_id === 2) {
            return view('profile.edit-guru', [
                'user' => $user,
                'guru' => $user->guru,
            ]);
        }

        // Admin
        return view('profile.edit-admin', [
            'user' => $user,
        ]);
    }

    /**
     * Memperbarui profil.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();

        // Update data akun
        $user->fill($request->validated());

        // Jika email berubah, verifikasi email di-reset
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        // =========================
        // UPDATE DATA SISWA
        // =========================
        if ((int) $user->role_id === 3 && $user->siswa) {
            $user->siswa->update([
                'no_hp' => $request->input('no_hp'),
            ]);

            return Redirect::route('profile.edit')
                ->with('status', 'profile-updated');
        }

        // =========================
        // UPDATE DATA GURU
        // =========================
        if ((int) $user->role_id === 2 && $user->guru) {
            $user->guru->update([
                'no_hp' => $request->input('no_hp'),
            ]);

            return Redirect::route('profile.edit-guru')
                ->with('status', 'profile-updated');
        }

        abort(403, 'Data profil tidak ditemukan.');
    }

    /**
     * Menghapus akun.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}