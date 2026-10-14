<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank Sampah RW 042 – Kelurahan Bahagia, Bekasi</title>
    <meta name="description" content="Portal Resmi Bank Sampah RW 042 Kelurahan Bahagia. Solusi pengelolaan dan penabungan sampah ramah lingkungan untuk warga.">
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
            --primary-light: #dcfce7;
            --dark: #0f172a;
            --slate: #334155;
            --muted: #64748b;
            --light-bg: #f8fafc;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: var(--slate);
            background-color: #ffffff;
            line-height: 1.6;
        }

        /* ── Navbar ── */
        .navbar-custom {
            background: rgba(15, 23, 42, 0.92);
            backdrop-filter: blur(12px);
            transition: all .3s ease;
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
            width: 42px;
            height: 42px;
            border-radius: 10px;
            object-fit: contain;
        }

        .nav-link {
            color: #cbd5e1 !important;
            font-size: 0.92rem;
            font-weight: 500;
            padding: 8px 16px !important;
            transition: color .2s ease;
        }

        .nav-link:hover {
            color: #ffffff !important;
        }

        .btn-auth-login {
            background-color: #ffffff;
            color: var(--dark) !important;
            font-weight: 700;
            font-size: 0.9rem;
            padding: 8px 22px;
            border-radius: 30px;
            transition: all .2s ease;
            border: none;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .btn-auth-login:hover {
            background-color: #f1f5f9;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(255,255,255,0.2);
        }

        .btn-auth-register {
            background: var(--primary);
            color: #ffffff !important;
            font-weight: 700;
            font-size: 0.9rem;
            padding: 8px 22px;
            border-radius: 30px;
            border: 1px solid var(--primary);
            transition: all .2s ease;
            text-decoration: none;
        }

        .btn-auth-register:hover {
            background: var(--primary-dark);
            transform: translateY(-1px);
        }

        /* ── Hero Section ── */
        .hero-section {
            position: relative;
            min-height: 85vh;
            display: flex;
            align-items: center;
            background: linear-gradient(135deg, rgba(15, 23, 42, 0.82) 0%, rgba(19, 78, 38, 0.85) 100%),
                        url('{{ asset("images/hero-bg.jpg") }}') center/cover no-repeat;
            color: #ffffff;
            padding: 100px 0 80px;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 255, 255, 0.12);
            border: 1px solid rgba(255, 255, 255, 0.2);
            padding: 6px 16px;
            border-radius: 30px;
            font-size: 0.85rem;
            font-weight: 600;
            color: #86efac;
            margin-bottom: 20px;
            backdrop-filter: blur(8px);
        }

        .hero-title {
            font-size: clamp(2.4rem, 5vw, 3.8rem);
            font-weight: 800;
            letter-spacing: -0.02em;
            line-height: 1.15;
            margin-bottom: 20px;
            color: #ffffff;
        }

        .hero-subtitle {
            font-size: clamp(1rem, 2vw, 1.25rem);
            color: #e2e8f0;
            font-weight: 400;
            max-width: 650px;
            margin-bottom: 36px;
        }

        .hero-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 14px;
        }

        .btn-hero-outline {
            border: 2px solid rgba(255, 255, 255, 0.85);
            color: #ffffff;
            padding: 12px 28px;
            border-radius: 8px;
            font-weight: 700;
            font-size: 0.95rem;
            text-decoration: none;
            transition: all .25s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(4px);
        }

        .btn-hero-outline:hover {
            background: #ffffff;
            color: var(--dark);
            border-color: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.25);
        }

        .btn-hero-solid {
            background: var(--primary);
            color: #ffffff;
            border: 2px solid var(--primary);
            padding: 12px 28px;
            border-radius: 8px;
            font-weight: 700;
            font-size: 0.95rem;
            text-decoration: none;
            transition: all .25s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-hero-solid:hover {
            background: var(--primary-dark);
            border-color: var(--primary-dark);
            color: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(22, 163, 74, 0.4);
        }

        /* ── Section Titles ── */
        .section-header {
            text-align: center;
            max-width: 700px;
            margin: 0 auto 50px;
        }

        .section-tag {
            color: var(--primary);
            font-size: 0.85rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            display: inline-block;
            margin-bottom: 8px;
        }

        .section-title {
            font-size: 2.1rem;
            font-weight: 800;
            color: var(--dark);
            letter-spacing: -0.01em;
            margin-bottom: 14px;
        }

        .section-desc {
            color: var(--muted);
            font-size: 1rem;
        }

        /* ── Feature Cards (Tentang) ── */
        .about-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 36px 28px;
            height: 100%;
            transition: all .3s ease;
        }

        .about-card:hover {
            transform: translateY(-6px);
            border-color: #86efac;
            box-shadow: 0 16px 32px rgba(22, 163, 74, 0.08);
        }

        .about-icon {
            width: 58px;
            height: 58px;
            border-radius: 14px;
            background: var(--primary-light);
            color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 26px;
            margin-bottom: 22px;
        }

        .about-card h5 {
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 12px;
            font-size: 1.2rem;
        }

        .about-card p {
            color: var(--muted);
            font-size: 0.93rem;
            margin: 0;
        }

        /* ── Publication Cards ── */
        .pub-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            height: 100%;
            transition: all .3s ease;
        }

        .pub-card:hover {
            transform: translateY(-5px);
            border-color: #cbd5e1;
            box-shadow: 0 14px 28px rgba(0,0,0,0.06);
        }

        .pub-img-wrapper {
            position: relative;
            height: 200px;
            background: #f1f5f9;
            overflow: hidden;
        }

        .pub-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform .4s ease;
        }

        .pub-card:hover .pub-img {
            transform: scale(1.05);
        }

        .pub-body {
            padding: 24px;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }

        .pub-date {
            font-size: 0.8rem;
            font-weight: 600;
            color: var(--primary);
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .pub-title {
            font-size: 1.15rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 10px;
            line-height: 1.4;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .pub-desc {
            color: var(--muted);
            font-size: 0.88rem;
            margin-bottom: 20px;
            flex-grow: 1;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .pub-link {
            font-size: 0.9rem;
            font-weight: 700;
            color: var(--primary);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            margin-top: auto;
        }

        .pub-link:hover {
            color: var(--primary-dark);
            gap: 9px;
        }

        /* ── Helpdesk Section ── */
        .helpdesk-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 32px;
            height: 100%;
            display: flex;
            flex-direction: column;
            box-shadow: 0 4px 12px rgba(0,0,0,0.03);
        }

        .helpdesk-icon-box {
            width: 52px;
            height: 52px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .btn-whatsapp {
            background-color: #25d366;
            color: #ffffff !important;
            font-weight: 700;
            border-radius: 10px;
            padding: 12px 20px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: all .2s ease;
            margin-top: auto;
            border: none;
        }

        .btn-whatsapp:hover {
            background-color: #1eb956;
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(37, 211, 102, 0.35);
        }

        /* ── Footer ── */
        footer {
            background: var(--dark);
            color: #94a3b8;
            padding: 60px 0 30px;
            border-top: 1px solid #1e293b;
        }

        footer h6 {
            color: #ffffff;
            font-weight: 700;
            margin-bottom: 16px;
        }

        footer a {
            color: #94a3b8;
            text-decoration: none;
            transition: color .2s;
        }

        footer a:hover {
            color: #ffffff;
        }
    </style>
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('images/logo.png') }}" alt="Logo Bank Sampah RW 042">
                <div>
                    <div>Bank Sampah RW 042</div>
                    <small style="font-size: 11px; font-weight: normal; color: #94a3b8; display: block; line-height: 1;">Kelurahan Bahagia, Bekasi</small>
                </div>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu" aria-controls="navMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navMenu">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#beranda">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tentang">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#publikasi">Publikasi & Info</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#helpdesk">Helpdesk</a>
                    </li>
                </ul>

                <div class="d-flex align-items-center gap-2 mt-3 mt-lg-0">
                    @auth
                        <a href="{{ route('home') }}" class="btn-auth-login">
                            <i class="bi bi-speedometer2"></i> Masuk Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="btn-auth-login">
                            <i class="bi bi-box-arrow-in-right"></i> Login
                        </a>
                        <a href="{{ route('register') }}" class="btn-auth-register">
                            Daftar Nasabah
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- HERO SECTION -->
    <section id="beranda" class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="hero-badge">
                        <i class="bi bi-recycle"></i> Gerakan Lingkungan RW 042
                    </div>
                    <h1 class="hero-title">
                        E-Bank Sampah<br>RW 042 Bahagia
                    </h1>
                    <p class="hero-subtitle">
                        Program pengelolaan sampah berbasis masyarakat untuk mewujudkan lingkungan yang asri, bersih, dan berdaya guna secara ekonomi melalui tabungan sampah digital.
                    </p>
                    <div class="hero-actions">
                        @guest
                            <a href="{{ route('register') }}" class="btn-hero-outline">
                                <i class="bi bi-person-plus"></i> Pendaftaran Nasabah
                            </a>
                            <a href="{{ route('login') }}" class="btn-hero-solid">
                                <i class="bi bi-box-arrow-in-right"></i> Masuk Akun
                            </a>
                        @else
                            <a href="{{ route('home') }}" class="btn-hero-solid">
                                <i class="bi bi-speedometer2"></i> Buka Portal Dashboard
                            </a>
                            <a href="#tentang" class="btn-hero-outline">
                                <i class="bi bi-info-circle"></i> Pelajari Cara Kerja
                            </a>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- TENTANG SECTION -->
    <section id="tentang" class="py-5" style="background-color: var(--light-bg); padding-top: 80px !important; padding-bottom: 80px !important;">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">Profil & Nilai Kami</span>
                <h2 class="section-title">Solusi Pilah Sampah Jadi Tabungan Nyata</h2>
                <p class="section-desc">
                    Bank Sampah RW 042 hadir sebagai wadah warga dalam mengelola sampah anorganik rumah tangga secara transparan, mudah, dan terintegrasi sistem digital.
                </p>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="about-card">
                        <div class="about-icon">
                            <i class="bi bi-basket2"></i>
                        </div>
                        <h5>1. Pilah dari Rumah</h5>
                        <p>
                            Pisahkan sampah kering seperti botol plastik, karton, kertas, dan kaleng dari sampah basah dapur sebelum disetorkan.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="about-card">
                        <div class="about-icon" style="background: #e0e7ff; color: #4338ca;">
                            <i class="bi bi-calculator"></i>
                        </div>
                        <h5>2. Timbang & Catat Otomatis</h5>
                        <p>
                            Bawa sampah ke posko pada jadwal penimbangan. Petugas mencatat berat timbangan dan saldo langsung masuk ke buku tabungan digital Anda.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="about-card">
                        <div class="about-icon" style="background: #fef9c3; color: #a16207;">
                            <i class="bi bi-wallet2"></i>
                        </div>
                        <h5>3. Penarikan Dana Mudah</h5>
                        <p>
                            Pantau akumulasi saldo dan riwayat transaksi lewat akun nasabah secara real-time. Ajukan penarikan dana tabungan kapan saja Anda butuhkan.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Ringkasan Statistik Singkat -->
            <div class="row g-3 mt-4 text-center">
                <div class="col-6 col-md-3">
                    <div class="p-3 bg-white rounded-3 border">
                        <div style="font-size: 1.8rem; font-weight: 800; color: var(--primary);">{{ $totalNasabah }}</div>
                        <div style="font-size: 0.85rem; color: var(--muted); font-weight: 600;">Nasabah Terdaftar</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="p-3 bg-white rounded-3 border">
                        <div style="font-size: 1.8rem; font-weight: 800; color: #4f46e5;">{{ $totalKategori }}</div>
                        <div style="font-size: 0.85rem; color: var(--muted); font-weight: 600;">Kategori Sampah</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="p-3 bg-white rounded-3 border">
                        <div style="font-size: 1.8rem; font-weight: 800; color: #0284c7;">100%</div>
                        <div style="font-size: 0.85rem; color: var(--muted); font-weight: 600;">Transparan & Digital</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="p-3 bg-white rounded-3 border">
                        <div style="font-size: 1.8rem; font-weight: 800; color: #16a34a;">RW 042</div>
                        <div style="font-size: 0.85rem; color: var(--muted); font-weight: 600;">Kelurahan Bahagia</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- PUBLIKASI / INFORMASI SECTION -->
    <section id="publikasi" class="py-5" style="padding-top: 80px !important; padding-bottom: 80px !important;">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">Publikasi & Informasi</span>
                <h2 class="section-title">Kabar & Pengumuman Terbaru</h2>
                <p class="section-desc">
                    Informasi resmi jadwal kegiatan, edukasi pemilahan sampah, dan pengumuman dari pengurus Bank Sampah RW 042.
                </p>
            </div>

            @if($publikasi->count() > 0)
                <div class="row g-4">
                    @foreach($publikasi as $item)
                        <div class="col-md-6 col-lg-4">
                            <div class="pub-card">
                                <div class="pub-img-wrapper">
                                    @if($item->gambar_url)
                                        <img src="{{ $item->gambar_url }}" alt="{{ $item->judul }}" class="pub-img">
                                    @else
                                        <div class="w-100 h-100 d-flex align-items-center justify-content-center text-secondary" style="background:#f1f5f9;">
                                            <i class="bi bi-newspaper" style="font-size: 48px; color: #cbd5e1;"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="pub-body">
                                    <div class="pub-date">
                                        <i class="bi bi-calendar3"></i> {{ $item->created_at->format('d M Y') }}
                                    </div>
                                    <h5 class="pub-title">{{ $item->judul }}</h5>
                                    <p class="pub-desc">
                                        {{ $item->ringkasan ?: Str::limit(strip_tags($item->konten), 120) }}
                                    </p>
                                    <a href="{{ route('publikasi.show', $item->slug) }}" class="pub-link">
                                        Baca Selengkapnya <i class="bi bi-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-5 px-3 bg-light rounded-4 border">
                    <i class="bi bi-megaphone" style="font-size: 42px; color: #94a3b8; display: block; margin-bottom: 12px;"></i>
                    <h5 style="color: var(--dark); font-weight: 700;">Belum Ada Informasi Publikasi</h5>
                    <p style="color: var(--muted); font-size: 0.95rem; max-width: 500px; margin: 0 auto;">
                        Informasi kegiatan dan pengumuman terbaru akan diunggah oleh pengurus RW segera. Silakan cek kembali secara berkala.
                    </p>
                </div>
            @endif
        </div>
    </section>

    <!-- HELPDESK SECTION -->
    <section id="helpdesk" class="py-5" style="background-color: var(--light-bg); padding-top: 80px !important; padding-bottom: 80px !important;">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">Pusat Bantuan</span>
                <h2 class="section-title">Informasi Helpdesk & Layanan</h2>
                <p class="section-desc">
                    Pertanyaan seputar penimbangan, pendaftaran akun, atau informasi lainnya? Hubungi tim pengurus kami.
                </p>
            </div>

            <div class="row g-4 align-items-stretch">
                <!-- Kontak WhatsApp Helpdesk -->
                <div class="col-lg-4 col-md-6">
                    <div class="helpdesk-card">
                        <div class="helpdesk-icon-box" style="background: #dcfce7; color: #16a34a;">
                            <i class="bi bi-whatsapp"></i>
                        </div>
                        <h5 style="font-weight: 700; color: var(--dark); margin-bottom: 8px;">WhatsApp Helpdesk</h5>
                        <p style="color: var(--muted); font-size: 0.9rem; margin-bottom: 6px;">
                            Petugas Pelayanan / Admin:
                        </p>
                        <div style="font-weight: 700; font-size: 1.15rem; color: var(--dark); margin-bottom: 4px;">
                            Rama
                        </div>
                        <div style="color: #4b5563; font-weight: 600; font-size: 0.95rem; margin-bottom: 24px;">
                            0858-1404-8311
                        </div>
                        <a href="https://wa.me/6285814048311?text=Halo%20Admin%20Rama,%20saya%20ingin%20bertanya%20seputar%20Bank%20Sampah%20RW%20042"
                           target="_blank" rel="noopener noreferrer"
                           class="btn-whatsapp">
                            <i class="bi bi-whatsapp"></i> Chat WhatsApp Sekarang
                        </a>
                    </div>
                </div>

                <!-- Jadwal Operasional Penimbangan -->
                <div class="col-lg-4 col-md-6">
                    <div class="helpdesk-card">
                        <div class="helpdesk-icon-box" style="background: #e0e7ff; color: #4f46e5;">
                            <i class="bi bi-clock-history"></i>
                        </div>
                        <h5 style="font-weight: 700; color: var(--dark); margin-bottom: 8px;">Jadwal Penimbangan</h5>
                        <p style="color: var(--muted); font-size: 0.9rem; margin-bottom: 16px;">
                            Waktu resmi penerimaan dan penimbangan sampah nasabah di posko:
                        </p>
                        <div class="p-3 rounded-3" style="background: #f8fafc; border: 1px dashed #cbd5e1; margin-bottom: auto;">
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <i class="bi bi-calendar-check text-primary"></i>
                                <span style="font-weight: 700; color: var(--dark); font-size: 0.95rem;">Setiap Minggu ke-1</span>
                            </div>
                            <div class="d-flex align-items-center gap-2">
                                <i class="bi bi-alarm text-primary"></i>
                                <span style="font-weight: 600; color: #475569; font-size: 0.9rem;">Pukul 08:00 – 12:00 WIB</span>
                            </div>
                        </div>
                        <div class="mt-4 pt-2 border-top">
                            <small style="color: #64748b; font-size: 0.8rem; display: block;">
                                *Harap sampah telah dipilah sesuai kategori sebelum dibawa ke posko.
                            </small>
                        </div>
                    </div>
                </div>

                <!-- Lokasi Posko RW -->
                <div class="col-lg-4 col-md-12">
                    <div class="helpdesk-card">
                        <div class="helpdesk-icon-box" style="background: #fef3c7; color: #d97706;">
                            <i class="bi bi-geo-alt"></i>
                        </div>
                        <h5 style="font-weight: 700; color: var(--dark); margin-bottom: 8px;">Lokasi Posko</h5>
                        <p style="color: var(--muted); font-size: 0.9rem; margin-bottom: 16px;">
                            Sekretariat dan Tempat Pengumpulan:
                        </p>
                        <div class="p-3 rounded-3" style="background: #f8fafc; border: 1px solid #e2e8f0; margin-bottom: auto;">
                            <div style="font-weight: 700; color: var(--dark); font-size: 0.95rem; margin-bottom: 4px;">
                                Posko Bank Sampah RW 042
                            </div>
                            <div style="font-size: 0.88rem; color: #64748b; line-height: 1.5;">
                                Kelurahan Bahagia, Kecamatan Babelan,<br>
                                Kabupaten Bekasi, Jawa Barat.
                            </div>
                        </div>
                        <div class="mt-4 pt-2 border-top">
                            <a href="#beranda" class="text-decoration-none" style="font-size: 0.85rem; font-weight: 600; color: var(--primary);">
                                <i class="bi bi-arrow-up-circle me-1"></i> Kembali ke Atas
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer>
        <div class="container">
            <div class="row g-4 align-items-center">
                <div class="col-md-6 text-center text-md-start">
                    <div class="d-flex align-items-center justify-content-center justify-content-md-start gap-2 mb-2">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo" style="width: 32px; height: 32px; border-radius: 6px;">
                        <span style="font-weight: 700; color: #ffffff; font-size: 1.05rem;">Bank Sampah RW 042</span>
                    </div>
                    <p style="font-size: 0.85rem; margin: 0; color: #64748b;">
                        Kelurahan Bahagia, Kecamatan Babelan, Kabupaten Bekasi.
                    </p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <p style="font-size: 0.85rem; margin: 0; color: #64748b;">
                        &copy; {{ date('Y') }} Bank Sampah RW 042. Seluruh hak cipta dilindungi.
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
