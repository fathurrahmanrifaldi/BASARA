@extends('layouts.admin')
@section('title','Data Nasabah')
@section('page-title','Data Nasabah')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <div>
    <p class="text-muted mb-0" style="font-size:13px">
      Total {{ $nasabah->total() }} nasabah terdaftar
    </p>
  </div>
  <a href="{{ route('admin.nasabah.create') }}" class="btn btn-sm"
     style="background:#16a34a;color:#fff;border-radius:8px">
    <i class="bi bi-plus-lg me-1"></i>Tambah Nasabah
  </a>
</div>

<div class="table-card">
  <div class="card-header">
    <h6>Daftar Nasabah</h6>
    <form class="d-flex gap-2">
      <input type="text" name="q" value="{{ request('q') }}"
             class="form-control form-control-sm" placeholder="Cari nama..."
             style="border-radius:8px;width:220px">
      <button class="btn btn-sm" style="background:#f1f5f9">
        <i class="bi bi-search"></i>
      </button>
    </form>
  </div>
  <div class="table-responsive">
    <table class="table mb-0">
      <thead>
        <tr>
          <th>#</th>
          <th>Nama</th>
          <!-- <th>No. HP</th> -->
          <th>Saldo</th>
          <th>Bergabung</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse($nasabah as $n)
        <tr>
          <td style="color:#94a3b8;font-size:12px">{{ $loop->iteration }}</td>
          <td>
            <div style="font-weight:600;font-size:13px">{{ $n->user->name }}</div>
            <div style="font-size:11px;color:#94a3b8">{{ $n->user->email }}</div>
          </td>
          <!-- <td style="font-size:13px">{{ $n->no_hp }}</td> -->
          <td>
            <span style="font-weight:600;color:#16a34a;font-size:13px">
              Rp {{ number_format($n->saldo, 0, ',', '.') }}
            </span>
          </td>
          <td style="font-size:12px;color:#64748b">{{ $n->created_at->format('d M Y') }}</td>
          <td>
            <div class="d-flex gap-1">
              <a href="{{ route('admin.nasabah.edit', $n) }}"
                 class="btn btn-sm" style="background:#dbeafe;color:#1d4ed8;border-radius:7px">
                <i class="bi bi-pencil"></i>
              </a>
              <form method="POST" action="{{ route('admin.nasabah.destroy', $n) }}"
                    onsubmit="return confirm('Hapus nasabah {{ $n->user->name }}?')">
                @csrf @method('DELETE')
                <button type="submit" class="btn btn-sm"
                        style="background:#fee2e2;color:#dc2626;border-radius:7px">
                  <i class="bi bi-trash"></i>
                </button>
              </form>
            </div>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="5" class="text-center text-muted py-4">
            Belum ada data nasabah.
            <a href="{{ route('admin.nasabah.create') }}">Tambah sekarang</a>
          </td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
  @if($nasabah->hasPages())
    <div class="d-flex align-items-center justify-content-between px-3 py-2" style="border-top:1px solid #f1f5f9">
      <div style="font-size:12px;color:#94a3b8">
        Menampilkan {{ $nasabah->firstItem() }}–{{ $nasabah->lastItem() }} dari {{ $nasabah->total() }} nasabah
      </div>
      <div class="d-flex gap-1 align-items-center">
        {{-- Prev --}}
        @if($nasabah->onFirstPage())
          <span class="btn btn-sm disabled" style="background:#f1f5f9;color:#cbd5e1;border-radius:7px;font-size:12px">
            <i class="bi bi-chevron-left"></i>
          </span>
        @else
          <a href="{{ $nasabah->previousPageUrl() }}" class="btn btn-sm" style="background:#f1f5f9;color:#374151;border-radius:7px;font-size:12px">
            <i class="bi bi-chevron-left"></i>
          </a>
        @endif

        {{-- Nomor halaman --}}
        @foreach($nasabah->getUrlRange(1, $nasabah->lastPage()) as $page => $url)
          @if($page == $nasabah->currentPage())
            <span class="btn btn-sm" style="background:#16a34a;color:#fff;border-radius:7px;font-size:12px">{{ $page }}</span>
          @else
            <a href="{{ $url }}" class="btn btn-sm" style="background:#f1f5f9;color:#374151;border-radius:7px;font-size:12px">{{ $page }}</a>
          @endif
        @endforeach

        {{-- Next --}}
        @if($nasabah->hasMorePages())
          <a href="{{ $nasabah->nextPageUrl() }}" class="btn btn-sm" style="background:#f1f5f9;color:#374151;border-radius:7px;font-size:12px">
            <i class="bi bi-chevron-right"></i>
          </a>
        @else
          <span class="btn btn-sm disabled" style="background:#f1f5f9;color:#cbd5e1;border-radius:7px;font-size:12px">
            <i class="bi bi-chevron-right"></i>
          </span>
        @endif
      </div>
    </div>
  @endif
</div>
@endsection