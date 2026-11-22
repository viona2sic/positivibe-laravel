@extends('layouts.guest.app')

@section('title', 'Dashboard – PositiVibe Studio')

@section('content')

<section class="py-11" style="min-height: 60vh;">
    <div class="container">

        {{-- Alert Sukses --}}
        @if (session('success'))
            <div class="alert d-flex align-items-center gap-2 mb-5"
                 style="background: rgba(var(--bs-success-rgb),.12); border: 1px solid rgba(var(--bs-success-rgb),.25); color: #4ade80; border-radius: 10px; padding: 14px 18px;">
                <iconify-icon icon="lucide:check-circle" class="fs-6 flex-shrink-0"></iconify-icon>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        {{-- Alert Info --}}
        @if (session('info'))
            <div class="alert d-flex align-items-center gap-2 mb-5"
                 style="background: rgba(13,202,240,.12); border: 1px solid rgba(13,202,240,.25); color: #38bdf8; border-radius: 10px; padding: 14px 18px;">
                <iconify-icon icon="lucide:info" class="fs-6 flex-shrink-0"></iconify-icon>
                <span>{{ session('info') }}</span>
            </div>
        @endif

        {{-- Alert Error --}}
        @if (session('error'))
            <div class="alert d-flex align-items-center gap-2 mb-5"
                 style="background: rgba(220,53,69,.12); border: 1px solid rgba(220,53,69,.25); color: #f87171; border-radius: 10px; padding: 14px 18px;">
                <iconify-icon icon="lucide:alert-circle" class="fs-6 flex-shrink-0"></iconify-icon>
                <span>{{ session('error') }}</span>
            </div>
        @endif

        <div class="row gap-7 gap-xl-0">
            <div class="col-xl-4">
                <div class="d-flex align-items-center gap-7 py-2">
                    <span class="round-36 flex-shrink-0 text-dark rounded-circle bg-primary hstack justify-content-center fw-medium">Hi</span>
                    <hr class="border-line">
                    <span class="badge text-bg-dark">Dashboard</span>
                </div>
            </div>
            <div class="col-xl-8">
                <h2 class="mb-2">Halo, {{ $pelanggan->name }}! 👋</h2>
                <p class="fs-5 mb-6 text-muted">Selamat datang di PositiVibe Studio. Kelola reservasi dan aktivitas Anda dari sini.</p>

                <div class="row g-4">
                    <div class="col-md-4">
                        <a href="{{ route('pelanggan.reservasi.create') }}" class="btn w-100 justify-content-center py-4 d-flex flex-column gap-2">
                            <iconify-icon icon="lucide:calendar-plus" class="fs-4"></iconify-icon>
                            <span>Booking Studio</span>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ route('pelanggan.reservasi.index') }}"
                            class="btn btn-outline-light w-100 justify-content-center py-4 d-flex flex-column gap-2 bg-white text-dark">
                            <iconify-icon icon="lucide:calendar-check" class="fs-4"></iconify-icon>
                            <span>Reservasi Saya</span>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ route('pelanggan.riwayat.index') }}"
                            class="btn btn-outline-light w-100 justify-content-center py-4 d-flex flex-column gap-2 bg-white text-dark">
                            <iconify-icon icon="lucide:history" class="fs-4"></iconify-icon>
                            <span>Riwayat</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Form Logout --}}
        <div class="mt-8">
            <form method="POST" action="{{ route('pelanggan.logout') }}" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-sm btn-outline-danger">
                    <iconify-icon icon="lucide:log-out" class="me-1"></iconify-icon>
                    Keluar
                </button>
            </form>
        </div>

    </div>
</section>
@endsection
