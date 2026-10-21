<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Autentikasi – Bank Sampah RW 042')</title>
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
            --primary-hover: #14532d;
            --primary-light: #f0fdf4;
            --primary-border: #bbf7d0;
            --primary-ring: rgba(22, 163, 74, 0.15);
            --dark: #0f172a;
            --slate-900: #0f172a;
            --slate-800: #1e293b;
            --slate-700: #334155;
            --slate-600: #475569;
            --slate-500: #64748b;
            --slate-400: #94a3b8;
            --slate-200: #e2e8f0;
            --slate-100: #f1f5f9;
            --slate-50: #f8fafc;
            --card-shadow: 0 20px 40px -15px rgba(15, 23, 42, 0.07), 0 0 0 1px rgba(226, 232, 240, 0.8);
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            color: var(--slate-800);
            background-color: var(--slate-50);
            min-height: 100vh;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        /* ── Fullscreen Split Layout ── */
        .auth-wrapper {
            min-height: 100vh;
            display: flex;
            width: 100%;
        }

        /* ── Left Pane: Brand Showcase ── */
        .auth-brand-pane {
            position: relative;
            flex: 1.15;
            background: linear-gradient(145deg, #061712 0%, #063c26 50%, #04251a 100%);
            color: #ffffff;
            padding: 50px 60px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            overflow: hidden;
        }

        /* Ambient glow spheres */
        .auth-brand-pane::before {
            content: '';
            position: absolute;
            width: 500px;
            height: 500px;
            top: -100px;
            left: -100px;
            background: radial-gradient(circle, rgba(34, 197, 94, 0.28) 0%, transparent 65%);
            border-radius: 50%;
            pointer-events: none;
            z-index: 1;
        }

        .auth-brand-pane::after {
            content: '';
            position: absolute;
            width: 450px;
            height: 450px;
            bottom: -80px;
            right: -80px;
            background: radial-gradient(circle, rgba(16, 185, 129, 0.22) 0%, transparent 65%);
            border-radius: 50%;
            pointer-events: none;
            z-index: 1;
        }

        .auth-brand-bg-image {
            position: absolute;
            inset: 0;
            background-image: url('{{ asset("images/hero-bg.jpg") }}');
            background-size: cover;
            background-position: center;
            opacity: 0.12;
            mix-blend-mode: overlay;
            pointer-events: none;
            z-index: 0;
        }

        .auth-brand-content {
            position: relative;
            z-index: 2;
        }

        /* Brand Header */
        .auth-brand-header {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .auth-brand-logo {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(8px);
            padding: 6px;
            border: 1px solid rgba(255, 255, 255, 0.15);
            object-fit: contain;
        }

        .auth-brand-title {
            font-size: 1.15rem;
            font-weight: 700;
            letter-spacing: -0.01em;
            margin: 0;
            line-height: 1.2;
            color: #ffffff;
        }

        .auth-brand-sub {
            font-size: 0.8rem;
            color: #a7f3d0;
            margin: 0;
            font-weight: 500;
        }

        /* Brand Hero Message */
        .auth-brand-hero {
            max-width: 520px;
            margin: 40px 0;
        }

        .brand-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 6px 14px;
            background: rgba(34, 197, 94, 0.16);
            border: 1px solid rgba(74, 222, 128, 0.25);
            border-radius: 9999px;
            font-size: 0.8rem;
            font-weight: 600;
            color: #86efac;
            margin-bottom: 24px;
            backdrop-filter: blur(8px);
        }

        .brand-hero-title {
            font-size: 2.35rem;
            font-weight: 800;
            line-height: 1.22;
            letter-spacing: -0.02em;
            color: #ffffff;
            margin-bottom: 18px;
        }

        .brand-hero-desc {
            font-size: 0.98rem;
            color: #cbd5e1;
            line-height: 1.65;
            margin-bottom: 32px;
        }

        /* Feature Cards */
        .brand-feature-list {
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .brand-feature-item {
            display: flex;
            align-items: flex-start;
            gap: 14px;
            padding: 14px 18px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.09);
            border-radius: 14px;
            backdrop-filter: blur(10px);
            transition: transform .25s ease, background .25s ease;
        }

        .brand-feature-item:hover {
            transform: translateX(4px);
            background: rgba(255, 255, 255, 0.08);
        }

        .brand-feature-icon {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            background: rgba(34, 197, 94, 0.2);
            color: #4ade80;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.15rem;
            flex-shrink: 0;
        }

        .brand-feature-text h6 {
            margin: 0 0 2px 0;
            font-size: 0.92rem;
            font-weight: 700;
            color: #ffffff;
        }

        .brand-feature-text p {
            margin: 0;
            font-size: 0.8rem;
            color: #94a3b8;
            line-height: 1.4;
        }

        /* Brand Footer */
        .auth-brand-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 0.82rem;
            color: #94a3b8;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            padding-top: 20px;
        }

        .brand-pill-status {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: #86efac;
            font-weight: 600;
        }

        .status-dot {
            width: 8px;
            height: 8px;
            background-color: #22c55e;
            border-radius: 50%;
            box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.25);
            animation: pulse-dot 2s infinite;
        }

        @keyframes pulse-dot {
            0% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(34, 197, 94, 0.5); }
            70% { transform: scale(1); box-shadow: 0 0 0 6px rgba(34, 197, 94, 0); }
            100% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(34, 197, 94, 0); }
        }

        /* ── Right Pane: Form on the Right Side ── */
        .auth-form-pane {
            flex: 1;
            background-color: #ffffff;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            min-height: 100vh;
            padding: 32px 48px;
            overflow-y: auto;
        }

        /* Top Bar with Back Button */
        .auth-topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 24px;
        }

        .btn-back-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 16px;
            background: var(--slate-50);
            border: 1px solid var(--slate-200);
            border-radius: 9999px;
            color: var(--slate-700);
            font-size: 13.5px;
            font-weight: 600;
            text-decoration: none;
            transition: all .2s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .btn-back-link i {
            font-size: 14px;
            transition: transform .2s ease;
        }

        .btn-back-link:hover {
            color: var(--primary-dark);
            border-color: var(--primary-border);
            background: var(--primary-light);
            transform: translateX(-3px);
            box-shadow: 0 2px 8px rgba(22, 163, 74, 0.12);
        }

        .btn-back-link:hover i {
            transform: translateX(-3px);
        }

        .auth-mobile-logo {
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 700;
            font-size: 0.95rem;
            color: var(--dark);
        }

        .auth-mobile-logo img {
            width: 32px;
            height: 32px;
            border-radius: 8px;
        }

        /* Form Card Container (Right Pane Centering) */
        .auth-card-container {
            width: 100%;
            max-width: 460px;
            margin: auto;
            padding: 10px 0;
        }

        .auth-card-wide {
            max-width: 520px;
        }

        .auth-header {
            margin-bottom: 28px;
        }

        .auth-badge-icon {
            width: 48px;
            height: 48px;
            border-radius: 14px;
            background: linear-gradient(135deg, #16a34a, #15803d);
            color: #ffffff;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            margin-bottom: 16px;
            box-shadow: 0 8px 16px rgba(22, 163, 74, 0.25);
        }

        .auth-title {
            font-size: 1.65rem;
            font-weight: 800;
            color: var(--slate-900);
            letter-spacing: -0.02em;
            margin-bottom: 6px;
        }

        .auth-subtitle {
            font-size: 0.9rem;
            color: var(--slate-500);
            margin: 0;
            line-height: 1.5;
        }

        /* ── Modern Shadcn-Style Form Controls ── */
        .form-label {
            font-size: 13px;
            font-weight: 600;
            color: var(--slate-700);
            margin-bottom: 6px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .form-control, .input-group-text {
            border-radius: 10px;
            border: 1.5px solid var(--slate-200);
            padding: 10px 14px;
            font-size: 14px;
            color: var(--slate-800);
            background-color: #ffffff;
            transition: all .2s ease;
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 4px var(--primary-ring);
            outline: none;
        }

        .form-control::placeholder {
            color: var(--slate-400);
            font-size: 13.5px;
        }

        .input-group .form-control {
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
        }

        .input-group .btn-password-toggle {
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
            border: 1.5px solid var(--slate-200);
            border-left: none;
            background-color: #ffffff;
            color: var(--slate-500);
            padding: 0 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all .2s ease;
        }

        .input-group .btn-password-toggle:hover {
            color: var(--slate-800);
            background-color: var(--slate-50);
        }

        .form-control.is-invalid {
            border-color: #ef4444;
        }

        .form-control.is-invalid:focus {
            box-shadow: 0 0 0 4px rgba(239, 68, 68, 0.15);
        }

        /* Custom Checkbox */
        .form-check-input {
            width: 17px;
            height: 17px;
            border-radius: 5px;
            border: 1.5px solid var(--slate-300);
            margin-top: 2px;
            cursor: pointer;
        }

        .form-check-input:checked {
            background-color: var(--primary);
            border-color: var(--primary);
        }

        .form-check-input:focus {
            box-shadow: 0 0 0 3px var(--primary-ring);
        }

        .form-check-label {
            font-size: 13.5px;
            color: var(--slate-600);
            cursor: pointer;
            user-select: none;
        }

        /* Primary Action Button */
        .btn-primary-action {
            background: linear-gradient(135deg, #16a34a 0%, #15803d 100%);
            color: #ffffff;
            border: none;
            border-radius: 11px;
            padding: 12px 18px;
            font-weight: 700;
            font-size: 14.5px;
            width: 100%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: all .2s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: pointer;
            box-shadow: 0 4px 12px rgba(22, 163, 74, 0.2);
            text-decoration: none;
        }

        .btn-primary-action:hover {
            background: linear-gradient(135deg, #15803d 0%, #166534 100%);
            color: #ffffff;
            transform: translateY(-1.5px);
            box-shadow: 0 6px 16px rgba(22, 163, 74, 0.28);
        }

        .btn-primary-action:active {
            transform: translateY(0);
        }

        /* Google Social Button */
        .btn-google {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            width: 100%;
            background-color: #ffffff;
            border: 1.5px solid var(--slate-200);
            border-radius: 11px;
            padding: 10px 16px;
            color: var(--slate-700);
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            transition: all .2s ease;
        }

        .btn-google:hover {
            background-color: var(--slate-50);
            border-color: #cbd5e1;
            color: var(--dark);
        }

        /* Divider */
        .auth-divider {
            display: flex;
            align-items: center;
            gap: 12px;
            margin: 20px 0;
            color: var(--slate-400);
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .auth-divider::before, .auth-divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background-color: var(--slate-200);
        }

        /* Demo Account Box */
        .demo-box {
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            border-radius: 14px;
            padding: 14px 16px;
            margin-bottom: 22px;
            position: relative;
        }

        .demo-box-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 8px;
        }

        .demo-pill {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            background: #dcfce7;
            color: #166534;
            font-size: 11.5px;
            font-weight: 700;
            padding: 3px 9px;
            border-radius: 6px;
            text-transform: uppercase;
            letter-spacing: 0.03em;
        }

        .btn-autofill {
            background: #16a34a;
            color: #ffffff;
            border: none;
            border-radius: 7px;
            padding: 4px 10px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 4px;
            transition: all .15s ease;
        }

        .btn-autofill:hover {
            background: #15803d;
            transform: translateY(-1px);
        }

        .demo-details {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 8px;
            font-size: 12.5px;
        }

        .demo-item {
            background: #ffffff;
            padding: 6px 10px;
            border-radius: 8px;
            border: 1px solid #dcfce7;
            display: flex;
            flex-direction: column;
        }

        .demo-item-label {
            font-size: 10.5px;
            color: #64748b;
            font-weight: 600;
            text-transform: uppercase;
        }

        .demo-item-val {
            font-family: monospace;
            font-weight: 700;
            color: #15803d;
            font-size: 12.5px;
            word-break: break-all;
        }

        /* Modern Alerts */
        .alert {
            border-radius: 12px;
            border: none;
            font-size: 13.5px;
            padding: 12px 16px;
            display: flex;
            align-items: flex-start;
            gap: 10px;
        }

        .alert-success {
            background-color: #f0fdf4;
            color: #166534;
            border: 1px solid #bbf7d0;
        }

        .alert-danger {
            background-color: #fef2f2;
            color: #991b1b;
            border: 1px solid #fecaca;
        }

        .alert-warning {
            background-color: #fffbeb;
            color: #92400e;
            border: 1px solid #fde68a;
        }

        .auth-switch-text {
            font-size: 13.5px;
            color: var(--slate-500);
            text-align: center;
            margin-top: 20px;
        }

        .auth-switch-text a {
            color: var(--primary);
            font-weight: 700;
            text-decoration: none;
        }

        .auth-switch-text a:hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }

        /* Responsive Breakpoints */
        @media (max-width: 991.98px) {
            .auth-wrapper {
                flex-direction: column;
            }

            .auth-brand-pane {
                display: none !important;
            }

            .auth-form-pane {
                min-height: 100vh;
                padding: 24px 20px;
            }

            .auth-card-container {
                max-width: 100%;
            }
        }
    </style>
    @stack('styles')
</head>
<body>

<div class="auth-wrapper">
    <!-- LEFT SIDE: Brand Showcase & Value Proposition -->
    <div class="auth-brand-pane">
        <div class="auth-brand-bg-image"></div>
        
        <div class="auth-brand-content">
            <!-- Header Logo -->
            <div class="auth-brand-header">
                <img src="{{ asset('images/logo.png') }}" alt="Logo Bank Sampah RW 042" class="auth-brand-logo">
                <div>
                    <h1 class="auth-brand-title">Bank Sampah RW 042</h1>
                    <p class="auth-brand-sub">Kelurahan Bahagia · Babelan · Kab. Bekasi</p>
                </div>
            </div>

            <!-- Hero Message -->
            <div class="auth-brand-hero">
                <div class="brand-badge">
                    <i class="bi bi-recycle"></i>
                    <span>@yield('hero_badge', 'Gerakan Peduli Lingkungan RW 042')</span>
                </div>
                <h2 class="brand-hero-title">
                    @yield('hero_title', 'Ubah Sampah Jadi Berkah & Nilai Rupiah.')
                </h2>
                <p class="brand-hero-desc">
                    @yield('hero_desc', 'Platform digital pengelolaan sampah terpadu untuk warga RW 042. Penimbangan transparan, pencatatan otomatis, dan saldo tabungan sampah yang menguntungkan.')
                </p>

                <!-- Feature Highlights -->
                <div class="brand-feature-list">
                    <div class="brand-feature-item">
                        <div class="brand-feature-icon">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <div class="brand-feature-text">
                            <h6>Pencatatan Transparan & Terpercaya</h6>
                            <p>Data penimbangan dan nominal rupiah terekam langsung secara digital.</p>
                        </div>
                    </div>
                    <div class="brand-feature-item">
                        <div class="brand-feature-icon">
                            <i class="bi bi-wallet2"></i>
                        </div>
                        <div class="brand-feature-text">
                            <h6>Penarikan Saldo Fleksibel</h6>
                            <p>Ajukan penarikan dana tabungan sampah Anda kapan saja dengan mudah.</p>
                        </div>
                    </div>
                    <div class="brand-feature-item">
                        <div class="brand-feature-icon">
                            <i class="bi bi-trophy"></i>
                        </div>
                        <div class="brand-feature-text">
                            <h6>Apresiasi Nasabah Berprestasi</h6>
                            <p>Sistem penilaian objektif SAW untuk mendukung keaktifan warga.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Left Pane Footer -->
        <div class="auth-brand-footer auth-brand-content">
            <div class="brand-pill-status">
                <span class="status-dot"></span>
                <span>Layanan Aktif Warga RW 042</span>
            </div>
            <div>
                <span>🌿 Bersih Lingkungannya, Mandiri Warganya</span>
            </div>
        </div>
    </div>

    <!-- RIGHT SIDE: Authentication Form on the Right -->
    <div class="auth-form-pane">
        <!-- Topbar with Back to Landing Page Button -->
        <div class="auth-topbar">
            <a href="@yield('back_url', route('landing'))" class="btn-back-link" title="Kembali">
                <i class="bi bi-arrow-left"></i>
                <span>@yield('back_text', 'Kembali ke Beranda')</span>
            </a>

            <!-- Mobile Brand Mark -->
            <div class="auth-mobile-logo d-lg-none">
                <img src="{{ asset('images/logo.png') }}" alt="Logo">
                <span>Bank Sampah 042</span>
            </div>
        </div>

        <!-- Form Card Container -->
        <div class="auth-card-container @yield('card_class')">
            @yield('content')
        </div>

        <!-- Footer Copyright -->
        <div class="text-center py-2">
            <p class="mb-0 text-muted" style="font-size: 12px;">
                &copy; {{ date('Y') }} Bank Sampah RW 042 Kelurahan Bahagia · Hak Cipta Dilindungi
            </p>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Universal password show/hide toggle
    function togglePassword(btn) {
        const input = btn.previousElementSibling || btn.parentElement.querySelector('input[type="password"], input[type="text"]');
        const icon = btn.querySelector('i');
        if (!input || !icon) return;

        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.remove('bi-eye');
            icon.classList.add('bi-eye-slash');
        } else {
            input.type = 'password';
            icon.classList.remove('bi-eye-slash');
            icon.classList.add('bi-eye');
        }
    }
</script>
@stack('scripts')
</body>
</html>
