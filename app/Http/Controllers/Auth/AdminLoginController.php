<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AdminLoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AdminLoginController extends Controller
{
    public function showLoginForm(): View
    {
        return view('auth.admin.login');
    }

    public function login(AdminLoginRequest $request): RedirectResponse
    {
        $credentials = $request->only('email', 'password');

        if (! Auth::guard('admin')->attempt($credentials, $request->boolean('remember'))) {
            return back()
                ->withInput($request->only('email'))
                ->withErrors(['email' => 'Email atau password admin tidak sesuai.']);
        }

        // Periksa status aktif
        if (! Auth::guard('admin')->user()->is_active) {
            Auth::guard('admin')->logout();
            return back()
                ->withInput($request->only('email'))
                ->withErrors(['email' => 'Akun admin Anda telah dinonaktifkan. Hubungi superadmin.']);
        }

        $request->session()->regenerate();

        $intended = session()->pull('url.intended', route('admin.dashboard'));

        return redirect($intended)
            ->with('success', 'Selamat datang, ' . Auth::guard('admin')->user()->name . '!');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('admin.login')
            ->with('success', 'Anda berhasil keluar dari panel admin.');
    }
}
