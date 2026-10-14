<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $artikel->judul }} – Bank Sampah RW 042</title>
    <meta name="description" content="{{ $artikel->ringkasan ?: Str::limit(strip_tags($artikel->konten), 160) }}">
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">

    <!-- Google Fonts & Bootstrap 5 + Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root {
            --primary: #16a34a;
            --primary-dark: #15803d;
            --dark: #0f172a;
            --slate: #334155;
            --muted: #64748b;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: var(--slate);
            background-color: #f8fafc;
            line-height: 1.7;
        }

        .navbar-custom {
            background: #0f172a;
            padding: 14px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 12px;
            color: #ffffff;
            font-weight: 700;
            font-size: 1.05rem;
            text-decoration: none;
        }

        .navbar-brand img {
            width: 38px;
            height: 38px;
            border-radius: 8px;
            object-fit: contain;
        }

        .article-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 4px 16px rgba(0,0,0,0.03);
            margin-bottom: 30px;
        }

        .article-title {
            font-size: clamp(1.8rem, 3.5vw, 2.5rem);
            font-weight: 800;
            color: var(--dark);
            line-height: 1.25;
            margin-bottom: 18px;
        }

        .article-meta {
            display: flex;
            align-items: center;
            gap: 16px;
            color: var(--muted);
            font-size: 0.9rem;
            margin-bottom: 24px;
            padding-bottom: 20px;
            border-bottom: 1px solid #e2e8f0;
            flex-wrap: wrap;
        }

        .article-img {
            width: 100%;
            max-height: 480px;
            object-fit: cover;
            border-radius: 14px;
            margin-bottom: 30px;
        }

        .article-body {
            font-size: 1.05rem;
            color: #1e293b;
            line-height: 1.8;
            white-space: pre-line;
        }

        .sidebar-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 24px;
            margin-bottom: 24px;
        }

        footer {
            background: var(--dark);
            color: #94a3b8;
            padding: 40px 0;
            margin-top: 60px;
        }
    </style>
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-dark navbar-custom">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('images/logo.png') }}" alt="Logo">
                <div>
                    <div>Bank Sampah RW 042</div>
                    <small style="font-size: 11px; font-weight: normal; color: #94a3b8; display: block; line-height: 1;">Kelurahan Bahagia, Bekasi</small>
                </div>
            </a>
            <div>
                <a href="{{ url('/') }}#publikasi" class="btn btn-sm btn-outline-light" style="border-radius: 8px; font-weight: 600;">
                    <i class="bi bi-arrow-left me-1"></i> Kembali ke Beranda
                </a>
            </div>
        </div>
    </nav>

    <!-- CONTENT -->
    <div class="container py-5">
        <div class="row g-4">
            <!-- Kolom Artikel Utama -->
            <div class="col-lg-8">
                <div class="article-card">
                    <a href="{{ url('/') }}#publikasi" class="text-decoration-none d-inline-flex align-items-center gap-1 mb-3" style="color: var(--primary); font-size: 0.9rem; font-weight: 600;">
                        <i class="bi bi-arrow-left"></i> Kembali ke Publikasi
                    </a>

                    <h1 class="article-title">{{ $artikel->judul }}</h1>

                    <div class="article-meta">
                        <span><i class="bi bi-calendar3 me-1 text-primary"></i> {{ $artikel->created_at->format('d F Y, H:i') }} WIB</span>
                        @if($artikel->user)
                            <span><i class="bi bi-person me-1 text-primary"></i> Oleh {{ $artikel->user->name }}</span>
                        @endif
                        <span class="badge bg-success-subtle text-success px-2 py-1" style="font-size: 11px;">Informasi Resmi</span>
                    </div>

                    @if($artikel->gambar_url)
                        <img src="{{ $artikel->gambar_url }}" alt="{{ $artikel->judul }}" class="article-img">
                    @endif

                    @if($artikel->ringkasan)
                        <div class="p-3 mb-4 rounded-3" style="background: #f1f5f9; border-left: 4px solid var(--primary); font-style: italic; color: #475569;">
                            {{ $artikel->ringkasan }}
                        </div>
                    @endif

                    <div class="article-body">
                        {!! nl2br(e($artikel->konten)) !!}
                    </div>

                    <div class="mt-5 pt-4 border-top d-flex justify-content-between align-items-center flex-wrap gap-2">
                        <span class="text-muted" style="font-size: 0.85rem;">Bagikan informasi ini kepada warga sekitar.</span>
                        <a href="https://api.whatsapp.com/send?text={{ urlencode($artikel->judul . ' - ' . url()->current()) }}"
                           target="_blank"
                           class="btn btn-sm text-white"
                           style="background: #25d366; border-radius: 8px; font-weight: 600;">
                            <i class="bi bi-whatsapp me-1"></i> Bagikan ke WhatsApp
                        </a>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- Helpdesk Mini Card -->
                <div class="sidebar-card">
                    <h6 style="font-weight: 700; color: var(--dark); margin-bottom: 12px;">
                        <i class="bi bi-headset text-primary me-2"></i>Butuh Bantuan?
                    </h6>
                    <p style="color: var(--muted); font-size: 0.88rem; margin-bottom: 14px;">
                        Hubungi Helpdesk Bank Sampah RW 042 untuk pertanyaan seputar kegiatan ini:
                    </p>
                    <div style="font-size: 0.95rem; font-weight: 700; color: var(--dark);">
                        Rama (Admin)
                    </div>
                    <div style="color: #64748b; font-size: 0.9rem; margin-bottom: 16px;">
                        0858-1404-8311
                    </div>
                    <a href="https://wa.me/6285814048311?text=Halo%20Admin%20Rama,%20saya%20ingin%20bertanya%20mengenai%20publikasi:%20{{ urlencode($artikel->judul) }}"
                       target="_blank" class="btn btn-sm w-100 text-white"
                       style="background: #25d366; border-radius: 8px; font-weight: 700; padding: 9px;">
                        <i class="bi bi-whatsapp me-1"></i> Chat WhatsApp
                    </a>
                </div>

                <!-- Informasi Lainnya -->
                @if($latest->count() > 0)
                    <div class="sidebar-card">
                        <h6 style="font-weight: 700; color: var(--dark); margin-bottom: 16px;">
                            <i class="bi bi-newspaper text-primary me-2"></i>Publikasi Lainnya
                        </h6>
                        <div class="d-flex flex-column gap-3">
                            @foreach($latest as $item)
                                <div class="d-flex gap-3 align-items-start pb-2 border-bottom">
                                    @if($item->gambar_url)
                                        <img src="{{ $item->gambar_url }}" alt="{{ $item->judul }}" style="width: 60px; height: 50px; object-fit: cover; border-radius: 6px; flex-shrink: 0;">
                                    @else
                                        <div style="width: 60px; height: 50px; background: #e2e8f0; border-radius: 6px; display: flex; align-items: center; justify-content: center; color: #94a3b8; flex-shrink: 0;">
                                            <i class="bi bi-image"></i>
                                        </div>
                                    @endif
                                    <div>
                                        <a href="{{ route('publikasi.show', $item->slug) }}" class="text-decoration-none" style="font-size: 0.88rem; font-weight: 700; color: var(--dark); line-height: 1.3; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                            {{ $item->judul }}
                                        </a>
                                        <small style="color: var(--muted); font-size: 0.75rem;">{{ $item->created_at->format('d M Y') }}</small>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <footer>
        <div class="container text-center">
            <p style="font-size: 0.85rem; margin: 0; color: #64748b;">
                &copy; {{ date('Y') }} Bank Sampah RW 042 Kelurahan Bahagia, Bekasi. Seluruh hak cipta dilindungi.
            </p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
