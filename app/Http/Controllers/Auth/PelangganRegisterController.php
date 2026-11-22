<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\PelangganRegisterRequest;
use App\Models\UserPelanggan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class PelangganRegisterController extends Controller
{
    public function showRegistrationForm(): View
    {
        return view('auth.pelanggan.register');
    }

    public function register(PelangganRegisterRequest $request): RedirectResponse
    {
        $pelanggan = UserPelanggan::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'phone'     => $request->phone,
            'password'  => Hash::make($request->password),
            'is_active' => true,
        ]);

        Auth::guard('pelanggan')->login($pelanggan);

        $request->session()->regenerate();

        return redirect()
            ->route('pelanggan.dashboard')
            ->with('success', 'Registrasi berhasil! Selamat datang di PositiVibe, ' . $pelanggan->name . '!');
    }
}
