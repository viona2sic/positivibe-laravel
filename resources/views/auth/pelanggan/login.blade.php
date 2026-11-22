@extends('layouts.guest.app')

@section('title', 'Login – PositiVibe Studio')

@section('content')

{{-- Login section: full-screen hero dengan form di tengah --}}
<section class="min-vh-100 d-flex align-items-center justify-content-center py-11 position-relative">

    {{-- Background gradient subtle --}}
    <div class="position-absolute top-0 start-0 w-100 h-100"
         style="background: linear-gradient(135deg, #0f0f0f 0%, #1a1a1a 60%, #0d1f0d 100%); z-index: 0;"></div>

    <div class="container position-relative z-1">
        <div class="row justify-content-center">
            <div class="col-sm-10 col-md-7 col-lg-5 col-xl-4">

                {{-- Logo & judul --}}
                <div class="text-center mb-6">
                    <a href="{{ route('home') }}" class="d-inline-block mb-4">
                        <img src="{{ asset('assets-guest/images/logos/logo-white.svg') }}" alt="PositiVibe" height="36">
                    </a>
                    <h2 class="text-white mb-1">Masuk ke akun Anda</h2>
                    <p class="text-white text-opacity-50 fs-6 mb-0">Selamat datang kembali di PositiVibe Studio</p>
                </div>

                {{-- Alert Sukses --}}
                @if (session('success'))
                    <div class="alert d-flex align-items-center gap-2 mb-4"
                         style="background: rgba(var(--bs-success-rgb), .15); border: 1px solid rgba(var(--bs-success-rgb),.3); color: #4ade80; border-radius: 10px; padding: 12px 16px;">
                        <iconify-icon icon="lucide:check-circle" class="fs-6 flex-shrink-0"></iconify-icon>
                        <span class="fs-7">{{ session('success') }}</span>
                    </div>
                @endif

                {{-- Alert Error Global --}}
                @if (session('error'))
                    <div class="alert d-flex align-items-center gap-2 mb-4"
                         style="background: rgba(220,53,69,.15); border: 1px solid rgba(220,53,69,.3); color: #f87171; border-radius: 10px; padding: 12px 16px;">
                        <iconify-icon icon="lucide:alert-circle" class="fs-6 flex-shrink-0"></iconify-icon>
                        <span class="fs-7">{{ session('error') }}</span>
                    </div>
                @endif

                {{-- Card Form --}}
                <div class="card border-0" style="background: rgba(255,255,255,.05); backdrop-filter: blur(12px); border-radius: 16px;">
                    <div class="card-body p-4 p-md-5">

                        <form method="POST" action="{{ route('pelanggan.login.submit') }}" novalidate>
                            @csrf

                            {{-- Email --}}
                            <div class="mb-4">
                                <label for="email" class="form-label text-white text-opacity-75 fs-7 fw-medium">
                                    Alamat Email
                                </label>
                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    autocomplete="email"
                                    placeholder="nama@email.com"
                                    class="form-control @error('email') is-invalid @enderror"
                                    style="background: rgba(255,255,255,.08); border: 1px solid rgba(255,255,255,.12); color: #fff; border-radius: 10px; padding: 12px 16px;"
                                    required autofocus>
                                @error('email')
                                    <div class="invalid-feedback d-block mt-1" style="color: #f87171; font-size: 0.8rem;">
                                        <iconify-icon icon="lucide:alert-circle" class="me-1"></iconify-icon>{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Password --}}
                            <div class="mb-4">
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <label for="password" class="form-label text-white text-opacity-75 fs-7 fw-medium mb-0">
                                        Password
                                    </label>
                                </div>
                                <div class="position-relative">
                                    <input
                                        type="password"
                                        id="password"
                                        name="password"
                                        autocomplete="current-password"
                                        placeholder="Masukkan password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        style="background: rgba(255,255,255,.08); border: 1px solid rgba(255,255,255,.12); color: #fff; border-radius: 10px; padding: 12px 42px 12px 16px;"
                                        required>
                                    <button type="button" id="togglePassword"
                                        style="position:absolute; right:12px; top:50%; transform:translateY(-50%); background:none; border:none; color: rgba(255,255,255,.5); padding:0; cursor:pointer;">
                                        <iconify-icon icon="lucide:eye" id="eyeIcon" class="fs-7"></iconify-icon>
                                    </button>
                                </div>
                                @error('password')
                                    <div class="invalid-feedback d-block mt-1" style="color: #f87171; font-size: 0.8rem;">
                                        <iconify-icon icon="lucide:alert-circle" class="me-1"></iconify-icon>{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Remember Me --}}
                            <div class="mb-4">
                                <div class="form-check">
                                    <input type="checkbox" id="remember" name="remember" class="form-check-input"
                                           style="background-color: rgba(255,255,255,.08); border-color: rgba(255,255,255,.2);">
                                    <label for="remember" class="form-check-label text-white text-opacity-50 fs-7">
                                        Ingat saya di perangkat ini
                                    </label>
                                </div>
                            </div>

                            {{-- Submit Button --}}
                            <button type="submit" class="btn w-100 justify-content-center py-3"
                                style="background: var(--bs-primary, #22c55e); color: #0f0f0f; border-radius: 10px; font-weight: 600; font-size: 0.95rem;">
                                <span>Masuk</span>
                                <iconify-icon icon="lucide:arrow-right" class="ms-2 fs-7"></iconify-icon>
                            </button>
                        </form>

                        {{-- Divider --}}
                        <div class="d-flex align-items-center gap-3 my-4">
                            <hr class="flex-grow-1" style="border-color: rgba(255,255,255,.1);">
                            <span class="text-white text-opacity-30 fs-8">atau</span>
                            <hr class="flex-grow-1" style="border-color: rgba(255,255,255,.1);">
                        </div>

                        {{-- Register link --}}
                        <p class="text-center text-white text-opacity-50 fs-7 mb-0">
                            Belum punya akun?
                            <a href="{{ route('pelanggan.register') }}" class="text-primary fw-semibold">Daftar sekarang</a>
                        </p>

                    </div>
                </div>

                {{-- Back to home --}}
                <div class="text-center mt-4">
                    <a href="{{ route('home') }}" class="hstack gap-2 justify-content-center text-white text-opacity-40 fs-7 text-decoration-none">
                        <iconify-icon icon="lucide:arrow-left" class="fs-8"></iconify-icon>
                        Kembali ke beranda
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    // Toggle show/hide password
    const toggleBtn = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('password');
    const eyeIcon = document.getElementById('eyeIcon');

    if (toggleBtn) {
        toggleBtn.addEventListener('click', function () {
            const isPassword = passwordInput.type === 'password';
            passwordInput.type = isPassword ? 'text' : 'password';
            eyeIcon.setAttribute('icon', isPassword ? 'lucide:eye-off' : 'lucide:eye');
        });
    }

    // Auto-style dark inputs placeholder
    document.querySelectorAll('input').forEach(el => {
        el.style.setProperty('--bs-body-color', '#fff');
    });
</script>
@endpush
