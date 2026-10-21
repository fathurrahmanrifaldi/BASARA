<?php
namespace Database\Seeders;

use App\Models\{User, KategoriSampah};
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder {
    public function run(): void {

        // 1. Buat akun Super Admin (Ketua RW)
        User::firstOrCreate(
            ['email' => 'ketuarw@basara.test'],
            [
                'name'              => 'Ketua',
                'password'          => Hash::make('password'),
                'role'              => 'super_admin',
                'status'            => 'aktif',
                'email_verified_at' => now(),
            ]
        );

        // 2. Buat akun Petugas Lapangan (Admin / Staf)
        User::firstOrCreate(
            ['email' => 'admin@basara.test'],
            [
                'name'              => 'Admin',
                'password'          => Hash::make('password'),
                'role'              => 'admin',
                'status'            => 'aktif',
                'email_verified_at' => now(),
            ]
        );

        User::firstOrCreate(
            ['email' => 'staf@basara.test'],
            [
                'name'              => 'Staf Lapangan',
                'password'          => Hash::make('password'),
                'role'              => 'admin',
                'status'            => 'aktif',
                'email_verified_at' => now(),
            ]
        );
    }
}