<?php
namespace App\Http\Controllers\Nasabah;

use App\Http\Controllers\Controller;
use App\Models\{Transaksi, DetailTransaksi, Penilaian, Nasabah};
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $nasabah = auth()->user()->nasabah ?? Nasabah::firstOrCreate(
            ['user_id' => auth()->id()],
            ['saldo' => 0]
        );
        $now     = Carbon::now();

        $totalTransaksi = $nasabah->transaksi()->count();

        $totalBerat = DetailTransaksi::whereHas('transaksi', function ($q) use ($nasabah) {
            $q->where('nasabah_id', $nasabah->id);
        })->sum('berat_kg');

        // Ranking semester ini (kolom 'bulan' sudah diganti dengan 'semester' di migrasi SAW)
        $semester = $now->month <= 6 ? 1 : 2;
        
        $penilaian = Penilaian::where('nasabah_id', $nasabah->id)
            ->where('semester', $semester)
            ->where('tahun', $now->year)
            ->first();

        $ranking = null;
        if ($penilaian) {
            $ranking = Penilaian::where('semester', $semester)
                ->where('tahun', $now->year)
                ->where('skor', '>', $penilaian->skor)
                ->count() + 1;
        }

        // 5 transaksi terbaru beserta detail
        $transaksiTerbaru = $nasabah->transaksi()
            ->with('detail.kategori')
            ->latest('tanggal')->take(5)->get();

        return view('nasabah.dashboard.index',
            compact('nasabah', 'totalTransaksi', 'totalBerat', 'ranking', 'transaksiTerbaru'));
    }
}