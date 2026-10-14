<?php

namespace App\Http\Controllers;

use App\Models\Publikasi;
use App\Models\Nasabah;
use App\Models\KategoriSampah;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $publikasi = Publikasi::published()->latest()->take(3)->get();
        $totalNasabah = Nasabah::count();
        $totalKategori = KategoriSampah::count();

        return view('landing', compact('publikasi', 'totalNasabah', 'totalKategori'));
    }

    public function show(string $slug)
    {
        $artikel = Publikasi::where('slug', $slug)
            ->published()
            ->firstOrFail();

        $latest = Publikasi::published()
            ->where('id', '!=', $artikel->id)
            ->latest()
            ->take(3)
            ->get();

        return view('publikasi.show', compact('artikel', 'latest'));
    }
}
