@extends('layouts.auth')

@section('title', 'Lupa Password – Bank Sampah RW 042')
@section('hero_badge', 'Pemulihan Keamanan Akun')
@section('hero_title', 'Keamanan Akun Anda Adalah Prioritas Kami')
@section('hero_desc', 'Jangan khawatir jika Anda lupa password. Masukkan email yang terdaftar dan kami akan mengirimkan tautan aman untuk membuat kata sandi baru.')

@section('content')
<div class="auth-header">
    <div class="auth-badge-icon">
        <i class="bi bi-key-fill"></i>
    </div>
    <h3 class="auth-title">Lupa Password?</h3>
    <p class="auth-subtitle">Masukkan alamat email terdaftar untuk menerima link reset kata sandi</p>
</div>

{{-- Status Message --}}
@if (session('status'))
    <div class="alert alert-success mb-4">
        <i class="bi bi-check-circle-fill fs-5"></i>
        <div>{{ session('status') }}</div>
    </div>
@endif

{{-- Error Messages --}}
@if ($errors->any())
    <div class="alert alert-danger mb-4">
        <i class="bi bi-exclamation-triangle-fill fs-5"></i>
        <div>{{ $errors->first() }}</div>
    </div>
@endif

<form method="POST" action="{{ route('password.email') }}">
    @csrf

    {{-- Email Field --}}
    <div class="mb-4">
        <label for="email" class="form-label">Alamat Email Terdaftar</label>
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
        @error('email')
            <div class="text-danger small mt-1">{{ $message }}</div>
        @enderror
    </div>

    {{-- Submit Button --}}
    <button type="submit" class="btn-primary-action mb-4">
        <i class="bi bi-send-fill"></i>
        <span>Kirim Link Reset Password</span>
    </button>

    {{-- Alternative Link --}}
    <div class="auth-switch-text">
        Ingat password Anda?
        <a href="{{ route('login') }}">Kembali ke Login</a>
    </div>
</form>
@endsection
