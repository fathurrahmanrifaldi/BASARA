@extends('layouts.nasabah')
@section('title','Dashboard Saya')

@section('content')
@php
  $penarikanMenunggu = $nasabah->penarikanDana()->where('status','menunggu')->first();
  $btn = 'display:flex;align-items:center;justify-content:center;gap:6px;border-radius:12px;font-size:13px;font-weight:600;padding:11px 12px;text-decoration:none;';
@endphp

<!-- Saldo -->
<div class="saldo-card mb-3">
  <div style="font-size:13px;opacity:.85">Halo, {{ \Illuminate\Support\Str::words($nasabah->user->name, 2, '') }} 👋</div>
  <div style="font-size:12px;opacity:.7;margin-top:14px">Saldo Tabungan Sampah</div>
  <div style="font-size:clamp(30px,9vw,40px);font-weight:800;letter-spacing:-1px;line-height:1.1">
    Rp {{ number_format($nasabah->saldo, 0, ',', '.') }}
  </div>
  <div style="font-size:11px;opacity:.6;margin-top:8px">Diperbarui {{ now()->format('d M Y, H:i') }}</div>
  <div class="d-flex gap-2 mt-3">
    @if($penarikanMenunggu)
      <a href="{{ route('nasabah.penarikan.index') }}" class="flex-fill" style="{{ $btn }}background:rgba(255,255,255,.2);color:#fff;border:1px solid rgba(255,255,255,.3)">
        <i class="bi bi-hourglass-split"></i> Menunggu Rp {{ number_format($penarikanMenunggu->jumlah, 0, ',', '.') }}
      </a>
    @else
      <a href="{{ route('nasabah.penarikan.create') }}" class="flex-fill" style="{{ $btn }}background:#fff;color:#166534">
        <i class="bi bi-cash-stack"></i> Ajukan Penarikan
      </a>
    @endif
    <a href="{{ route('nasabah.penarikan.index') }}" style="{{ $btn }}background:rgba(255,255,255,.15);color:#fff" aria-label="Riwayat penarikan">
      <i class="bi bi-receipt"></i> Riwayat
    </a>
  </div>
</div>

<!-- Stat -->
<div class="row g-2 mb-4">
  @foreach([
    ['bi-arrow-repeat','#dcfce7','#16a34a',$totalTransaksi,'Setoran'],
    ['bi-speedometer2','#dbeafe','#2563eb',number_format($totalBerat,1).' kg','Total Berat'],
    ['bi-trophy','#fef3c7','#d97706',$ranking ? '#'.$ranking : '-','Rank Bulan Ini'],
  ] as [$ic,$bg,$fg,$val,$lbl])
  <div class="col-4">
    <div class="stat-card text-center h-100" style="padding:14px 6px">
      <div style="width:38px;height:38px;border-radius:12px;background:{{ $bg }};color:{{ $fg }};display:grid;place-items:center;margin:0 auto 8px;font-size:18px"><i class="bi {{ $ic }}"></i></div>
      <div style="font-size:clamp(14px,4.2vw,20px);font-weight:700">{{ $val }}</div>
      <div style="font-size:11px;color:#64748b">{{ $lbl }}</div>
    </div>
  </div>
  @endforeach
</div>

<!-- Setoran terakhir -->
<div class="d-flex justify-content-between align-items-center mb-2 px-1">
  <span style="font-size:15px;font-weight:700">Setoran Terakhir</span>
  <a href="{{ route('nasabah.riwayat') }}" style="font-size:12px;color:#16a34a;text-decoration:none">Lihat semua →</a>
</div>
<div class="d-grid gap-2">
  @forelse($transaksiTerbaru as $t)
  <div class="stat-card" style="padding:14px">
    <div class="d-flex justify-content-between align-items-start gap-2">
      <div style="font-size:12px;color:#64748b"><i class="bi bi-calendar3 me-1"></i>{{ $t->tanggal->format('d M Y') }}</div>
      <div style="font-weight:700;color:#16a34a;font-size:15px;white-space:nowrap">+ Rp {{ number_format($t->total_nilai, 0, ',', '.') }}</div>
    </div>
    <div class="mt-2 d-flex flex-wrap gap-1">
      @foreach($t->detail as $d)
        <span class="badge" style="background:#dcfce7;color:#15803d;font-size:11px;font-weight:500">
          {{ $d->kategori->nama_kategori }} · {{ number_format($d->berat_kg,2) }}kg
        </span>
      @endforeach
    </div>
  </div>
  @empty
  <div class="stat-card text-center text-muted" style="padding:28px">
    <i class="bi bi-recycle" style="font-size:28px;color:#86efac"></i>
    <div class="mt-1" style="font-size:13px">Belum ada setoran.</div>
  </div>
  @endforelse
</div>
@endsection
