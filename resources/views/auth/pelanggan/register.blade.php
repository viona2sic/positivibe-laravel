@extends('layouts.guest.app')

@section('title', 'Daftar Akun – PositiVibe Studio')

@section('content')

<section class="min-vh-100 d-flex align-items-center justify-content-center py-11 position-relative">

    <div class="position-absolute top-0 start-0 w-100 h-100"
         style="background: linear-gradient(135deg, #0f0f0f 0%, #1a1a1a 60%, #0d1f0d 100%); z-index: 0;"></div>

    <div class="container position-relative z-1">
        <div class="row justify-content-center">
            <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5">

                {{-- Logo & Judul --}}
                <div class="text-center mb-6">
                    <a href="{{ route('home') }}" class="d-inline-block mb-4">
                        <img src="{{ asset('assets-guest/images/logos/logo-white.svg') }}" alt="PositiVibe" height="36">
                    </a>
                    <h2 class="text-white mb-1">Buat Akun Baru</h2>
                    <p class="text-white text-opacity-50 fs-6 mb-0">Daftarkan diri dan mulai booking studio impianmu</p>
                </div>

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

                        <form method="POST" action="{{ route('pelanggan.register.submit') }}" novalidate>
                            @csrf

                            {{-- Nama Lengkap --}}
                            <div class="mb-4">
                                <label for="name" class="form-label text-white text-opacity-75 fs-7 fw-medium">
                                    Nama Lengkap <span class="text-danger">*</span>
                                </label>
                                <input
                                    type="text"
                                    id="name"
                                    name="name"
                                    value="{{ old('name') }}"
                                    autocomplete="name"
                                    placeholder="Masukkan nama lengkap"
                                    class="form-control @error('name') is-invalid @enderror"
                                    style="background: rgba(255,255,255,.08); border: 1px solid rgba(255,255,255,.12); color: #fff; border-radius: 10px; padding: 12px 16px;"
                                    required autofocus>
                                @error('name')
                                    <div class="invalid-feedback d-block mt-1" style="color: #f87171; font-size: 0.8rem;">
                                        <iconify-icon icon="lucide:alert-circle" class="me-1"></iconify-icon>{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Email --}}
                            <div class="mb-4">
                                <label for="email" class="form-label text-white text-opacity-75 fs-7 fw-medium">
                                    Alamat Email <span class="text-danger">*</span>
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
                                    required>
                                @error('email')
                                    <div class="invalid-feedback d-block mt-1" style="color: #f87171; font-size: 0.8rem;">
                                        <iconify-icon icon="lucide:alert-circle" class="me-1"></iconify-icon>{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Nomor HP --}}
                            <div class="mb-4">
                                <label for="phone" class="form-label text-white text-opacity-75 fs-7 fw-medium">
                                    Nomor HP <span class="text-white text-opacity-30 fw-normal">(opsional)</span>
                                </label>
                                <input
                                    type="tel"
                                    id="phone"
                                    name="phone"
                                    value="{{ old('phone') }}"
                                    autocomplete="tel"
                                    placeholder="081234567890"
                                    class="form-control @error('phone') is-invalid @enderror"
                                    style="background: rgba(255,255,255,.08); border: 1px solid rgba(255,255,255,.12); color: #fff; border-radius: 10px; padding: 12px 16px;">
                                @error('phone')
                                    <div class="invalid-feedback d-block mt-1" style="color: #f87171; font-size: 0.8rem;">
                                        <iconify-icon icon="lucide:alert-circle" class="me-1"></iconify-icon>{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Password --}}
                            <div class="mb-4">
                                <label for="password" class="form-label text-white text-opacity-75 fs-7 fw-medium">
                                    Password <span class="text-danger">*</span>
                                </label>
                                <div class="position-relative">
                                    <input
                                        type="password"
                                        id="password"
                                        name="password"
                                        autocomplete="new-password"
                                        placeholder="Minimal 8 karakter"
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

                            {{-- Konfirmasi Password --}}
                            <div class="mb-5">
                                <label for="password_confirmation" class="form-label text-white text-opacity-75 fs-7 fw-medium">
                                    Konfirmasi Password <span class="text-danger">*</span>
                                </label>
                                <input
                                    type="password"
                                    id="password_confirmation"
                                    name="password_confirmation"
                                    autocomplete="new-password"
                                    placeholder="Ulangi password"
                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                    style="background: rgba(255,255,255,.08); border: 1px solid rgba(255,255,255,.12); color: #fff; border-radius: 10px; padding: 12px 16px;"
                                    required>
                                @error('password_confirmation')
                                    <div class="invalid-feedback d-block mt-1" style="color: #f87171; font-size: 0.8rem;">
                                        <iconify-icon icon="lucide:alert-circle" class="me-1"></iconify-icon>{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Submit --}}
                            <button type="submit" class="btn w-100 justify-content-center py-3"
                                style="background: var(--bs-primary, #22c55e); color: #0f0f0f; border-radius: 10px; font-weight: 600; font-size: 0.95rem;">
                                <span>Buat Akun</span>
                                <iconify-icon icon="lucide:user-plus" class="ms-2 fs-7"></iconify-icon>
                            </button>
                        </form>

                        {{-- Divider --}}
                        <div class="d-flex align-items-center gap-3 my-4">
                            <hr class="flex-grow-1" style="border-color: rgba(255,255,255,.1);">
                            <span class="text-white text-opacity-30 fs-8">atau</span>
                            <hr class="flex-grow-1" style="border-color: rgba(255,255,255,.1);">
                        </div>

                        {{-- Login link --}}
                        <p class="text-center text-white text-opacity-50 fs-7 mb-0">
                            Sudah punya akun?
                            <a href="{{ route('pelanggan.login') }}" class="text-primary fw-semibold">Masuk sekarang</a>
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
</script>
@endpush
