<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     * Redirect pengguna yang sudah login agar tidak bisa akses halaman login/register lagi.
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                return match ($guard) {
                    'admin'     => redirect()->route('admin.dashboard'),
                    'pelanggan' => redirect()->route('pelanggan.dashboard'),
                    default     => redirect('/'),
                };
            }
        }

        return $next($request);
    }
}
