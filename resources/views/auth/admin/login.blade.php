<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login – PositiVibe Studio</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('assets-admin/images/Logo.svg') }}">
    @include('layouts.admin.css')
    <style>
        body { background: #0f172a; min-height: 100vh; display: flex; align-items: center; justify-content: center; }
        .login-card { background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.08); border-radius: 16px; padding: 2.5rem; width: 100%; max-width: 420px; }
        .form-input { background: rgba(255,255,255,0.06) !important; border: 1px solid rgba(255,255,255,0.1) !important; color: #e2e8f0 !important; border-radius: 8px; padding: 12px 16px; width: 100%; transition: border-color .2s; }
        .form-input:focus { outline: none; border-color: rgba(99,255,131,0.4) !important; box-shadow: 0 0 0 3px rgba(99,255,131,0.08) !important; }
        .form-input::placeholder { color: rgba(255,255,255,0.3); }
        .form-label { color: rgba(255,255,255,0.65); font-size: 0.85rem; font-weight: 500; display: block; margin-bottom: 6px; }
        .btn-login { background: linear-gradient(135deg, #22c55e, #16a34a); color: #0f0f0f; border: none; border-radius: 8px; padding: 12px 24px; width: 100%; font-weight: 700; font-size: 0.95rem; cursor: pointer; transition: opacity .2s; }
        .btn-login:hover { opacity: 0.9; }
        .error-msg { color: #f87171; font-size: 0.8rem; margin-top: 4px; }
        .alert-error { background: rgba(220,53,69,.12); border: 1px solid rgba(220,53,69,.25); color: #f87171; border-radius: 8px; padding: 12px 14px; font-size: 0.85rem; margin-bottom: 1.5rem; display: flex; align-items: center; gap: 8px; }
        .alert-success { background: rgba(34,197,94,.12); border: 1px solid rgba(34,197,94,.25); color: #4ade80; border-radius: 8px; padding: 12px 14px; font-size: 0.85rem; margin-bottom: 1.5rem; display: flex; align-items: center; gap: 8px; }
        .back-link { color: rgba(255,255,255,0.3); font-size: 0.82rem; text-decoration: none; display: flex; align-items: center; gap: 6px; justify-content: center; margin-top: 1.5rem; }
        .back-link:hover { color: rgba(255,255,255,0.6); }
    </style>
</head>
<body>

<div style="width: 100%; padding: 1.5rem; display: flex; flex-direction: column; align-items: center;">

    {{-- Logo --}}
    <div style="text-align: center; margin-bottom: 2rem;">
        <img src="{{ asset('assets-admin/images/Logo.svg') }}" alt="PositiVibe" style="height: 36px; margin-bottom: 1rem;">
        <h1 style="color: #f1f5f9; font-size: 1.4rem; font-weight: 700; margin: 0 0 4px;">Panel Admin</h1>
        <p style="color: rgba(255,255,255,0.4); font-size: 0.85rem; margin: 0;">Masuk untuk mengelola PositiVibe Studio</p>
    </div>

    <div class="login-card">

        {{-- Alert Sukses --}}
        @if (session('success'))
            <div class="alert-success">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
                {{ session('success') }}
            </div>
        @endif

        {{-- Alert Error Global --}}
        @if (session('error'))
            <div class="alert-error">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/></svg>
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.login.submit') }}" novalidate>
            @csrf

            {{-- Email --}}
            <div style="margin-bottom: 1.25rem;">
                <label for="email" class="form-label">Alamat Email Admin</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    autocomplete="email"
                    placeholder="admin@positivibe.com"
                    class="form-input"
                    required autofocus>
                @error('email')
                    <div class="error-msg">⚠ {{ $message }}</div>
                @enderror
            </div>

            {{-- Password --}}
            <div style="margin-bottom: 1.5rem;">
                <label for="password" class="form-label">Password</label>
                <div style="position: relative;">
                    <input
                        type="password"
                        id="password"
                        name="password"
                        autocomplete="current-password"
                        placeholder="Masukkan password"
                        class="form-input"
                        style="padding-right: 42px;"
                        required>
                    <button type="button" id="togglePassword"
                        style="position:absolute; right:12px; top:50%; transform:translateY(-50%); background:none; border:none; color: rgba(255,255,255,0.4); padding:0; cursor:pointer; line-height:1;">
                        <svg id="eyeOpen" xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/>
                        </svg>
                        <svg id="eyeClosed" xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 24 24" style="display:none;">
                            <path d="M12 7c2.76 0 5 2.24 5 5 0 .65-.13 1.26-.36 1.83l2.92 2.92c1.51-1.26 2.7-2.89 3.43-4.75-1.73-4.39-6-7.5-11-7.5-1.4 0-2.74.25-3.98.7l2.16 2.16C10.74 7.13 11.35 7 12 7zM2 4.27l2.28 2.28.46.46C3.08 8.3 1.78 10.02 1 12c1.73 4.39 6 7.5 11 7.5 1.55 0 3.03-.3 4.38-.84l.42.42L19.73 22 21 20.73 3.27 3 2 4.27zM7.53 9.8l1.55 1.55c-.05.21-.08.43-.08.65 0 1.66 1.34 3 3 3 .22 0 .44-.03.65-.08l1.55 1.55c-.67.33-1.41.53-2.2.53-2.76 0-5-2.24-5-5 0-.79.2-1.53.53-2.2zm4.31-.78 3.15 3.15.02-.16c0-1.66-1.34-3-3-3l-.17.01z"/>
                        </svg>
                    </button>
                </div>
                @error('password')
                    <div class="error-msg">⚠ {{ $message }}</div>
                @enderror
            </div>

            {{-- Remember --}}
            <div style="margin-bottom: 1.5rem; display: flex; align-items: center; gap: 8px;">
                <input type="checkbox" id="remember" name="remember"
                    style="accent-color: #22c55e; width: 16px; height: 16px; cursor: pointer;">
                <label for="remember" style="color: rgba(255,255,255,0.45); font-size: 0.83rem; cursor: pointer; margin: 0;">
                    Ingat saya di perangkat ini
                </label>
            </div>

            <button type="submit" class="btn-login">
                Masuk ke Panel Admin
            </button>
        </form>

    </div>

    <a href="{{ route('home') }}" class="back-link">
        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 24 24"><path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z"/></svg>
        Kembali ke beranda
    </a>

</div>

<script>
    const toggleBtn = document.getElementById('togglePassword');
    const pwInput = document.getElementById('password');
    const eyeOpen = document.getElementById('eyeOpen');
    const eyeClosed = document.getElementById('eyeClosed');

    if (toggleBtn) {
        toggleBtn.addEventListener('click', function () {
            const isHidden = pwInput.type === 'password';
            pwInput.type = isHidden ? 'text' : 'password';
            eyeOpen.style.display = isHidden ? 'none' : '';
            eyeClosed.style.display = isHidden ? '' : 'none';
        });
    }
</script>
</body>
</html>
