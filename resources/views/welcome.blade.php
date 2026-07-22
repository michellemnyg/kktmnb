<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelurahan Manembo-Nembo - Kota Bitung</title>
    
    <!-- Memanggil Font Inter & Vite -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-slate-50 text-slate-800">

    <!-- ================= NAVBAR ================= -->
    <nav id="navbar" class="fixed w-full z-50 transition-all duration-300 bg-transparent py-4 text-white">
        <div class="container mx-auto px-4 md:px-8 flex justify-between items-center relative">
            
            <!-- Logo & Title -->
            <div class="flex items-center gap-3">
                <img src="{{ asset('images/logobitung.png') }}" alt="Logo Bitung" class="h-10 w-auto">
                <div id="nav-brand-text">
                    <h1 class="font-bold text-lg md:text-xl leading-tight">Kelurahan Manembo-Nembo</h1>
                    <p class="text-xs md:text-sm opacity-90">Kota Bitung</p>
                </div>
            </div>

            <!-- Hamburger Menu (Mobile) -->
            <button class="md:hidden focus:outline-none p-2 rounded-lg bg-white/10 hover:bg-white/20 transition-colors" id="mobile-menu-btn">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>

            <!-- Desktop & Mobile Menu (Floating Card on Mobile) -->
            <div class="hidden max-md:absolute max-md:top-[120%] max-md:left-4 max-md:right-4 max-md:bg-white max-md:text-slate-800 max-md:rounded-2xl max-md:shadow-2xl max-md:border max-md:border-slate-100 max-md:flex-col md:flex max-md:p-4 gap-2 md:gap-6 font-medium text-sm items-center transition-all duration-300 z-50" id="nav-links">
                <a href="#home" class="max-md:w-full max-md:p-3 max-md:hover:bg-slate-50 max-md:rounded-xl hover:text-primary-600 md:hover:text-primary-200 transition-colors">Home</a>
                <a href="#profil" class="max-md:w-full max-md:p-3 max-md:hover:bg-slate-50 max-md:rounded-xl hover:text-primary-600 md:hover:text-primary-200 transition-colors">Profil</a>
                <a href="#sotk" class="max-md:w-full max-md:p-3 max-md:hover:bg-slate-50 max-md:rounded-xl hover:text-primary-600 md:hover:text-primary-200 transition-colors">SOTK</a>
                <a href="#demografi" class="max-md:w-full max-md:p-3 max-md:hover:bg-slate-50 max-md:rounded-xl hover:text-primary-600 md:hover:text-primary-200 transition-colors">Demografi</a>
                <a href="#peta" class="max-md:w-full max-md:p-3 max-md:hover:bg-slate-50 max-md:rounded-xl hover:text-primary-600 md:hover:text-primary-200 transition-colors">Peta</a>
                <a href="#berita" class="max-md:w-full max-md:p-3 max-md:hover:bg-slate-50 max-md:rounded-xl hover:text-primary-600 md:hover:text-primary-200 transition-colors">Berita</a>
                <a href="#galeri" class="max-md:w-full max-md:p-3 max-md:hover:bg-slate-50 max-md:rounded-xl hover:text-primary-600 md:hover:text-primary-200 transition-colors">Galeri</a>
            </div>
        </div>
    </nav>
    <!-- ================= END NAVBAR ================= -->

    <!-- ================= HERO SECTION ================= -->
    <section id="home" class="relative min-h-screen flex flex-col justify-center items-center text-center" 
             style="background-image: url('{{ asset('images/header.jpeg') }}'); background-size: cover; background-position: center; background-attachment: fixed;">
        
        <!-- Overlay Gradient -->
        <div class="absolute inset-0 bg-slate-900/70"></div>
        
        <div class="container relative z-10 mx-auto px-4 mt-20 animate-fade-in-up">
            <!-- Text Content -->
            <h2 class="text-4xl md:text-5xl lg:text-7xl font-bold mb-6 leading-tight text-white max-w-5xl mx-auto tracking-tight">
                Selamat Datang di <br> 
                <span class="text-primary-400">Kelurahan Manembo-Nembo</span>
            </h2>
            <p class="text-base md:text-lg lg:text-xl text-gray-200 mb-10 leading-relaxed font-light max-w-2xl mx-auto">
                Portal informasi resmi Kelurahan Manembo-Nembo. Melayani masyarakat dengan sepenuh hati demi mewujudkan lingkungan yang maju, sejahtera, dan berbudaya di Kota Bitung.
            </p>
        </div>
    </section>
    <!-- ================= END HERO SECTION ================= -->

    <!-- ================= PROFIL & VISI MISI SECTION ================= -->
    <section id="profil" class="py-24 bg-white relative scroll-mt-20">
        <div class="container mx-auto px-4 md:px-8">
            <div class="flex flex-col lg:flex-row gap-16 items-center">
                
                <!-- Logo Kota Bitung (Kiri) -->
                <div class="w-full lg:w-1/3 flex flex-col items-center justify-center">
                    <img src="{{ asset('images/logobitung.png') }}" alt="Logo Kota Bitung" 
                         class="w-48 md:w-56 h-auto object-contain relative z-10 drop-shadow-md">
                    
                    <!-- Nama Wilayah -->
                    <div class="mt-8 text-center relative z-10">
                        <h3 class="text-2xl font-bold text-slate-800">Manembo-Nembo</h3>
                        <p class="text-primary-600 font-semibold mt-1">Kota Bitung</p>
                        <div class="h-1 w-12 bg-primary-500 mx-auto mt-4 rounded-full"></div>
                    </div>
                </div>

                <!-- Konten Visi Misi (Kanan) -->
                <div class="w-full lg:w-2/3">
                    <div class="mb-4">
                        <span class="text-primary-600 font-semibold tracking-wider text-sm uppercase">Tentang Kelurahan</span>
                        <h2 class="text-3xl md:text-4xl font-bold text-slate-800 mt-2 mb-6">Profil & Visi Misi</h2>
                    </div>
                    
                    <div class="prose prose-slate max-w-none mb-10 text-slate-600 leading-relaxed">
                        <p>
                            Kelurahan Manembo-Nembo merupakan salah satu pilar pemerintahan tingkat dasar di Kota Bitung yang berkomitmen memberikan pelayanan administrasi kependudukan terbaik bagi warganya. Kami terus berinovasi untuk menciptakan lingkungan yang aman, tertib, dan dinamis.
                        </p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Visi -->
                        <div class="bg-slate-50 rounded-2xl p-8 border border-slate-100 shadow-sm">
                            <div class="w-12 h-12 bg-primary-100 text-primary-600 rounded-xl flex items-center justify-center mb-6">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                            </div>
                            <h4 class="text-xl font-bold text-slate-800 mb-4">Visi</h4>
                            <p class="text-slate-600 italic">
                                "Mewujudkan Kelurahan Manembo-Nembo yang mandiri, sejahtera, relijius, dan berbudaya dengan semangat gotong royong."
                            </p>
                        </div>

                        <!-- Misi -->
                        <div class="bg-slate-50 rounded-2xl p-8 border border-slate-100 shadow-sm">
                            <div class="w-12 h-12 bg-primary-100 text-primary-600 rounded-xl flex items-center justify-center mb-6">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                            </div>
                            <h4 class="text-xl font-bold text-slate-800 mb-4">Misi</h4>
                            <ul class="text-slate-600 space-y-3 list-none">
                                <li class="flex items-start gap-3"><span class="text-primary-500 font-bold">•</span> Meningkatkan kualitas pelayanan publik.</li>
                                <li class="flex items-start gap-3"><span class="text-primary-500 font-bold">•</span> Mendorong partisipasi masyarakat dalam pembangunan.</li>
                                <li class="flex items-start gap-3"><span class="text-primary-500 font-bold">•</span> Memelihara ketentraman dan ketertiban umum.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================= END PROFIL SECTION ================= -->

    <!-- ================= SOTK SECTION ================= -->
    <section id="sotk" class="py-24 bg-slate-50 border-t border-slate-200 scroll-mt-20">
        <div class="container mx-auto px-4 md:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-slate-800 mb-4">Struktur Organisasi & Tata Kerja</h2>
                <p class="text-slate-600">Jajaran perangkat Kelurahan Manembo-Nembo yang siap melayani administrasi dan kebutuhan masyarakat.</p>
            </div>

            <!-- Lurah -->
            <div class="flex flex-col items-center justify-center mb-16">
                <img src="{{ asset('images/lurah.jpeg') }}" alt="Bapak Lurah Manembo-Nembo" 
                     class="w-40 h-40 md:w-48 md:h-48 rounded-full object-cover object-top mb-5 shadow-lg">
                <p class="text-sm font-semibold text-primary-600 uppercase mb-1">Lurah Manembo-Nembo</p>
                <h4 class="text-2xl font-bold text-slate-800">Johnny Kondo, S.A.P.</h4>
            </div>

            <!-- Grid SOTK Bawah -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8 max-w-5xl mx-auto">
                <div class="bg-white p-6 md:p-8 rounded-xl shadow-sm border border-slate-100 hover:shadow-md transition-shadow">
                    <p class="text-sm font-semibold text-primary-600 uppercase mb-1">Sekretaris Lurah</p>
                    <h4 class="text-lg font-bold text-slate-800">Grace M. Kombong, SE.Ak</h4>
                </div>
                <div class="bg-white p-6 md:p-8 rounded-xl shadow-sm border border-slate-100 hover:shadow-md transition-shadow">
                    <p class="text-sm font-semibold text-primary-600 uppercase mb-1">Kepala Seksi Pemerintahan</p>
                    <h4 class="text-lg font-bold text-slate-800">Magdalena R. Wondal</h4>
                </div>
                <div class="bg-white p-6 md:p-8 rounded-xl shadow-sm border border-slate-100 hover:shadow-md transition-shadow">
                    <p class="text-sm font-semibold text-primary-600 uppercase mb-1">Kepala Seksi Ekonomi Sosial</p>
                    <h4 class="text-lg font-bold text-slate-800">Santje S. Kereh</h4>
                </div>
                <div class="bg-white p-6 md:p-8 rounded-xl shadow-sm border border-slate-100 hover:shadow-md transition-shadow">
                    <p class="text-sm font-semibold text-primary-600 uppercase mb-1">Penata Kelola Sistem dan Teknologi Informasi</p>
                    <h4 class="text-lg font-bold text-slate-800">Natalia Saskia Katutu, S.Kom</h4>
                </div>
            </div>
        </div>
    </section>
    <!-- ================= END SOTK SECTION ================= -->

    <!-- ================= DEMOGRAFI SECTION ================= -->
    <section id="demografi" class="py-24 bg-white relative border-t border-slate-100 scroll-mt-20">
        <div class="container mx-auto px-4 md:px-8">
            
            <div class="flex flex-col md:flex-row justify-between items-end mb-12 border-b border-slate-100 pb-6">
                <!-- Judul Section -->
                <div class="text-left max-w-3xl mb-6 md:mb-0">
                    <span class="text-primary-600 font-semibold tracking-wider text-sm uppercase">Data Statistik</span>
                    <h2 class="text-3xl md:text-4xl font-bold text-slate-800 mt-2 mb-2">Administrasi Penduduk</h2>
                    <p class="text-slate-600">Ringkasan data kependudukan Kelurahan Manembo-Nembo.</p>
                </div>
                
                <!-- Tanggal Dinamis (Otomatis Mengikuti Sistem) -->
                <div class="w-full md:w-auto">
                    <div class="inline-flex items-center gap-2 bg-primary-50 border border-primary-100 px-5 py-2.5 rounded-xl text-primary-700 shadow-sm">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <span class="font-medium text-sm">Data per <strong id="dynamic-period">Bulan Tahun</strong></span>
                    </div>
                </div>
            </div>

            <!-- Trik Grid: 2 kolom di mobile, 3 di tablet, 6 di desktop (untuk centering baris bawah) -->
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6 lg:gap-8">
                
                <!-- Kartu 1: Jumlah Penduduk (Full width di Mobile, Normal di Desktop) -->
                <div class="col-span-2 md:col-span-1 lg:col-span-2 group bg-slate-50 p-6 md:p-8 rounded-2xl border border-slate-100 text-center shadow-sm hover:shadow-xl hover:-translate-y-2 hover:border-primary-200 transition-all duration-300 cursor-default">
                    <div class="w-14 h-14 mx-auto bg-primary-100 text-primary-600 group-hover:bg-primary-600 group-hover:text-white transition-colors duration-300 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </div>
                    <h3 class="text-3xl md:text-4xl font-bold text-primary-600 mb-2">5.234</h3>
                    <p class="text-slate-600 font-medium">Jumlah Penduduk</p>
                </div>

                <!-- Kartu 2: Laki-laki -->
                <div class="col-span-1 md:col-span-1 lg:col-span-2 group bg-slate-50 p-6 md:p-8 rounded-2xl border border-slate-100 text-center shadow-sm hover:shadow-xl hover:-translate-y-2 hover:border-primary-200 transition-all duration-300 cursor-default">
                    <div class="w-14 h-14 mx-auto bg-primary-100 text-primary-600 group-hover:bg-primary-600 group-hover:text-white transition-colors duration-300 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    </div>
                    <h3 class="text-3xl md:text-4xl font-bold text-primary-600 mb-2">2.650</h3>
                    <p class="text-slate-600 font-medium">Laki-laki</p>
                </div>

                <!-- Kartu 3: Perempuan -->
                <div class="col-span-1 md:col-span-1 lg:col-span-2 group bg-slate-50 p-6 md:p-8 rounded-2xl border border-slate-100 text-center shadow-sm hover:shadow-xl hover:-translate-y-2 hover:border-primary-200 transition-all duration-300 cursor-default">
                    <div class="w-14 h-14 mx-auto bg-primary-100 text-primary-600 group-hover:bg-primary-600 group-hover:text-white transition-colors duration-300 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4a4 4 0 100 8 4 4 0 000-8zM2 20h20M12 12v8"></path></svg>
                    </div>
                    <h3 class="text-3xl md:text-4xl font-bold text-primary-600 mb-2">2.584</h3>
                    <p class="text-slate-600 font-medium">Perempuan</p>
                </div>

                <!-- Kartu 4: Kartu Keluarga (Otomatis Rata Tengah di Desktop via lg:col-start-2) -->
                <div class="col-span-1 md:col-span-1 lg:col-start-2 lg:col-span-2 group bg-slate-50 p-6 md:p-8 rounded-2xl border border-slate-100 text-center shadow-sm hover:shadow-xl hover:-translate-y-2 hover:border-primary-200 transition-all duration-300 cursor-default">
                    <div class="w-14 h-14 mx-auto bg-primary-100 text-primary-600 group-hover:bg-primary-600 group-hover:text-white transition-colors duration-300 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    </div>
                    <h3 class="text-3xl md:text-4xl font-bold text-primary-600 mb-2">1.379</h3>
                    <p class="text-slate-600 font-medium">Kartu Keluarga</p>
                </div>

                <!-- Kartu 5: WNA -->
                <div class="col-span-1 md:col-span-1 lg:col-span-2 group bg-slate-50 p-6 md:p-8 rounded-2xl border border-slate-100 text-center shadow-sm hover:shadow-xl hover:-translate-y-2 hover:border-primary-200 transition-all duration-300 cursor-default">
                    <div class="w-14 h-14 mx-auto bg-primary-100 text-primary-600 group-hover:bg-primary-600 group-hover:text-white transition-colors duration-300 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path></svg>
                    </div>
                    <h3 class="text-3xl md:text-4xl font-bold text-primary-600 mb-2">14</h3>
                    <p class="text-slate-600 font-medium">WNA</p>
                </div>

            </div>
        </div>
    </section>
    <!-- ================= END DEMOGRAFI SECTION ================= -->

    <!-- ================= PETA WILAYAH SECTION ================= -->
    <section id="peta" class="py-24 bg-slate-50 scroll-mt-20">
        <div class="container mx-auto px-4 md:px-8">
            <div class="text-center max-w-3xl mx-auto mb-12">
                <span class="text-primary-600 font-semibold tracking-wider text-sm uppercase">Lokasi</span>
                <h2 class="text-3xl font-bold text-slate-800 mt-2 mb-4">Peta Wilayah & Wisata</h2>
                <p class="text-slate-600">Temukan lokasi Kantor Kelurahan Manembo-Nembo serta titik penting di sekitar wilayah kami.</p>
            </div>
            
            <div class="w-full h-[400px] md:h-[500px] rounded-2xl overflow-hidden shadow-lg border border-slate-200">
                <!-- Iframe Google Maps untuk Manembo-Nembo -->
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.4682004245997!2d125.1091515!3d1.4426505!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3287042a9a5f5733%3A0xc3f6a27e0be3898!2sManembo-Nembo%2C%20Kec.%20Matuari%2C%20Kota%20Bitung%2C%20Sulawesi%20Utara!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid" 
                    width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </section>
    <!-- ================= END PETA WILAYAH ================= -->

    <!-- ================= BERITA SECTION ================= -->
    <section id="berita" class="pt-24 pb-12 bg-white relative scroll-mt-20">
        <div class="container mx-auto px-4 md:px-8">
            
            <!-- Berita Terkini -->
            <div class="mb-12">
                <div class="flex justify-between items-end mb-10">
                    <div>
                        <span class="text-primary-600 font-semibold tracking-wider text-sm uppercase">Seputar Wilayah</span>
                        <h2 class="text-3xl md:text-4xl font-bold text-slate-800 mt-2">Berita Kelurahan</h2>
                    </div>
                    <a href="#" class="hidden md:inline-flex items-center gap-2 text-primary-600 font-semibold hover:text-primary-700 transition-colors">
                        Lihat Semua Berita <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Kartu Berita -->
                    <article class="bg-slate-50 rounded-2xl shadow-sm border border-slate-100 overflow-hidden hover:shadow-lg transition-shadow">
                        <img src="{{ asset('images/headertemporary.jpeg') }}" alt="Kegiatan" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <p class="text-sm text-slate-500 mb-3">12 Agustus 2026</p>
                            <h3 class="text-xl font-bold text-slate-800 mb-3 leading-snug hover:text-primary-600 cursor-pointer transition-colors">Kerja Bakti Rutin Warga Manembo-Nembo</h3>
                            <p class="text-slate-600 mb-4 line-clamp-3">Warga kelurahan mengadakan kegiatan bersih-bersih lingkungan sebagai upaya mencegah banjir di musim penghujan...</p>
                            <a href="#" class="text-primary-600 font-semibold hover:underline">Baca selengkapnya</a>
                        </div>
                    </article>
                    <article class="bg-slate-50 rounded-2xl shadow-sm border border-slate-100 overflow-hidden hover:shadow-lg transition-shadow">
                        <img src="{{ asset('images/headertemporary.jpeg') }}" alt="Kegiatan" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <p class="text-sm text-slate-500 mb-3">05 Agustus 2026</p>
                            <h3 class="text-xl font-bold text-slate-800 mb-3 leading-snug hover:text-primary-600 cursor-pointer transition-colors">Penyaluran Bantuan Sosial Kepada Lansia</h3>
                            <p class="text-slate-600 mb-4 line-clamp-3">Pemerintah kelurahan mendistribusikan paket bantuan sembako kepada warga lanjut usia di wilayah setempat...</p>
                            <a href="#" class="text-primary-600 font-semibold hover:underline">Baca selengkapnya</a>
                        </div>
                    </article>
                    <article class="bg-slate-50 rounded-2xl shadow-sm border border-slate-100 overflow-hidden hover:shadow-lg transition-shadow">
                        <img src="{{ asset('images/headertemporary.jpeg') }}" alt="Kegiatan" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <p class="text-sm text-slate-500 mb-3">28 Juli 2026</p>
                            <h3 class="text-xl font-bold text-slate-800 mb-3 leading-snug hover:text-primary-600 cursor-pointer transition-colors">Rapat Koordinasi Persiapan HUT RI</h3>
                            <p class="text-slate-600 mb-4 line-clamp-3">Segenap perangkat SOTK kelurahan beserta tokoh masyarakat berkumpul membahas agenda perayaan 17 Agustus...</p>
                            <a href="#" class="text-primary-600 font-semibold hover:underline">Baca selengkapnya</a>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>
    <!-- ================= END BERITA SECTION ================= -->

    <!-- ================= GALERI SECTION ================= -->
    <section id="galeri" class="pb-24 pt-12 bg-white relative scroll-mt-20">
        <div class="container mx-auto px-4 md:px-8">
            <div class="pt-10 border-t border-slate-200">
                <div class="text-center max-w-3xl mx-auto mb-12">
                    <span class="text-primary-600 font-semibold tracking-wider text-sm uppercase">Dokumentasi</span>
                    <h2 class="text-3xl font-bold text-slate-800 mt-2">Galeri Kelurahan</h2>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-10">
                    <div class="overflow-hidden rounded-xl bg-slate-200 aspect-square">
                        <img src="{{ asset('images/headertemporary.jpeg') }}" alt="Galeri 1" class="w-full h-full object-cover hover:scale-110 transition-transform duration-500">
                    </div>
                    <div class="overflow-hidden rounded-xl bg-slate-200 aspect-square">
                        <img src="{{ asset('images/headertemporary.jpeg') }}" alt="Galeri 2" class="w-full h-full object-cover hover:scale-110 transition-transform duration-500">
                    </div>
                    <div class="overflow-hidden rounded-xl bg-slate-200 aspect-square">
                        <img src="{{ asset('images/headertemporary.jpeg') }}" alt="Galeri 3" class="w-full h-full object-cover hover:scale-110 transition-transform duration-500">
                    </div>
                    <div class="overflow-hidden rounded-xl bg-slate-200 aspect-square">
                        <img src="{{ asset('images/headertemporary.jpeg') }}" alt="Galeri 4" class="w-full h-full object-cover hover:scale-110 transition-transform duration-500">
                    </div>
                </div>

                <!-- Tombol Lihat Semua Foto -->
                <div class="text-center mt-8">
                    <a href="#" class="inline-flex items-center gap-2 px-8 py-3 bg-white border border-slate-200 text-primary-600 font-semibold rounded-full hover:bg-slate-50 hover:border-primary-300 transition-all shadow-sm">
                        Lihat Semua Foto
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- ================= END GALERI SECTION ================= -->

    <!-- ================= FOOTER ================= -->
    <footer class="bg-slate-900 text-white pt-12 md:pt-16 pb-8 border-t-4 border-primary-500">
        <div class="container mx-auto px-4 md:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-0 md:gap-12 mb-8 md:mb-12">
                
                <!-- Kolom 1: Brand & Alamat Lengkap -->
                <div class="mb-8 md:mb-0">
                    <div class="flex items-center gap-3 mb-6">
                        <img src="{{ asset('images/logobitung.png') }}" alt="Logo Bitung" class="h-14 md:h-16 w-auto p-1">
                        <div>
                            <h4 class="font-bold text-base md:text-lg leading-tight text-white">Pemerintah Kelurahan<br>Manembo-Nembo</h4>
                        </div>
                    </div>
                    <div class="text-slate-300 text-sm leading-relaxed space-y-1">
                        <p>Jl. J. Sumampouw</p>
                        <p>Kelurahan Manembo-Nembo, Kecamatan Matuari, Kota Bitung</p>
                        <p>Provinsi Sulawesi Utara, 95544</p>
                    </div>
                </div>

                <!-- Kolom 2: Hubungi Kami -->
                <div class="border-t border-slate-800 md:border-none pt-4 md:pt-0">
                    <button class="footer-toggle w-full flex justify-between items-center md:pointer-events-none focus:outline-none mb-0 md:mb-6">
                        <h5 class="text-base md:text-lg font-bold text-slate-100 pointer-events-none">Hubungi Kami</h5>
                        <svg class="w-5 h-5 md:hidden text-slate-400 transition-transform transform pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div class="footer-content hidden md:block mt-4 md:mt-0 pb-6 md:pb-0">
                        <ul class="text-slate-300 text-sm space-y-4 mb-6 md:mb-8">
                            <li class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-primary-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                                <a href="tel:+6285171650644" class="hover:text-white transition-colors">085171650644</a>
                            </li>
                            <li class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-primary-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                <a href="mailto:kel.manembonembo@gmail.com" class="hover:text-white transition-colors">kel.manembonembo@gmail.com</a>
                            </li>
                        </ul>

                        <div class="flex gap-3">
                            <a href="https://www.facebook.com/share/1LnST9dViy/" target="_blank" rel="noopener noreferrer" class="w-8 h-8 rounded-md bg-transparent border border-slate-600 flex items-center justify-center text-slate-300 hover:bg-primary-600 hover:border-primary-600 hover:text-white transition-all">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"/></svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Kolom 3: Jelajahi (Tautan Eksternal) -->
                <div class="border-t border-slate-800 md:border-none pt-4 md:pt-0">
                    <button class="footer-toggle w-full flex justify-between items-center md:pointer-events-none focus:outline-none mb-0 md:mb-6">
                        <h5 class="text-base md:text-lg font-bold text-slate-100 pointer-events-none">Jelajahi</h5>
                        <svg class="w-5 h-5 md:hidden text-slate-400 transition-transform transform pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div class="footer-content hidden md:block mt-4 md:mt-0 pb-6 md:pb-0">
                        <ul class="text-slate-300 text-sm space-y-3 font-medium">
                            <li><a href="https://www.bitungkota.go.id/" class="hover:text-primary-400 underline decoration-slate-500 hover:decoration-primary-400 transition-colors block py-1 md:py-0">Website Pemkot Bitung</a></li>
                            <li><a href="https://www.kemendagri.go.id/" class="hover:text-primary-400 underline decoration-slate-500 hover:decoration-primary-400 transition-colors block py-1 md:py-0">Website Kemendagri</a></li>
                            <li><a href="https://www.kemendesa.go.id/" class="hover:text-primary-400 underline decoration-slate-500 hover:decoration-primary-400 transition-colors block py-1 md:py-0">Website Kemendesa</a></li>
                        </ul>
                    </div>
                </div>

            </div>

            <!-- Copyright -->
            <div class="pt-6 border-t border-slate-800 text-center text-xs md:text-sm text-slate-500">
                <p>&copy; 2026 PUNYA MICHEL.</p>
            </div>
        </div>
    </footer>
    <!-- ================= END FOOTER ================= -->

    <!-- Vanilla JS untuk Interaksi UI -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // --- Sticky Navbar Logic ---
            const navbar = document.getElementById('navbar');
            window.addEventListener('scroll', function() {
                if (window.scrollY > 50) {
                    navbar.classList.remove('bg-transparent', 'py-4');
                    navbar.classList.add('bg-primary-700', 'shadow-md', 'py-2');
                } else {
                    navbar.classList.add('bg-transparent', 'py-4');
                    navbar.classList.remove('bg-primary-700', 'shadow-md', 'py-2');
                }
            });
            window.dispatchEvent(new Event('scroll'));

            // --- Dinamis Tanggal Demografi ---
            const periodEl = document.getElementById('dynamic-period');
            if (periodEl) {
                const date = new Date();
                const months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                periodEl.textContent = `${months[date.getMonth()]} ${date.getFullYear()}`;
            }

            // --- Mobile Menu Toggle ---
            const mobileBtn = document.getElementById('mobile-menu-btn');
            const navLinks = document.getElementById('nav-links');
            
            mobileBtn.addEventListener('click', function() {
                navLinks.classList.toggle('hidden');
                navLinks.classList.toggle('flex');
            });

            // Otomatis menutup mobile menu ketika salah satu link diklik
            const navItems = navLinks.querySelectorAll('a');
            navItems.forEach(item => {
                item.addEventListener('click', () => {
                    if (window.innerWidth < 768) {
                        navLinks.classList.add('hidden');
                        navLinks.classList.remove('flex');
                    }
                });
            });

            // --- Footer Accordion Mobile ---
            const footerToggles = document.querySelectorAll('.footer-toggle');
            footerToggles.forEach(toggle => {
                toggle.addEventListener('click', () => {
                    if (window.innerWidth < 768) {
                        const content = toggle.nextElementSibling;
                        const icon = toggle.querySelector('svg');
                        content.classList.toggle('hidden');
                        icon.classList.toggle('rotate-180');
                    }
                });
            });
        });
    </script>
</body>
</html>