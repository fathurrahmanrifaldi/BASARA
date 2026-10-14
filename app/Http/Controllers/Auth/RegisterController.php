<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    use RegistersUsers;

    /**
     * Setelah registrasi, redirect ke halaman "cek email".
     * User sudah login tapi perlu verifikasi email dulu.
     */
    protected $redirectTo = '/email/verify';

    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Validasi input registrasi.
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', Rule::unique('users')->whereNotNull('email_verified_at')],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'no_hp'    => ['nullable', 'string', 'max:15'],
            'alamat'   => ['nullable', 'string'],
        ], [
            'name.required'     => 'Nama lengkap wajib diisi.',
            'email.required'    => 'Alamat email wajib diisi.',
            'email.unique'      => 'Email ini sudah terdaftar dan terverifikasi. Silakan login.',
            'password.min'      => 'Password minimal 8 karakter.',
            'password.confirmed'=> 'Konfirmasi password tidak cocok.',
        ]);
    }

    /**
     * Override register: buat user, login, redirect ke halaman verifikasi email.
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        DB::beginTransaction();
        try {
            $user = $this->create($request->all());
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Terjadi kesalahan saat registrasi. Silakan coba lagi.')->withInput();
        }

        // Login user, lalu kirim email verifikasi (MustVerifyEmail otomatis)
        $this->guard()->login($user);
        $user->sendEmailVerificationNotification();

        // Redirect ke halaman "cek email kamu"
        return redirect()->route('verification.notice');
    }

    /**
     * Buat user baru — status langsung approved (tidak perlu persetujuan Admin).
     * Email verification yang menjadi gatekeeper.
     */
    protected function create(array $data)
    {
        // Jika email sudah ada tapi belum terverifikasi (lolos validasi),
        // perbarui akun tersebut alih-alih membuat baru.
        $existing = User::where('email', $data['email'])
            ->whereNull('email_verified_at')
            ->where('role', 'nasabah')
            ->first();

        $attributes = [
            'name'     => $data['name'],
            'password' => Hash::make($data['password']),
            'role'     => 'nasabah',
            'status'   => 'approved', // langsung approved, gatekeeper adalah email verification
        ];

        $nasabahData = [
            'no_hp'  => $data['no_hp'] ?? null,
            'alamat' => $data['alamat'] ?? null,
        ];

        if ($existing) {
            $existing->update($attributes);
            $existing->nasabah()->updateOrCreate(['user_id' => $existing->id], $nasabahData);
            return $existing;
        }

        $user = User::create($attributes + ['email' => $data['email']]);
        $user->nasabah()->create($nasabahData);

        return $user;
    }
}
