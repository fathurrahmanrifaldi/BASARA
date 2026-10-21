@extends('layouts.auth')

@section('title', 'Konfirmasi Password – Bank Sampah RW 042')
@section('hero_badge', 'Autentikasi Keamanan')
@section('hero_title', 'Konfirmasi Akses Area Sensitif')
@section('hero_desc', 'Untuk melindungi akun dan data nasabah Anda, mohon masukkan kembali password Anda sebelum melanjutkan ke tindakan ini.')

@section('content')
<div class="auth-header">
    <div class="auth-badge-icon">
        <i class="bi bi-shield-check"></i>
    </div>
    <h3 class="auth-title">Konfirmasi Password</h3>
    <p class="auth-subtitle">Harap konfirmasi kata sandi Anda sebelum melanjutkan.</p>
</div>

@if ($errors->any())
    <div class="alert alert-danger mb-4">
        <i class="bi bi-exclamation-triangle-fill fs-5"></i>
        <div>{{ $errors->first() }}</div>
    </div>
@endif

<form method="POST" action="{{ route('password.confirm') }}">
    @csrf

    <div class="mb-4">
        <div class="d-flex justify-content-between align-items-center mb-1">
            <label for="password" class="form-label mb-0">Password Akun</label>
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
                autofocus
            >
            <button class="btn btn-password-toggle" type="button" onclick="togglePassword(this)" title="Lihat password">
                <i class="bi bi-eye"></i>
            </button>
        </div>
        @error('password')
            <div class="text-danger small mt-1">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn-primary-action mb-4">
        <i class="bi bi-check-lg"></i>
        <span>Konfirmasi dan Lanjutkan</span>
    </button>

    <div class="auth-switch-text">
        Ingin kembali ke dashboard?
        <a href="{{ route('home') }}">Kembali</a>
    </div>
</form>
@endsection
