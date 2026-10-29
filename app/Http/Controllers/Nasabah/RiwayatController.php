<?php
namespace App\Http\Controllers\Nasabah;

use App\Http\Controllers\Controller;
use App\Models\Nasabah;

class RiwayatController extends Controller
{
    public function index()
    {
        $nasabah = auth()->user()->nasabah ?? Nasabah::firstOrCreate(
            ['user_id' => auth()->id()],
            ['saldo' => 0]
        );

        $transaksi = $nasabah->transaksi()
            ->with('detail.kategori')
            ->latest('tanggal')
            ->paginate(15);

        return view('nasabah.riwayat.index', compact('transaksi'));
    }
}
