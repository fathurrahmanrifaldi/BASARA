@extends('layouts.auth')

@section('title', 'Reset Password – Bank Sampah RW 042')
@section('hero_badge', 'Pembaruan Keamanan')
@section('hero_title', 'Perbarui Kata Sandi Akun Anda')
@section('hero_desc', 'Gunakan kombinasi password yang kuat untuk menjaga privasi data dan keamanan tabungan sampah Anda di sistem Bank Sampah RW 042.')

@push('styles')
<style>
    .password-strength-wrap {
        margin-top: 8px;
    }
    .password-strength-bar {
        height: 5px;
        border-radius: 9999px;
        background-color: var(--slate-200);
        overflow: hidden;
    }
    .password-strength-fill {
        height: 100%;
        width: 0%;
        transition: all .3s ease;
    }
    .strength-text {
        font-size: 11.5px;
        margin-top: 4px;
        font-weight: 600;
    }
</style>
@endpush

@section('content')
<div class="auth-header">
    <div class="auth-badge-icon">
        <i class="bi bi-shield-lock-fill"></i>
    </div>
    <h3 class="auth-title">Buat Password Baru</h3>
    <p class="auth-subtitle">Masukkan kata sandi baru untuk akun Bank Sampah Anda</p>
</div>

@if ($errors->any())
    <div class="alert alert-danger mb-4">
        <i class="bi bi-exclamation-triangle-fill fs-5"></i>
        <div>{{ $errors->first() }}</div>
    </div>
@endif

<form method="POST" action="{{ route('password.update') }}">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">

    {{-- Email Field (prefilled & readonly) --}}
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
                value="{{ $email ?? old('email') }}"
                required
                autocomplete="email"
                readonly
                style="background-color: var(--slate-100); color: var(--slate-600);"
            >
        </div>
        @error('email')
            <div class="text-danger small mt-1">{{ $message }}</div>
        @enderror
    </div>

    {{-- Password Baru --}}
    <div class="mb-3">
        <label for="password" class="form-label">Password Baru</label>
        <div class="input-group">
            <span class="input-group-text bg-light border-end-0">
                <i class="bi bi-lock text-muted"></i>
            </span>
            <input
                id="password"
                type="password"
                name="password"
                class="form-control border-start-0 ps-0 @error('password') is-invalid @enderror"
                placeholder="Minimal 8 karakter"
                required
                autocomplete="new-password"
                oninput="checkPasswordStrength(this.value)"
            >
            <button class="btn btn-password-toggle" type="button" onclick="togglePassword(this)" title="Lihat password">
                <i class="bi bi-eye"></i>
            </button>
        </div>
        @error('password')
            <div class="text-danger small mt-1">{{ $message }}</div>
        @enderror

        {{-- Strength Indicator --}}
        <div class="password-strength-wrap">
            <div class="password-strength-bar">
                <div class="password-strength-fill" id="strengthFill"></div>
            </div>
            <div class="strength-text" id="strengthText" style="color: var(--slate-400);"></div>
        </div>
    </div>

    {{-- Konfirmasi Password Baru --}}
    <div class="mb-4">
        <label for="password-confirm" class="form-label">Konfirmasi Password Baru</label>
        <div class="input-group">
            <span class="input-group-text bg-light border-end-0">
                <i class="bi bi-lock-fill text-muted"></i>
            </span>
            <input
                id="password-confirm"
                type="password"
                name="password_confirmation"
                class="form-control border-start-0 ps-0"
                placeholder="Ulangi password baru"
                required
                autocomplete="new-password"
            >
            <button class="btn btn-password-toggle" type="button" onclick="togglePassword(this)" title="Lihat password">
                <i class="bi bi-eye"></i>
            </button>
        </div>
    </div>

    {{-- Submit Button --}}
    <button type="submit" class="btn-primary-action mb-4">
        <i class="bi bi-check-circle-fill"></i>
        <span>Simpan Password Baru</span>
    </button>

    {{-- Switch to Login --}}
    <div class="auth-switch-text">
        Tiba-tiba ingat password lama?
        <a href="{{ route('login') }}">Masuk di sini</a>
    </div>
</form>
@endsection

@push('scripts')
<script>
function checkPasswordStrength(val) {
    const fill = document.getElementById('strengthFill');
    const text = document.getElementById('strengthText');
    if (!fill || !text) return;

    let score = 0;
    if (val.length >= 8) score++;
    if (/[A-Z]/.test(val)) score++;
    if (/[0-9]/.test(val)) score++;
    if (/[^A-Za-z0-9]/.test(val)) score++;

    const levels = [
        { color: '#ef4444', text: 'Sangat Lemah', width: '25%' },
        { color: '#f97316', text: 'Cukup Lemah', width: '50%' },
        { color: '#eab308', text: 'Sedang', width: '75%' },
        { color: '#16a34a', text: 'Kuat & Aman', width: '100%' },
    ];

    if (val.length === 0) {
        fill.style.width = '0%';
        fill.style.backgroundColor = 'transparent';
        text.textContent = '';
        return;
    }

    const current = levels[Math.max(0, score - 1)];
    fill.style.width = current.width;
    fill.style.backgroundColor = current.color;
    text.textContent = current.text;
    text.style.color = current.color;
}
</script>
@endpush
