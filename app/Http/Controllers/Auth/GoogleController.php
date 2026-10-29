<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Nasabah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(Request $request)
    {
        try {
            $googleUser = Socialite::driver('google')->user();
        } catch (\Laravel\Socialite\Two\InvalidStateException $e) {
            try {
                $googleUser = Socialite::driver('google')->stateless()->user();
            } catch (\Exception $ex) {
                return redirect()->route('login')->with('error', 'Sesi autentikasi Google kedaluwarsa. Silakan coba lagi.');
            }
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'Gagal login menggunakan Google. Silakan coba lagi.');
        }

        if (!$googleUser || empty($googleUser->getEmail())) {
            return redirect()->route('login')->with('error', 'Tidak dapat mengambil alamat email dari akun Google.');
        }

        // Cek apakah email sudah terdaftar
        $user = User::where('email', $googleUser->getEmail())->first();

        if ($user) {
            // Cek status akun
            if ($user->status === 'nonaktif') {
                return redirect()->route('login')
                    ->with('error', 'Akun Anda telah dinonaktifkan. Hubungi Ketua RW untuk informasi lebih lanjut.');
            }

            // Update google_id jika masih kosong
            if (empty($user->google_id)) {
                $user->update(['google_id' => $googleUser->getId()]);
            }

            // Google sudah memverifikasi email — set email_verified_at jika belum ada
            if (!$user->email_verified_at) {
                $user->update(['email_verified_at' => now()]);
            }

            // Jika role nasabah tapi data profil nasabah belum ada
            if ($user->role === 'nasabah' && !$user->nasabah) {
                Nasabah::create([
                    'user_id' => $user->id,
                    'saldo'   => 0,
                    'no_hp'   => null,
                    'alamat'  => null,
                ]);
            }

            // Login user
            Auth::login($user, true);
            $request->session()->regenerate();
            session()->forget('google_registration');

            $redirectRoute = match ($user->role) {
                'super_admin' => 'super-admin.dashboard',
                'admin'       => 'admin.dashboard',
                default       => 'nasabah.dashboard',
            };

            return redirect()->route($redirectRoute)
                ->with('success', 'Selamat datang kembali, ' . $user->name . '!');
        }

        // Pengguna belum terdaftar — buat akun nasabah langsung tanpa perlu password baru
        $newUser = DB::transaction(function () use ($googleUser) {
            $name = $googleUser->getName() ?: ($googleUser->getNickname() ?: 'Nasabah Basara');

            $createdUser = User::create([
                'name'              => $name,
                'email'             => $googleUser->getEmail(),
                'password'          => Hash::make(Str::random(32)),
                'role'              => 'nasabah',
                'status'            => 'approved',
                'google_id'         => $googleUser->getId(),
                'email_verified_at' => now(), // Terverifikasi via Google
            ]);

            Nasabah::create([
                'user_id' => $createdUser->id,
                'saldo'   => 0,
                'no_hp'   => null,
                'alamat'  => null,
            ]);

            return $createdUser;
        });

        Auth::login($newUser, true);
        $request->session()->regenerate();
        session()->forget('google_registration');

        return redirect()->route('nasabah.dashboard')
            ->with('success', 'Selamat datang! Akun Anda berhasil didaftarkan dan langsung masuk via Google.');
    }
}
