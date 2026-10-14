@extends('layouts.super-admin')
@section('title', 'Kelola Publikasi')
@section('page-title', 'Kelola Publikasi & Informasi')

@section('content')

@if(session('success'))
  <div class="alert alert-success alert-dismissible fade show mb-4" role="alert" style="border-radius:12px;font-size:13.5px">
    <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

<div class="d-flex align-items-center justify-content-between mb-4 flex-wrap gap-2">
  <div>
    <h5 style="font-weight:800;color:#0f172a;margin:0">Publikasi & Informasi</h5>
    <p style="color:#64748b;font-size:13px;margin:2px 0 0">Kelola artikel, berita, dan pengumuman untuk landing page</p>
  </div>
  <a href="{{ route('super-admin.publikasi.create') }}"
     class="btn d-flex align-items-center gap-2"
     style="background:linear-gradient(135deg,#4f46e5,#7c3aed);color:#fff;font-weight:600;
            border:none;padding:9px 18px;border-radius:10px;box-shadow:0 4px 12px rgba(79,70,229,.35)">
    <i class="bi bi-plus-circle-fill"></i> Tambah Publikasi Baru
  </a>
</div>

<div class="table-card">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h6><i class="bi bi-newspaper me-2" style="color:#4f46e5"></i>Daftar Publikasi ({{ $publikasi->total() }})</h6>
  </div>
  <div class="table-responsive">
    <table class="table mb-0 align-middle">
      <thead>
        <tr>
          <th style="width:50px">#</th>
          <th style="width:80px">Gambar</th>
          <th>Judul & Ringkasan</th>
          <th>Status</th>
          <th>Tanggal Dibuat</th>
          <th class="text-center" style="width:140px">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse($publikasi as $i => $item)
        <tr>
          <td style="color:#94a3b8;font-size:13px">{{ $publikasi->firstItem() + $i }}</td>
          <td>
            @if($item->gambar_url)
              <img src="{{ $item->gambar_url }}" alt="{{ $item->judul }}" style="width:60px;height:45px;object-fit:cover;border-radius:6px;border:1px solid #e2e8f0">
            @else
              <div style="width:60px;height:45px;background:#f1f5f9;border-radius:6px;display:flex;align-items:center;justify-content:center;color:#94a3b8;font-size:18px">
                <i class="bi bi-image"></i>
              </div>
            @endif
          </td>
          <td>
            <div style="font-weight:700;font-size:14px;color:#0f172a;margin-bottom:2px">
              {{ $item->judul }}
            </div>
            <div style="font-size:12px;color:#64748b;max-width:420px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis">
              {{ $item->ringkasan ?: Str::limit(strip_tags($item->konten), 90) }}
            </div>
          </td>
          <td>
            @if($item->status === 'published')
              <span class="badge px-3 py-1" style="background:#dcfce7;color:#15803d;font-size:11px;border-radius:20px">
                <i class="bi bi-check2 me-1"></i>Published
              </span>
            @else
              <span class="badge px-3 py-1" style="background:#f1f5f9;color:#64748b;font-size:11px;border-radius:20px">
                <i class="bi bi-clock me-1"></i>Draft
              </span>
            @endif
          </td>
          <td style="font-size:12.5px;color:#64748b">
            {{ $item->created_at->format('d M Y, H:i') }}
          </td>
          <td class="text-center">
            <div class="d-flex align-items-center justify-content-center gap-1">
              @if($item->status === 'published')
                <a href="{{ route('publikasi.show', $item->slug) }}" target="_blank"
                   class="btn btn-sm" title="Lihat di Web"
                   style="background:#f0fdf4;color:#16a34a;border:1px solid #bbf7d0;border-radius:7px;padding:4px 9px">
                  <i class="bi bi-box-arrow-up-right"></i>
                </a>
              @endif
              <a href="{{ route('super-admin.publikasi.edit', $item) }}"
                 class="btn btn-sm" title="Edit"
                 style="background:#eef2ff;color:#4f46e5;border:1px solid #c7d2fe;border-radius:7px;padding:4px 9px">
                <i class="bi bi-pencil"></i>
              </a>
              <form method="POST" action="{{ route('super-admin.publikasi.destroy', $item) }}"
                    class="d-inline"
                    onsubmit="return confirm('Yakin ingin menghapus publikasi \'{{ addslashes($item->judul) }}\'?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm" title="Hapus"
                        style="background:#fef2f2;color:#dc2626;border:1px solid #fecaca;border-radius:7px;padding:4px 9px">
                  <i class="bi bi-trash"></i>
                </button>
              </form>
            </div>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="6" class="text-center py-5" style="color:#94a3b8">
            <i class="bi bi-journal-x" style="font-size:36px;display:block;margin-bottom:8px"></i>
            Belum ada publikasi yang dibuat. Klik tombol <strong>Tambah Publikasi Baru</strong> di atas untuk membuat.
          </td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  @if($publikasi->hasPages())
    <div class="p-3 border-top">
      {{ $publikasi->links() }}
    </div>
  @endif
</div>

@endsection
