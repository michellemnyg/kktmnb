Nama Proyek: Website Kelurahan Manembo-Nembo
Tech Stack: Laravel (Backend), Vite + Tailwind CSS (Frontend), MySQL (Database), Hostinger (Deployment)
Tujuan Proyek: Menyediakan portal informasi satu pintu (Landing Page) untuk masyarakat dan sistem pendataan demografi internal (Admin Panel) bagi pengurus Kelurahan Manembo-Nembo.

1. Roles & Permissions
Public Visitor: Hanya bisa melihat Landing Page.
Superadmin (Tunggal): Memiliki akses penuh ke Admin Panel untuk memperbarui angka demografi, SOTK, dan mengatur konten galeri.

2. Spesifikasi Fitur Utama
A. Modul Autentikasi (Login Page)
Akses: Melalui URL spesifik (misal: /admin/login).
Kredensial: NIP (Nomor Induk Pegawai) sebagai username dan Password.
Keamanan: Sesi pengguna (User Session) otomatis kedaluwarsa dalam 2 jam (120 menit) inaktivitas.
Tampilan: Terpusat, profesional, dengan logo Bitung/Kelurahan.

B. Modul Admin Panel
UI/UX: Blue-themed, navbar dan struktur layout mengadopsi gaya admin panel ECON11.
Dashboard Overview:
Kartu ringkasan angka administrasi penduduk.
Grafik infografis mendetail (opsional per bulan/tahun).
Manajemen Data Warga (Statistik):
Form input manual untuk memasukkan/memperbarui angka bulat per bulan.
Kategori data: Gender, Usia, Pekerjaan, Pendidikan, Perkawinan, Agama, Mutasi Penduduk, Kepala Keluarga.

C. Modul Landing Page (Single Page Application Style)
Desain Utama: Blue-themed, satu halaman panjang dengan navigasi jangkar (scroll to section).
Header / Navbar: Sticky navbar (transisi dari transparan ke solid biru). Berisi Logo Bitung, teks "Kelurahan Manembo-Nembo", "Kabupaten/Kota". Menu navigasi: Home, Profil, Demografi, Peta, Berita, Wisata, Galeri.

Section 1: Hero & Profil
Foto statis Bapak Lurah dan latar belakang gedung kantor.
Sambutan Lurah: Foto formal, Nama, Jabatan (Teks sambutan opsional).
Visi dan Misi kelurahan.

Section 2: SOTK (Struktur Organisasi)
Menampilkan list perangkat kelurahan (Nama Lengkap, Gelar, Jabatan).
Constraint: Tanpa foto (kecuali Lurah) dan tanpa bagan hierarki visual.
Jika daftar kepengurusan sangat panjang, gunakan logika slicing page (tombol "Lihat Seluruh Struktur" yang membuka halaman/modal baru, sementara di Landing Page hanya pimpinan inti).

Section 3: Demografi & Administrasi Penduduk
Tampilan kartu-kartu statistik (terhubung langsung/tersinkronisasi dengan input di Admin Panel).
Menampilkan: Total Penduduk, Jumlah KK, Penduduk Sementara, Laki-laki, Perempuan, Mutasi Penduduk.

Section 4: Media (Galeri, Berita, Peta)
Berita Kelurahan (Sumber untuk galeri foto di halaman Home).
Galeri Kelurahan dengan fitur pagination.
Peta wilayah kelurahan terintegrasi dengan Google Maps.
Wisata Kelurahan (Opsional, di-link ke Google Maps jika ada).

Section 5: Footer
Logo dan Nama Pemerintahan.
Alamat lengkap (beserta kode pos dan wilayah).
Hubungi Kami (No HP, Email, Ikon Media Sosial).
Daftar Nomor Telepon Penting (Kesehatan, Keamanan, Darurat).