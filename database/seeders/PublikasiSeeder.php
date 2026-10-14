<?php

namespace Database\Seeders;

use App\Models\Publikasi;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PublikasiSeeder extends Seeder
{
    public function run(): void
    {
        $superAdmin = User::where('role', 'super_admin')->first();

        $samples = [
            [
                'judul' => 'Jadwal Penimbangan Rutin dan Edukasi Pemilahan Sampah Bulan Ini',
                'ringkasan' => 'Diberitahukan kepada seluruh warga RW 042 bahwa kegiatan penimbangan sampah anorganik akan dilaksanakan pada hari Minggu ke-1.',
                'konten' => "Salam sejahtera bagi seluruh warga RW 042 Kelurahan Bahagia,\n\nKami menginformasikan bahwa penimbangan rutin sampah anorganik akan diselenggarakan pada:\n• Hari/Tanggal: Minggu ke-1 setiap bulan\n• Waktu: Pukul 08.00 - 12.00 WIB\n• Lokasi: Posko Bank Sampah RW 042\n\nJenis sampah yang diterima meliputi botol dan gelas plastik, kardus/karton, kertas arsip, kaleng, serta minyak jelantah. Mohon sampah disetor dalam kondisi bersih dan kering agar mempermudah proses penimbangan.\n\nMari bersama menjaga kebersihan lingkungan sekaligus menabung untuk masa depan!",
                'status' => 'published',
                'user_id' => $superAdmin?->id,
            ],
            [
                'judul' => 'Panduan Memilah Sampah dari Rumah Tangga agar Bernilai Jual Maksimal',
                'ringkasan' => 'Pelajari langkah praktis memisahkan sampah plastik, karton, dan logam agar harga setoran sampah Anda optimal saat ditimbang.',
                'konten' => "Memilah sampah bukan hanya menyelamatkan bumi, tetapi juga memberikan nilai ekonomi nyata bagi keluarga kita.\n\nBerikut 3 tips penting saat memilah sampah di rumah:\n1. Pisahkan berdasarkan jenis: Kelompokkan botol plastik PET (bening), kardus/duplek, dan kaleng logam ke kantong terpisah.\n2. Bersihkan sisa kotoran: Bilas botol atau kaleng bekas minuman agar tidak berbau dan mengundang lalat.\n3. Tekan atau lipat: Pipihkan kardus dan kemasan botol plastik untuk menghemat ruang penyimpanan di rumah.\n\nDengan memilah sampah secara tepat, Anda turut membantu efisiensi petugas dan menjaga nilai timbangan tetap optimal.",
                'status' => 'published',
                'user_id' => $superAdmin?->id,
            ],
        ];

        foreach ($samples as $sample) {
            Publikasi::firstOrCreate(
                ['judul' => $sample['judul']],
                [
                    'slug' => Str::slug($sample['judul']),
                    'ringkasan' => $sample['ringkasan'],
                    'konten' => $sample['konten'],
                    'status' => $sample['status'],
                    'user_id' => $sample['user_id'],
                ]
            );
        }
    }
}
