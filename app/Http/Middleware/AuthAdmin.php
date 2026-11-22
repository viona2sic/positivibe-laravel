<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthAdmin
{
    /**
     * Handle an incoming request.
     * Memastikan hanya pengguna yang ter-autentikasi via guard "admin" yang bisa akses.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! Auth::guard('admin')->check()) {
            // Simpan URL yang dituju agar bisa redirect balik setelah login
            session()->put('url.intended', $request->url());

            return redirect()
                ->route('admin.login')
                ->with('error', 'Silakan login sebagai admin terlebih dahulu.');
        }

        // Pastikan akun admin masih aktif
        if (! Auth::guard('admin')->user()->is_active) {
            Auth::guard('admin')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()
                ->route('admin.login')
                ->with('error', 'Akun admin Anda telah dinonaktifkan. Hubungi superadmin.');
        }

        return $next($request);
    }
}
