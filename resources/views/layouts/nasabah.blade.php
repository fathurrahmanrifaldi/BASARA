<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('title','Portal Nasabah') – Bank Sampah RW 042</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
<link rel="icon" type="image" href="{{ asset('images/logo.png') }}">
<style>
:root { --green: #16a34a; --ink: #0f172a; }
body { background: #f1f5f9; font-family: 'Segoe UI', system-ui, sans-serif; color: var(--ink); }
.topnav {
  background: linear-gradient(135deg, #0f172a, #134e26);
  padding: 0 16px; height: 56px;
  display: flex; align-items: center; justify-content: space-between;
  position: sticky; top: 0; z-index: 50;
}
.brand { color: #fff; font-weight: 700; font-size: 15px; line-height: 1.2; }
.brand small { color: #86efac; font-size: 11px; display: block; font-weight: 400; }
.avatar { width: 34px; height: 34px; border-radius: 50%; background: #22c55e; color: #052e16; font-weight: 700; display: grid; place-items: center; font-size: 14px; }

/* Mobile first: bottom tab bar */
.page-body { padding: 16px 16px 92px; max-width: 860px; margin: 0 auto; }
.tabbar {
  position: fixed; bottom: 0; left: 0; right: 0; z-index: 60;
  display: flex; background: #fff; border-top: 1px solid #e2e8f0;
  padding: 6px 4px calc(6px + env(safe-area-inset-bottom));
  box-shadow: 0 -4px 20px rgba(15,23,42,.08);
}
.tabbar a {
  flex: 1; text-align: center; text-decoration: none; color: #94a3b8;
  font-size: 11px; padding: 6px 0; border-radius: 12px; position: relative;
}
.tabbar a i { display: block; font-size: 20px; line-height: 1.2; }
.tabbar a.active { color: var(--green); font-weight: 600; background: #f0fdf4; }
.tabbar .badge { position: absolute; top: 2px; left: 54%; font-size: 10px; background: #fbbf24; color: #92400e; }

.stat-card { background: #fff; border-radius: 16px; padding: 16px; border: 1px solid #e2e8f0; }
.saldo-card {
  background: linear-gradient(135deg, #16a34a, #166534);
  border-radius: 22px; padding: 22px; color: #fff; position: relative; overflow: hidden;
  box-shadow: 0 12px 28px rgba(22,163,74,.3);
}
.saldo-card::before, .saldo-card::after {
  content: ''; position: absolute; border-radius: 50%; background: rgba(255,255,255,.08);
}
.saldo-card::before { width: 170px; height: 170px; right: -50px; top: -60px; }
.saldo-card::after { width: 110px; height: 110px; right: 40px; bottom: -60px; }
.saldo-card > * { position: relative; }
.table-card { background: #fff; border-radius: 16px; border: 1px solid #e2e8f0; overflow: hidden; overflow-x: auto; }
.table thead th {
  background: #f8fafc; font-size: 11px; font-weight: 700;
  text-transform: uppercase; letter-spacing: .6px; color: #64748b; border: none;
}
.table > :not(caption) > * > * { padding: 11px 16px; }
.table tbody tr { border-color: #f1f5f9; }

/* Desktop: tabs move to the top */
@media (min-width: 768px) {
  .topnav { padding: 0 24px; }
  .page-body { padding: 24px; }
  .tabbar {
    position: static; box-shadow: none; border: none; background: none;
    padding: 0; margin-bottom: 20px; border-bottom: 1px solid #e2e8f0; border-radius: 0;
  }
  .tabbar a { flex: none; font-size: 13px; padding: 10px 16px; border-radius: 0; background: none !important; }
  .tabbar a i { display: inline; font-size: 14px; margin-right: 4px; }
  .tabbar a.active { border-bottom: 2px solid var(--green); }
  .tabbar .badge { position: static; }
}
</style>
</head>
<body>
<nav class="topnav">
  <div class="brand">
    🌿 Bank Sampah RW 042
    <small>Portal Nasabah</small>
  </div>
  @php
    $myNasabah = auth()->user()->nasabah;
    $cntMenunggu = $myNasabah ? $myNasabah->penarikanDana()->where('status','menunggu')->count() : 0;
  @endphp
  <div class="d-flex align-items-center gap-2">
    <span class="d-none d-md-inline" style="color:#86efac;font-size:13px">{{ auth()->user()->name }}</span>
    <div class="avatar d-md-none">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</div>
    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button type="submit" class="btn btn-sm" aria-label="Logout"
              style="background:rgba(255,255,255,.15);color:#fff;border:none;font-size:12px">
        <i class="bi bi-box-arrow-left"></i><span class="d-none d-md-inline ms-1">Logout</span>
      </button>
    </form>
  </div>
</nav>

<div class="page-body">
  <nav class="tabbar">
    <a class="{{ request()->routeIs('nasabah.dashboard') ? 'active' : '' }}" href="{{ route('nasabah.dashboard') }}"><i class="bi bi-house-door"></i>Beranda</a>
    <a class="{{ request()->routeIs('nasabah.riwayat') ? 'active' : '' }}" href="{{ route('nasabah.riwayat') }}"><i class="bi bi-clock-history"></i>Riwayat</a>
    <a class="{{ request()->routeIs('nasabah.penarikan.*') ? 'active' : '' }}" href="{{ route('nasabah.penarikan.index') }}"><i class="bi bi-cash-stack"></i>Penarikan
      @if($cntMenunggu > 0)<span class="badge rounded-pill">{{ $cntMenunggu }}</span>@endif
    </a>
    <a class="{{ request()->routeIs('nasabah.profil.*') ? 'active' : '' }}" href="{{ route('nasabah.profil.edit') }}"><i class="bi bi-person-circle"></i>Profil</a>
  </nav>

  @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mb-3">
      <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  @endif
  @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show mb-3">
      <i class="bi bi-exclamation-circle me-2"></i>{{ session('error') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  @endif
  @if(session('warning'))
    <div class="alert alert-warning alert-dismissible fade show mb-3">
      <i class="bi bi-exclamation-triangle me-2"></i>{{ session('warning') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  @endif
  @yield('content')
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>