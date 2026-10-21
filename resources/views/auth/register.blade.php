@extends('layouts.auth')

@section('title', 'Registrasi Nasabah – Bank Sampah RW 042')
@section('hero_badge', 'Bergabung Bersama Kami')
@section('hero_title', 'Mulai Menabung Sampah, Ciptakan Nilai Nyata')
@section('hero_desc', 'Daftarkan diri Anda sebagai nasabah resmi Bank Sampah RW 042 Kelurahan Bahagia. Konversikan sampah rumah tangga menjadi tabungan yang aman dan bermanfaat.')
@section('card_class', 'auth-card-wide')

@section('content')
<div class="auth-header">
    <div class="auth-badge-icon">
        <i class="bi bi-person-plus-fill"></i>
    </div>
    <h3 class="auth-title">Registrasi Akun Baru</h3>
    <p class="auth-subtitle">Isi data di bawah ini untuk membuat akun nasabah Bank Sampah</p>
</div>

{{-- Validation Errors --}}
@if($errors->any())
    <div class="alert alert-danger mb-3">
        <i class="bi bi-exclamation-triangle-fill fs-5"></i>
        <div>
            <ul class="mb-0 ps-3">
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

<form method="POST" action="{{ route('register') }}">
    @csrf

    {{-- Nama Lengkap --}}
    <div class="mb-3">
        <label for="name" class="form-label">Nama Lengkap</label>
        <div class="input-group">
            <span class="input-group-text bg-light border-end-0">
                <i class="bi bi-person text-muted"></i>
            </span>
            <input
                id="name"
                type="text"
                name="name"
                class="form-control border-start-0 ps-0 @error('name') is-invalid @enderror"
                value="{{ old('name') }}"
                placeholder="Contoh: Budi Santoso"
                required
                autocomplete="name"
                autofocus
            >
        </div>
        @error('name')
            <div class="text-danger small mt-1">{{ $message }}</div>
        @enderror
    </div>

    {{-- Email --}}
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
            >
        </div>
        @error('email')
            <div class="text-danger small mt-1">{{ $message }}</div>
        @enderror
    </div>

    {{-- Password & Confirm Password Row --}}
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="password" class="form-label">Password</label>
            <div class="input-group">
                <input
                    id="password"
                    type="password"
                    name="password"
                    class="form-control @error('password') is-invalid @enderror"
                    placeholder="Min. 8 karakter"
                    required
                    autocomplete="new-password"
                >
                <button class="btn btn-password-toggle" type="button" onclick="togglePassword(this)" title="Lihat password">
                    <i class="bi bi-eye"></i>
                </button>
            </div>
            @error('password')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
            <div class="input-group">
                <input
                    id="password_confirmation"
                    type="password"
                    name="password_confirmation"
                    class="form-control"
                    placeholder="Ulangi password"
                    required
                    autocomplete="new-password"
                >
                <button class="btn btn-password-toggle" type="button" onclick="togglePassword(this)" title="Lihat password">
                    <i class="bi bi-eye"></i>
                </button>
            </div>
        </div>
    </div>

    {{-- Terms Info --}}
    <p class="text-muted small mb-4" style="font-size: 12.5px;">
        Dengan mendaftar, Anda menyetujui ketentuan pengelolaan sampah dan tata tertib nasabah Bank Sampah RW 042 Bahagia.
    </p>

    {{-- Submit Button --}}
    <button type="submit" class="btn-primary-action mb-3">
        <i class="bi bi-person-check-fill"></i>
        <span>Daftar Akun Sekarang</span>
    </button>

    @if (Route::has('google.login'))
        <div class="auth-divider">atau daftar dengan</div>
        <a href="{{ route('google.login') }}" class="btn-google mb-3">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l2.85-2.22.81-.63z" fill="#FBBC05"/>
                <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.84c.87-2.6 3.3-4.52 6.16-4.52z" fill="#EA4335"/>
            </svg>
            <span>Daftar Cepat dengan Google</span>
        </a>
    @endif

    {{-- Switch to Login --}}
    <div class="auth-switch-text">
        Sudah memiliki akun?
        <a href="{{ route('login') }}">Masuk di sini</a>
    </div>
</form>
@endsection
