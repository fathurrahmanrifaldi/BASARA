@extends('layouts.super-admin')
@section('title', isset($publikasi) ? 'Edit Publikasi' : 'Tambah Publikasi')
@section('page-title', isset($publikasi) ? 'Edit Publikasi' : 'Tambah Publikasi')

@section('content')

<div class="row justify-content-center">
  <div class="col-lg-9">

    <div class="mb-4">
      <a href="{{ route('super-admin.publikasi.index') }}"
         style="color:#64748b;text-decoration:none;font-size:13px">
        <i class="bi bi-arrow-left me-1"></i>Kembali ke Daftar Publikasi
      </a>
    </div>

    <div class="table-card">
      <div class="card-header">
        <h6>
          <i class="bi bi-newspaper me-2" style="color:#4f46e5"></i>
          {{ isset($publikasi) ? 'Edit Publikasi: ' . $publikasi->judul : 'Tambah Publikasi Baru' }}
        </h6>
      </div>
      <div style="padding:24px">

        @if($errors->any())
          <div class="alert alert-danger mb-4" style="border-radius:12px;font-size:13.5px">
            <strong class="d-block mb-1"><i class="bi bi-exclamation-triangle-fill me-1"></i>Terdapat kesalahan pengisian:</strong>
            <ul class="mb-0 ps-3">
              @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
            </ul>
          </div>
        @endif

        <form method="POST"
              enctype="multipart/form-data"
              action="{{ isset($publikasi) ? route('super-admin.publikasi.update', $publikasi) : route('super-admin.publikasi.store') }}">
          @csrf
          @if(isset($publikasi)) @method('PUT') @endif

          <div class="mb-4">
            <label class="form-label" style="font-weight:600;font-size:13px;color:#374151">
              Judul Publikasi / Informasi <span style="color:#ef4444">*</span>
            </label>
            <input type="text" name="judul" id="judul"
                   value="{{ old('judul', $publikasi->judul ?? '') }}"
                   class="form-control @error('judul') is-invalid @enderror"
                   placeholder="Contoh: Jadwal Penimbangan Rutin dan Sosialisasi Pemilahan Sampah"
                   style="border-radius:10px;border-color:#e2e8f0;font-size:14px;padding:10px 14px"
                   required>
            @error('judul')<div class="invalid-feedback">{{ $message }}</div>@enderror
          </div>

          <div class="mb-4">
            <label class="form-label" style="font-weight:600;font-size:13px;color:#374151">
              Ringkasan Singkat <span style="color:#94a3b8;font-weight:normal">(Muncul pada kartu landing page, maks 500 karakter)</span>
            </label>
            <textarea name="ringkasan" id="ringkasan" rows="2"
                      class="form-control @error('ringkasan') is-invalid @enderror"
                      placeholder="Ringkasan 1-2 kalimat mengenai pengumuman atau artikel ini..."
                      style="border-radius:10px;border-color:#e2e8f0;font-size:13.5px;padding:10px 14px">{{ old('ringkasan', $publikasi->ringkasan ?? '') }}</textarea>
            @error('ringkasan')<div class="invalid-feedback">{{ $message }}</div>@enderror
          </div>

          <div class="row mb-4">
            <div class="col-md-6 mb-3 mb-md-0">
              <label class="form-label" style="font-weight:600;font-size:13px;color:#374151">
                Gambar Sampul / Banner <span style="color:#94a3b8;font-weight:normal">(Maks: 2MB, jpg/png/webp)</span>
              </label>
              <input type="file" name="gambar" id="gambar" accept="image/*"
                     class="form-control @error('gambar') is-invalid @enderror"
                     style="border-radius:10px;border-color:#e2e8f0;font-size:13.5px;padding:9px 12px">
              @error('gambar')<div class="invalid-feedback">{{ $message }}</div>@enderror

              @if(isset($publikasi) && $publikasi->gambar_url)
                <div class="mt-2 d-flex align-items-center gap-2">
                  <img src="{{ $publikasi->gambar_url }}" alt="Preview" style="height:60px;width:90px;object-fit:cover;border-radius:6px;border:1px solid #cbd5e1">
                  <small style="color:#64748b;font-size:11.5px">Gambar saat ini. Unggah baru jika ingin mengganti.</small>
                </div>
              @endif
            </div>

            <div class="col-md-6">
              <label class="form-label" style="font-weight:600;font-size:13px;color:#374151">
                Status Publikasi <span style="color:#ef4444">*</span>
              </label>
              <select name="status" id="status"
                      class="form-select @error('status') is-invalid @enderror"
                      style="border-radius:10px;border-color:#e2e8f0;font-size:13.5px;padding:10px 14px">
                <option value="published" {{ old('status', $publikasi->status ?? 'published') === 'published' ? 'selected' : '' }}>
                  ✅ Published (Tampilkan di Landing Page)
                </option>
                <option value="draft" {{ old('status', $publikasi->status ?? '') === 'draft' ? 'selected' : '' }}>
                  📝 Draft (Hanya tersimpan di panel admin)
                </option>
              </select>
              @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
          </div>

          <div class="mb-5">
            <label class="form-label" style="font-weight:600;font-size:13px;color:#374151">
              Isi Konten Lengkap <span style="color:#ef4444">*</span>
            </label>
            <textarea name="konten" id="konten" rows="12"
                      class="form-control @error('konten') is-invalid @enderror"
                      placeholder="Tuliskan isi berita, informasi, atau pengumuman secara lengkap di sini. Anda dapat memisahkan paragraf dengan baris baru."
                      style="border-radius:10px;border-color:#e2e8f0;font-size:14px;padding:14px;line-height:1.6"
                      required>{{ old('konten', $publikasi->konten ?? '') }}</textarea>
            @error('konten')<div class="invalid-feedback">{{ $message }}</div>@enderror
          </div>

          <div class="d-flex gap-2">
            <button type="submit" class="btn"
                    style="background:linear-gradient(135deg,#4f46e5,#7c3aed);color:#fff;
                           font-weight:700;border:none;padding:10px 28px;border-radius:10px;
                           box-shadow:0 4px 12px rgba(79,70,229,.35)">
              <i class="bi bi-check2-circle me-2"></i>{{ isset($publikasi) ? 'Simpan Perubahan' : 'Terbitkan Publikasi' }}
            </button>
            <a href="{{ route('super-admin.publikasi.index') }}"
               class="btn" style="background:#f1f5f9;color:#475569;font-weight:600;border:none;
                                  padding:10px 20px;border-radius:10px">
              Batal
            </a>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>

@endsection
