<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (!auth()->check()) {
            return redirect('/login');
        }

        $user = auth()->user();

        $roleId = match ($role) {
            'admin' => 1,
            'guru' => 2,
            'siswa' => 3,
            default => null,
        };

        if ($roleId === null || (int) $user->role_id !== $roleId) {
            abort(403);
        }

        return $next($request);
    }
}