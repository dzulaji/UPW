<x-layouts.app>
    <x-slot:title>Dana Sosial UNAND - Wujudkan Perubahan</x-slot:title>

    {{-- ==========================================
         ULTRA MODERN CSS (SENIOR FE APPROACH)
         ========================================== --}}
    <style>
        :root {
            /* Palette User */
            --c-main: #84B179;
            --c-hover: #A2CB8B;
            --c-light: #C7EABB;
            --c-pale: #E8F5BD;
            /* Added Contrast Elements */
            --c-dark: #1a2e15;
            --c-darker: #0f1c0c;
            --c-white-glass: rgba(255, 255, 255, 0.85);
        }

        body {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            overflow-x: hidden;
        }

        /* Typography Scaling */
        .text-huge {
            font-size: clamp(2.5rem, 5vw + 1rem, 5rem);
            line-height: 1.1;
            letter-spacing: -0.03em;
        }

        .text-gradient {
            background: linear-gradient(135deg, var(--c-dark) 0%, var(--c-main) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Abstract Background Blobs */
        .bg-mesh {
            position: relative;
            background-color: #f8faf7;
            overflow: hidden;
            z-index: 1;
        }

        .blob {
            position: absolute;
            filter: blur(90px);
            z-index: -1;
            opacity: 0.6;
            animation: floatBlob 20s infinite alternate cubic-bezier(0.4, 0, 0.2, 1);
        }

        .blob-1 {
            top: -10%;
            left: -10%;
            width: 50vw;
            height: 50vw;
            background: var(--c-light);
            border-radius: 40% 60% 70% 30% / 40% 50% 60% 50%;
        }

        .blob-2 {
            bottom: -20%;
            right: -10%;
            width: 60vw;
            height: 60vw;
            background: var(--c-pale);
            border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
            animation-delay: -5s;
        }

        @keyframes floatBlob {
            0% {
                transform: translate(0, 0) scale(1) rotate(0deg);
            }

            50% {
                transform: translate(5%, 10%) scale(1.1) rotate(10deg);
            }

            100% {
                transform: translate(-5%, 5%) scale(0.9) rotate(-10deg);
            }
        }

        /* Glassmorphism System */
        .glass-card {
            background: var(--c-white-glass);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.5);
            border-radius: 1.5rem;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.03);
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        }

        .glass-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 30px 60px rgba(132, 177, 121, 0.15);
        }

        /* Modern Buttons */
        .btn-modern {
            background: var(--c-main);
            color: #fff;
            border: none;
            padding: 1rem 2.5rem;
            border-radius: 50px;
            font-weight: 700;
            box-shadow: 0 10px 20px rgba(132, 177, 121, 0.3);
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .btn-modern:hover {
            background: var(--c-dark);
            color: var(--c-pale);
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 15px 25px rgba(26, 46, 21, 0.2);
        }

        .btn-outline-modern {
            background: rgba(255, 255, 255, 0.5);
            backdrop-filter: blur(10px);
            color: var(--c-dark);
            border: 2px solid var(--c-main);
            padding: 0.9rem 2.5rem;
            border-radius: 50px;
            font-weight: 700;
            transition: all 0.3s ease;
        }

        .btn-outline-modern:hover {
            background: var(--c-main);
            color: #fff;
            border-color: var(--c-main);
        }

        /* Bento Grid Layout (Apple Style) */
        /* .bento-grid {
            display: grid;
            gap: 1.5rem;
            grid-template-columns: repeat(12, 1fr);
        } */

        .bento-item {
            border-radius: 2rem;
            overflow: hidden;
            position: relative;
        }

        .bento-img-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: 0;
            transition: transform 0.7s ease;
        }

        .bento-item:hover .bento-img-bg {
            transform: scale(1.05);
        }

        .bento-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(26, 46, 21, 0.95) 0%, rgba(26, 46, 21, 0.2) 100%);
            z-index: 1;
        }

        .bento-content {
            position: relative;
            z-index: 2;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 2.5rem;
        }

        /* Program Cards Overlap */
        .program-card-modern {
            border: none;
            border-radius: 1.5rem;
            overflow: hidden;
            background: #fff;
            transition: all 0.4s ease;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.03);
        }

        .program-card-modern:hover {
            transform: translateY(-12px);
            box-shadow: 0 25px 50px rgba(132, 177, 121, 0.2);
        }

        .program-img-wrap {
            height: 260px;
            overflow: hidden;
            position: relative;
        }

        .program-img-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .program-card-modern:hover .program-img-wrap img {
            transform: scale(1.08);
        }

        .program-content {
            padding: 2rem;
            position: relative;
            background: #fff;
            margin-top: -30px;
            border-radius: 1.5rem 1.5rem 0 0;
            z-index: 2;
        }

        /* Dark Section */
        .bg-ultra-dark {
            background-color: var(--c-dark);
            color: #fff;
            position: relative;
            overflow: hidden;
        }

        .accent-glow {
            position: absolute;
            width: 400px;
            height: 400px;
            background: var(--c-main);
            filter: blur(120px);
            border-radius: 50%;
            opacity: 0.4;
            pointer-events: none;
        }

        /* Progress Bar */
        .progress-modern {
            height: 8px;
            background-color: var(--c-light);
            border-radius: 10px;
            overflow: hidden;
        }

        .progress-bar-modern {
            background-color: var(--c-main);
            border-radius: 10px;
            position: relative;
        }

        .progress-bar-modern::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            background: linear-gradient(90deg, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.4) 50%, rgba(255, 255, 255, 0) 100%);
            animation: shimmer 2s infinite;
        }

        @keyframes shimmer {
            100% {
                transform: translateX(100%);
            }
        }
    </style>

    {{-- ==========================================
         HERO SECTION (DYNAMIC MESH & GLASS)
         ========================================== --}}
    <section id="home" class="bg-mesh min-vh-100 d-flex align-items-center position-relative pt-5">
        <div class="blob blob-1"></div>
        <div class="blob blob-2"></div>

        <div class="container position-relative z-3 pt-5">
            <div class="row align-items-center justify-content-between pt-4">

                {{-- Kiri: Headline (Dikecilin porsinya jadi col-lg-5 biar gambar lebih lega) --}}
                <div class="col-lg-5 mb-5 mb-lg-0 text-center text-lg-start" data-aos="fade-up" data-aos-duration="1000">
                    <div class="d-inline-flex align-items-center px-4 py-2 rounded-pill mb-4 border border-success"
                        style="background: rgba(132, 177, 121, 0.1);">
                        <span class="spinner-grow spinner-grow-sm text-success me-2" role="status"></span>
                        <span class="fw-bold" style="color: var(--c-dark);">Unit Pengelola Wakaf UNAND</span>
                    </div>

                    <h1 class="text-huge fw-bolder mb-4">
                        Kebaikan Anda,<br>
                        <span class="text-gradient">Masa Depan Mereka.</span>
                    </h1>

                    <p class="fs-5 text-secondary mb-5" style="line-height: 1.7;">
                        Platform filantropi resmi sivitas akademika Universitas Andalas. Bersama kita wujudkan
                        pendidikan yang inklusif melalui Wakaf, Zakat, dan Dana Abadi.
                    </p>

                    <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center justify-content-lg-start mb-2">
                        <a href="#program-pilihan" class="btn-modern text-decoration-none">
                            Mulai Berwakaf <i class="bi bi-arrow-right ms-2 fs-5"></i>
                        </a>
                        <a href="#bento-layanan" class="btn-outline-modern text-decoration-none">
                            Lihat Layanan
                        </a>
                    </div>
                </div>

                {{-- Kanan: Glassmorphism Visual (Dibesarin jadi col-lg-6 dengan rasio gambar cinematic) --}}
                <div class="col-lg-6 position-relative" data-aos="fade-left" data-aos-duration="1200"
                    data-aos-delay="200">
                    <div class="position-relative">
                        {{-- Tambahan object-fit dan aspect-ratio biar gambar rektoratnya gede, proporsional, & megah --}}
                        <img src="{{ asset('frontend/img/rektorat.jpg') }}" alt="Gedung Rektorat UNAND"
                            class="img-fluid w-100"
                            style="border-radius: 2rem; box-shadow: 0 30px 60px rgba(0,0,0,0.15); aspect-ratio: 4/3; object-fit: cover; border: 8px solid white;">
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- ==========================================
         BENTO GRID LAYOUT (LAYANAN UTAMA)
         ========================================== --}}
    <section id="bento-layanan" class="py-5 bg-white">
        <div class="container py-5">
            <div class="row mb-5" data-aos="fade-up">
                <div class="col-lg-8">
                    <h2 class="display-5 fw-bolder text-gradient mb-3">Pilar Kebaikan Kami</h2>
                    <p class="fs-5 text-muted">Tiga instrumen utama untuk menyalurkan niat baik Anda dengan dampak yang
                        terukur dan abadi.</p>
                </div>
            </div>

            {{-- PERBAIKAN: Pakai Bootstrap Row agar responsif aman --}}
            <div class="row g-4 align-items-stretch">

                {{-- Bento 1: Wakaf Uang (Besar, Kiri) --}}
                <div class="col-lg-7">
                    <div class="bento-item h-100 w-100 shadow-sm" style="min-height: 400px;" data-aos="fade-up"
                        data-aos-delay="100">
                        <img src="https://images.unsplash.com/photo-1579621970563-ebec7560ff3e?auto=format&fit=crop&q=80&w=1000"
                            class="bento-img-bg" alt="Wakaf Uang">
                        <div class="bento-overlay"></div>
                        <div class="bento-content text-white">
                            <div class="d-inline-block bg-white text-success p-3 rounded-circle mb-4"
                                style="width: 60px; height: 60px; display: flex; align-items: center; justify-content: center;">
                                <i class="bi bi-piggy-bank fs-3"></i>
                            </div>
                            <h3 class="display-6 fw-bolder mb-3 text-white">Wakaf Uang</h3>
                            <p class="fs-6 opacity-75 mb-4 pe-md-5">Wakaf berupa uang tunai yang pokoknya dikelola
                                secara abadi. Hasilnya murni untuk kemaslahatan umat dan beasiswa.</p>
                            <div>
                                <a href="{{ route('public.wakaf-uang') }}"
                                    class="btn btn-light rounded-pill px-4 py-2 fw-bold text-success">Pelajari
                                    Sistemnya</a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Bento 2 & 3: Tumpuk di Kanan --}}
                <div class="col-lg-5 d-flex flex-column gap-4">

                    {{-- Bento 2: Zakat --}}
                    <div class="bento-item flex-grow-1 w-100 shadow-sm"
                        style="min-height: 250px; background: var(--c-pale);" data-aos="fade-left" data-aos-delay="200">
                        <div class="p-4 p-md-5 h-100 d-flex flex-column justify-content-center">
                            <div class="d-flex align-items-center gap-3 mb-3">
                                <img src="{{ asset('frontend/img/logo-outline-zakat.png') }}" alt="UPZ" width="40">
                                <h4 class="fw-bolder m-0" style="color: var(--c-dark);">Zakat UPZ</h4>
                            </div>
                            <p class="text-muted small mb-4">Salurkan zakat, infaq, dan sedekah Anda melalui Unit
                                Pengumpul Zakat (UPZ) Universitas Andalas secara resmi.</p>
                            <a href="http://upz.unand.ac.id/" target="_blank" class="text-decoration-none fw-bold"
                                style="color: var(--c-main);">Kunjungi Website UPZ <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>

                    {{-- Bento 3: Transparansi --}}
                    <div class="bento-item flex-grow-1 w-100 shadow-sm"
                        style="min-height: 250px; background: var(--c-dark);" data-aos="fade-left" data-aos-delay="300">
                        <div
                            class="p-4 p-md-5 h-100 d-flex flex-column justify-content-center text-white position-relative overflow-hidden">
                            <i class="bi bi-shield-check position-absolute opacity-10"
                                style="font-size: 15rem; right: -20px; bottom: -40px;"></i>
                            <h4 class="fw-bolder mb-3 text-white">Transparansi 100%</h4>
                            <p class="opacity-75 small mb-0">Setiap rupiah yang Anda salurkan dapat dilacak melalui
                                laporan periodik publik kami.</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    {{-- ==========================================
         PROGRAM CARD (HOVER & OVERLAP EFFECTS)
         ========================================== --}}
    <section id="program-pilihan" class="py-5" style="background-color: #f4f7f4;">
        <div class="container py-5">
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="badge px-3 py-2 rounded-pill fw-bold mb-3"
                    style="background: var(--c-light); color: var(--c-dark);">Project Based</span>
                <h2 class="display-5 fw-bolder text-gradient">Wakaf Melalui Uang</h2>
                <p class="fs-5 text-muted mx-auto mt-3" style="max-width: 600px;">Pilih infrastruktur atau program
                    spesifik yang ingin Anda wujudkan bersama kami hari ini.</p>
            </div>

            <div class="row g-4 g-xl-5 justify-content-center">
                @forelse ($programs as $program)
                    <div class="col-lg-4 col-md-6">
                        <div class="program-card-modern h-100 d-flex flex-column" data-aos="fade-up"
                            data-aos-delay="{{ $loop->iteration * 100 }}">
                            <div class="program-img-wrap">
                                <a href="{{ route('wakaf-melalui-uang.show.public', $program->slug) }}">
                                    <img src="{{ asset('storage/programs/' . $program->image) }}"
                                        alt="{{ $program->title }}">
                                </a>
                                <div class="position-absolute top-0 end-0 m-3">
                                    <span class="badge bg-white text-dark shadow-sm px-3 py-2 rounded-pill"><i
                                            class="bi bi-activity text-success me-1"></i> Aktif</span>
                                </div>
                            </div>

                            <div class="program-content d-flex flex-column flex-grow-1">
                                <h4 class="fw-bold mb-3">
                                    <a href="{{ route('wakaf-melalui-uang.show.public', $program->slug) }}"
                                        class="text-decoration-none" style="color: var(--c-dark);">
                                        {{ Str::limit($program->title, 55) }}
                                    </a>
                                </h4>
                                <p class="text-muted small mb-4 flex-grow-1 line-height-lg">
                                    {{ Str::limit($program->description, 90) }}
                                </p>

                                <div>
                                    <div class="d-flex justify-content-between align-items-end mb-2">
                                        <div>
                                            <span class="d-block small text-muted">Terkumpul</span>
                                            <span class="fw-bolder"
                                                style="color: var(--c-main); font-size: 1.1rem;">Rp
                                                {{ $program->formatted_collected_amount }}</span>
                                        </div>
                                        <div class="text-end">
                                            <span class="fw-bold text-dark">{{ $program->progres_persentase }}%</span>
                                        </div>
                                    </div>

                                    <div class="progress-modern mb-4">
                                        <div class="progress-bar-modern"
                                            style="width: {{ $program->progres_persentase }}%; height: 100%;"></div>
                                    </div>

                                    <a href="{{ route('wakaf-melalui-uang.show.public', $program->slug) }}"
                                        class="btn-outline-modern w-100 d-block text-center text-decoration-none">
                                        Ikut Berwakaf
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <div class="d-inline-block p-5 rounded-circle" style="background: var(--c-pale);">
                            <i class="bi bi-inboxes text-success display-1"></i>
                        </div>
                        <h4 class="mt-4 fw-bold" style="color: var(--c-dark);">Belum ada project aktif</h4>
                    </div>
                @endforelse
            </div>

            @if ($programs->count() > 0)
                <div class="text-center mt-5 pt-3">
                    <a href="{{ route('wakaf-melalui-uang.index.public') }}"
                        class="text-decoration-none fw-bold text-success fs-5 border-bottom border-success pb-1">
                        Lihat Semua Program Wakaf <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            @endif
        </div>
    </section>

    {{-- ==========================================
         CALL TO ACTION (DARK MODE HIGH CONTRAST)
         ========================================== --}}
    <section class="bg-ultra-dark py-5">
        <div class="accent-glow" style="top: -100px; right: -100px;"></div>
        <div class="accent-glow" style="bottom: -100px; left: -100px; background: var(--c-pale);"></div>

        <div class="container py-5 position-relative z-2">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8" data-aos="zoom-in">
                    <h2 class="display-4 fw-bolder mb-4 text-white">Sudah Pernah Berwakaf?</h2>
                    <p class="fs-5 mb-5 opacity-75" style="color: var(--c-pale);">Lacak status transaksi wakaf Anda
                        secara real-time dan unduh sertifikat atau invoice digital Anda langsung dari sistem.</p>

                    <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center">
                        <a href="{{ route('donations.check') }}" class="btn-modern text-decoration-none"
                            style="background: var(--c-pale); color: var(--c-dark);">
                            <i class="bi bi-search me-2"></i> Lacak Donasi Saya
                        </a>
                        <a href="#bento-layanan"
                            class="btn-outline-modern text-white border-white text-decoration-none"
                            style="background: rgba(255,255,255,0.1);">
                            Mulai Wakaf Baru
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ==========================================
         BLOG / BERITA MODERN
         ========================================== --}}
    <section id="berita" class="py-5 bg-white">
        <div class="container py-5">
            <div class="d-flex justify-content-between align-items-end mb-5" data-aos="fade-up">
                <div>
                    <h2 class="display-6 fw-bolder text-gradient mb-2">Berita Terbaru</h2>
                    <p class="text-muted mb-0 fs-5">Kisah inspiratif dan update seputar Dana Sosial.</p>
                </div>
                @if ($articles->count() > 0)
                    <div class="d-none d-md-block">
                        <a href="{{ route('articles.index.public') }}"
                            class="btn-outline-modern text-decoration-none px-4 py-2">Lihat Semua</a>
                    </div>
                @endif
            </div>

            <div class="row g-4">
                @forelse($articles as $article)
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                        <a href="{{ route('articles.show.public', $article->slug ?? $article->id) }}"
                            class="text-decoration-none group d-block">
                            <div class="position-relative overflow-hidden rounded-4 mb-3" style="height: 240px;">
                                @if ($article->image)
                                    <img src="{{ asset('storage/articles/' . $article->image) }}"
                                        class="w-100 h-100 object-fit-cover transition-transform duration-500 group-hover-scale"
                                        alt="{{ $article->title }}" style="transition: transform 0.5s;">
                                @else
                                    <img src="https://images.unsplash.com/photo-1585828068979-24653dbd591c?auto=format&fit=crop&q=80&w=600"
                                        class="w-100 h-100 object-fit-cover" style="transition: transform 0.5s;">
                                @endif
                                <div class="position-absolute bottom-0 start-0 m-3 px-3 py-1 bg-white rounded-pill shadow-sm small fw-bold"
                                    style="color: var(--c-dark);">
                                    {{ $article->created_at->format('d M Y') }}
                                </div>
                            </div>
                            <h5 class="fw-bolder mb-2" style="color: var(--c-dark); line-height: 1.4;">
                                {{ Str::limit($article->title, 60) }}</h5>
                            <p class="text-muted small">{{ Str::limit(strip_tags($article->content), 90) }}</p>
                        </a>
                    </div>
                @empty
                    <div class="col-12 text-center py-5 text-muted">
                        <i class="bi bi-journal-x fs-1 mb-3 d-block"></i> Belum ada berita.
                    </div>
                @endforelse
            </div>

            @if ($articles->count() > 0)
                <div class="d-block d-md-none text-center mt-4">
                    <a href="{{ route('articles.index.public') }}"
                        class="btn-outline-modern text-decoration-none w-100">Lihat Semua Berita</a>
                </div>
            @endif
        </div>
    </section>

    {{-- Tambahan Script CSS Interaktif --}}
    <style>
        .group:hover img {
            transform: scale(1.05);
        }

        html {
            scroll-behavior: smooth;
        }
    </style>
</x-layouts.app>
