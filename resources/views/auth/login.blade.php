@extends('layouts.auth')

@section('title', 'Masuk – Bank Sampah RW 042')
@section('hero_badge', 'Portal Warga & Pengurus')
@section('hero_title', 'Selamat Datang di Bank Sampah RW 042')
@section('hero_desc', 'Akses akun Anda untuk memantau tabungan sampah, riwayat setoran, transaksi penimbangan, dan pengajuan penarikan saldo secara langsung.')

@section('content')
<div class="auth-header">
    <div class="auth-badge-icon">
        <i class="bi bi-box-arrow-in-right"></i>
    </div>
    <h3 class="auth-title">Masuk ke Akun</h3>
    <p class="auth-subtitle">Silakan masukkan email dan password terdaftar Anda</p>
</div>

{{-- Demo Account Callout Card --}}
<div class="demo-box">
    <div class="demo-box-header">
        <span class="demo-pill">
            <i class="bi bi-shield-lock-fill"></i> Demo Akun Petugas
        </span>
        <button type="button" class="btn-autofill" id="btnAutofill" onclick="fillDemoCredentials()">
            <i class="bi bi-lightning-charge-fill"></i>
            <span id="autofillText">Isi Otomatis</span>
        </button>
    </div>
    <div class="demo-details">
        <div class="demo-item">
            <span class="demo-item-label">Email</span>
            <span class="demo-item-val" id="demoEmail">staf@basara.test</span>
        </div>
        <div class="demo-item">
            <span class="demo-item-label">Password</span>
            <span class="demo-item-val" id="demoPass">password</span>
        </div>
    </div>
</div>

{{-- Alert Messages --}}
@if(session('success'))
    <div class="alert alert-success mb-3">
        <i class="bi bi-check-circle-fill fs-5"></i>
        <div>{{ session('success') }}</div>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger mb-3">
        <i class="bi bi-exclamation-triangle-fill fs-5"></i>
        <div>{{ session('error') }}</div>
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger mb-3">
        <i class="bi bi-exclamation-circle-fill fs-5"></i>
        <div>{{ $errors->first() }}</div>
    </div>
@endif

<form method="POST" action="{{ route('login') }}">
    @csrf

    {{-- Email Field --}}
    <div class="mb-3">
        <label for="email" class="form-label">Alamat Email</label>
        <div class="input-group">
            <span class="input-group-text bg-light border-end-0">
                <i class="bi bi-envelope text-muted"></i>
            </span>
            <input
                id="email"
                type="email"
                name="email"
                class="form-control border-start-0 ps-0 @error('email') is-invalid @enderror"
                value="{{ old('email') }}"
                placeholder="nama@email.com"
                required
                autocomplete="email"
                autofocus
            >
        </div>
    </div>

    {{-- Password Field --}}
    <div class="mb-3">
        <div class="d-flex justify-content-between align-items-center mb-1">
            <label for="password" class="form-label mb-0">Password</label>
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" style="font-size: 12.5px; color: var(--primary); font-weight: 600; text-decoration: none;">
                    Lupa Password?
                </a>
            @endif
        </div>
        <div class="input-group">
            <span class="input-group-text bg-light border-end-0">
                <i class="bi bi-lock text-muted"></i>
            </span>
            <input
                id="password"
                type="password"
                name="password"
                class="form-control border-start-0 ps-0 @error('password') is-invalid @enderror"
                placeholder="Masukkan password Anda"
                required
                autocomplete="current-password"
            >
            <button class="btn btn-password-toggle" type="button" onclick="togglePassword(this)" title="Lihat password">
                <i class="bi bi-eye"></i>
            </button>
        </div>
    </div>

    {{-- Remember Me --}}
    <div class="mb-4">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label" for="remember">
                Ingat saya di perangkat ini
            </label>
        </div>
    </div>

    {{-- Submit Button --}}
    <button type="submit" class="btn-primary-action mb-3">
        <i class="bi bi-box-arrow-in-right"></i>
        <span>Masuk ke Akun</span>
    </button>

    @if (Route::has('google.login'))
        <div class="auth-divider">atau</div>
        <a href="{{ route('google.login') }}" class="btn-google mb-3">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l2.85-2.22.81-.63z" fill="#FBBC05"/>
                <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.84c.87-2.6 3.3-4.52 6.16-4.52z" fill="#EA4335"/>
            </svg>
            <span>Masuk dengan Akun Google</span>
        </a>
    @endif

    {{-- Switch to Register --}}
    <div class="auth-switch-text">
        Belum memiliki akun nasabah?
        <a href="{{ route('register') }}">Registrasi Sekarang</a>
    </div>
</form>
@endsection

@push('scripts')
<script>
    function fillDemoCredentials() {
        const emailInput = document.getElementById('email');
        const passInput = document.getElementById('password');
        const btn = document.getElementById('btnAutofill');
        const text = document.getElementById('autofillText');

        if (emailInput && passInput) {
            emailInput.value = 'staf@basara.test';
            passInput.value = 'password';

            // Visual feedback
            btn.classList.add('bg-success');
            text.textContent = 'Terisi!';
            setTimeout(() => {
                text.textContent = 'Isi Otomatis';
                btn.classList.remove('bg-success');
            }, 1800);

            // Focus on submit button or email
            emailInput.dispatchEvent(new Event('input'));
            passInput.dispatchEvent(new Event('input'));
        }
    }
</script>
@endpush