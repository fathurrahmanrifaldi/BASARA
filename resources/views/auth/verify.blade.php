@extends('layouts.auth')

@section('title', 'Verifikasi Email – Bank Sampah RW 042')
@section('hero_badge', 'Aktivasi Akun Nasabah')
@section('hero_title', 'Satu Langkah Lagi Menuju Akun Aktif')
@section('hero_desc', 'Verifikasi alamat email Anda untuk memastikan keamanan notifikasi setoran, saldo tabungan sampah, dan riwayat penarikan dana.')

@push('styles')
<style>
    .verify-email-badge {
        background-color: var(--primary-light);
        border: 1.5px solid var(--primary-border);
        border-radius: 12px;
        padding: 10px 16px;
        color: #15803d;
        font-weight: 700;
        font-size: 14px;
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 24px;
        word-break: break-all;
    }
    .verify-steps-box {
        background-color: var(--slate-50);
        border: 1px solid var(--slate-200);
        border-radius: 14px;
        padding: 18px 20px;
        margin-bottom: 24px;
    }
    .verify-steps-title {
        font-size: 13px;
        font-weight: 700;
        color: var(--slate-700);
        margin-bottom: 12px;
        display: flex;
        align-items: center;
        gap: 6px;
    }
    .verify-step-item {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        margin-bottom: 10px;
        font-size: 13px;
        color: var(--slate-600);
    }
    .verify-step-item:last-child {
        margin-bottom: 0;
    }
    .verify-step-num {
        width: 22px;
        height: 22px;
        border-radius: 50%;
        background-color: var(--primary);
        color: #ffffff;
        font-size: 11px;
        font-weight: 700;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        margin-top: 1px;
    }
    .countdown-note {
        font-size: 12.5px;
        color: var(--slate-500);
        text-align: center;
        margin-top: 12px;
    }
</style>
@endpush

@section('content')
<div class="auth-header">
    <div class="auth-badge-icon">
        <i class="bi bi-envelope-check-fill"></i>
    </div>
    <h3 class="auth-title">Verifikasi Email Anda</h3>
    <p class="auth-subtitle">Link verifikasi telah dikirim ke alamat email berikut:</p>
</div>

<div class="verify-email-badge">
    <i class="bi bi-envelope-fill fs-5"></i>
    <span>{{ auth()->user()->email ?? 'email@domain.com' }}</span>
</div>

@if (session('resent'))
    <div class="alert alert-success mb-4">
        <i class="bi bi-check-circle-fill fs-5"></i>
        <div>
            <strong>Email berhasil dikirim!</strong> Silakan periksa inbox atau folder spam email Anda.
        </div>
    </div>
@endif

@if (session('resend_error'))
    <div class="alert alert-warning mb-4">
        <i class="bi bi-exclamation-triangle-fill fs-5"></i>
        <div>{{ session('resend_error') }}</div>
    </div>
@endif

{{-- Langkah Verifikasi --}}
<div class="verify-steps-box">
    <div class="verify-steps-title">
        <i class="bi bi-list-check text-success"></i>
        <span>Panduan Cara Verifikasi:</span>
    </div>
    <div class="verify-step-item">
        <span class="verify-step-num">1</span>
        <span>Buka aplikasi email Anda (Gmail, Yahoo, Outlook, dll.).</span>
    </div>
    <div class="verify-step-item">
        <span class="verify-step-num">2</span>
        <span>Cari pesan dari <strong>Bank Sampah RW 042</strong>.</span>
    </div>
    <div class="verify-step-item">
        <span class="verify-step-num">3</span>
        <span>Klik tombol <strong>"Verify Email Address"</strong> pada email.</span>
    </div>
    <div class="verify-step-item">
        <span class="verify-step-num">4</span>
        <span>Akun Anda langsung aktif dan diarahkan ke dashboard.</span>
    </div>
</div>

{{-- Tombol Kirim Ulang --}}
<form method="POST" action="{{ route('verification.resend') }}" id="resend-form">
    @csrf
    <button type="submit" class="btn-primary-action mb-2" id="resend-btn">
        <i class="bi bi-send-fill"></i>
        <span id="btn-text">Kirim Ulang Email Verifikasi</span>
    </button>
</form>

<div id="countdown-wrap" class="countdown-note d-none">
    <i class="bi bi-clock me-1"></i>
    Kirim ulang dapat dilakukan dalam <strong id="countdown" class="text-success">60</strong> detik
</div>

<div class="auth-divider">atau</div>

<div class="auth-switch-text">
    Salah alamat email?
    <a href="{{ route('logout') }}"
       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        Keluar dan daftar ulang
    </a>
</div>
<form method="POST" action="{{ route('logout') }}" id="logout-form" class="d-none">@csrf</form>
@endsection

@push('scripts')
<script>
const resendForm = document.getElementById('resend-form');
const resendBtn  = document.getElementById('resend-btn');
const btnText    = document.getElementById('btn-text');
const countdownWrap = document.getElementById('countdown-wrap');
const countdownEl   = document.getElementById('countdown');

@if(session('resent'))
    startCooldown();
@endif

if (resendForm) {
    resendForm.addEventListener('submit', function() {
        if (resendBtn) {
            resendBtn.disabled = true;
            if (btnText) btnText.textContent = 'Sedang Mengirim...';
        }
    });
}

function startCooldown() {
    if (!resendBtn || !countdownWrap || !countdownEl) return;
    resendBtn.disabled = true;
    countdownWrap.classList.remove('d-none');
    let secs = 60;
    countdownEl.textContent = secs;

    const timer = setInterval(() => {
        secs--;
        countdownEl.textContent = secs;
        if (secs <= 0) {
            clearInterval(timer);
            resendBtn.disabled = false;
            btnText.textContent = 'Kirim Ulang Email Verifikasi';
            countdownWrap.classList.add('d-none');
        }
    }, 1000);
}
</script>
@endpush
