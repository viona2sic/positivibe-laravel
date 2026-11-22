<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthPelanggan
{
    /**
     * Handle an incoming request.
     * Memastikan hanya pengguna yang ter-autentikasi via guard "pelanggan" yang bisa akses.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! Auth::guard('pelanggan')->check()) {
            session()->put('url.intended', $request->url());

            return redirect()
                ->route('pelanggan.login')
                ->with('error', 'Silakan login atau daftar terlebih dahulu untuk melanjutkan.');
        }

        // Pastikan akun pelanggan masih aktif
        if (! Auth::guard('pelanggan')->user()->is_active) {
            Auth::guard('pelanggan')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()
                ->route('pelanggan.login')
                ->with('error', 'Akun Anda telah dinonaktifkan. Hubungi kami untuk informasi lebih lanjut.');
        }

        return $next($request);
    }
}
