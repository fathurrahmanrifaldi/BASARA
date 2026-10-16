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
                'password'          => Hash::make('password42'),
                'role'              => 'super_admin',
                'email_verified_at' => now(),
            ],
            ['email' => 'admin@basara.test'],
            [
                'name'              => 'Admin',
                'password'          => Hash::make('password'),
                'role'              => 'admin',
                'email_verified_at' => now(),
            ]
        );
    }
}