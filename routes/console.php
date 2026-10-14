<?php

use App\Models\User;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

// Hapus akun nasabah yang belum verifikasi email setelah 24 jam
// (data nasabah ikut terhapus via onDelete cascade)
Schedule::call(function () {
    User::whereNull('email_verified_at')
        ->where('role', 'nasabah')
        ->whereNull('google_id')
        ->where('created_at', '<', now()->subHours(24))
        ->delete();
})->daily()->name('prune-unverified-users');
