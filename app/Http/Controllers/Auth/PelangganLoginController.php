<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\PelangganLoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PelangganLoginController extends Controller
{
    public function showLoginForm(): View
    {
        return view('auth.pelanggan.login');
    }

    public function login(PelangganLoginRequest $request): RedirectResponse
    {
        $credentials = $request->only('email', 'password');

        if (! Auth::guard('pelanggan')->attempt($credentials, $request->boolean('remember'))) {
            return back()
                ->withInput($request->only('email'))
                ->withErrors(['email' => 'Email atau password tidak sesuai.']);
        }

        // Periksa status aktif
        if (! Auth::guard('pelanggan')->user()->is_active) {
            Auth::guard('pelanggan')->logout();
            return back()
                ->withInput($request->only('email'))
                ->withErrors(['email' => 'Akun Anda telah dinonaktifkan. Hubungi kami untuk informasi lebih lanjut.']);
        }

        $request->session()->regenerate();

        $intended = session()->pull('url.intended', route('pelanggan.dashboard'));

        return redirect($intended)
            ->with('success', 'Selamat datang kembali, ' . Auth::guard('pelanggan')->user()->name . '!');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('pelanggan')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('pelanggan.login')
            ->with('success', 'Anda berhasil keluar. Sampai jumpa!');
    }
}
