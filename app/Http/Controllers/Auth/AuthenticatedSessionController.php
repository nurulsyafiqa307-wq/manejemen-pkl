<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $user = Auth::user();

        // Admin
        if ($user->role_id === 1) {
            return redirect()->route('admin.dashboard');
        }

        // Guru
        if ($user->role_id === 2) {
            return redirect()->route('guru.dashboard');
        }

        // Siswa
        if ($user->role_id === 3) {
            return redirect()->route('siswa.dashboard');
        }

        // Jika role tidak valid
        Auth::logout();

        return redirect('/login')
            ->withErrors([
                'email' => 'Role akun tidak valid.',
            ]);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}