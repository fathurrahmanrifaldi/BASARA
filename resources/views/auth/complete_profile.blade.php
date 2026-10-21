@extends('layouts.auth')

@section('title', 'Lengkapi Profil – Bank Sampah RW 042')
@section('hero_badge', 'Pendaftaran Akun Google')
@section('hero_title', 'Hampir Selesai! Lengkapi Profil Anda')
@section('hero_desc', 'Akun Google Anda telah terhubung. Tentukan kata sandi agar Anda juga dapat masuk menggunakan email dan password secara langsung di kemudian hari.')

@section('content')
<div class="auth-header">
    <div class="auth-badge-icon">
        <i class="bi bi-shield-check"></i>
    </div>
    <h3 class="auth-title">Lengkapi Data Diri</h3>
    <p class="auth-subtitle">Selesaikan pembuatan akun dari autentikasi Google</p>
</div>

@if($errors->any())
    <div class="alert alert-danger mb-4">
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

<form method="POST" action="{{ route('nasabah.complete-profile.store') }}">
    @csrf

    {{-- Nama Lengkap (Dari Google) --}}
    <div class="mb-3">
        <label class="form-label">Nama Lengkap (Dari Google)</label>
        <div class="input-group">
            <span class="input-group-text bg-light border-end-0">
                <i class="bi bi-person text-muted"></i>
            </span>
            <input
                type="text"
                class="form-control border-start-0 ps-0"
                value="{{ $googleData['name'] ?? '' }}"
                disabled
                style="background-color: var(--slate-100); color: var(--slate-600);"
            >
        </div>
    </div>

    {{-- Email (Dari Google) --}}
    <div class="mb-3">
        <label class="form-label">Email (Dari Google)</label>
        <div class="input-group">
            <span class="input-group-text bg-light border-end-0">
                <i class="bi bi-envelope text-muted"></i>
            </span>
            <input
                type="email"
                class="form-control border-start-0 ps-0"
                value="{{ $googleData['email'] ?? '' }}"
                disabled
                style="background-color: var(--slate-100); color: var(--slate-600);"
            >
        </div>
    </div>

    {{-- Password & Confirm Password Row --}}
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="password" class="form-label">Buat Password</label>
            <div class="input-group">
                <input
                    id="password"
                    type="password"
                    name="password"
                    class="form-control"
                    placeholder="Min. 8 karakter"
                    required
                    autofocus
                >
                <button class="btn btn-password-toggle" type="button" onclick="togglePassword(this)" title="Lihat password">
                    <i class="bi bi-eye"></i>
                </button>
            </div>
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
                >
                <button class="btn btn-password-toggle" type="button" onclick="togglePassword(this)" title="Lihat password">
                    <i class="bi bi-eye"></i>
                </button>
            </div>
        </div>
    </div>

    <button type="submit" class="btn-primary-action mb-3">
        <i class="bi bi-check2-circle"></i>
        <span>Simpan & Selesaikan Pendaftaran</span>
    </button>
</form>
@endsection
