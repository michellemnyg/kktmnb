<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') - Kelurahan Manembo-Nembo</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 text-slate-800 font-sans antialiased">
    
    <div class="min-h-screen bg-slate-50 flex">
        
        <!-- ================= OVERLAY BACKDROP ================= -->
        <div id="sidebar-backdrop" class="fixed inset-0 bg-slate-900/30 backdrop-blur-sm z-40 hidden transition-opacity duration-300 opacity-0" onclick="toggleSidebar()"></div>

        <!-- ================= SIDEBAR (OFF-CANVAS DRAWER) ================= -->
        <aside id="sidebar" class="fixed inset-y-0 left-0 z-50 w-64 bg-white border-r border-slate-200 transform transition-transform duration-300 ease-out shadow-2xl flex flex-col -translate-x-full">
            
            <!-- Sidebar Header -->
            <div class="flex items-center justify-between px-5 h-16 border-b border-slate-100 shrink-0">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('images/logobitung.png') }}" alt="Logo Bitung" class="h-8 w-auto drop-shadow-sm" />
                    <span class="font-bold text-slate-700 tracking-wide text-sm">
                        Manembo-Nembo
                    </span>
                </div>
                <button class="text-slate-400 hover:text-primary-600 transition p-1.5 rounded-md hover:bg-slate-50 border border-transparent hover:border-slate-200" onclick="toggleSidebar()" aria-label="Tutup sidebar">
                    <!-- Icon Menu (Tiga Garis) -->
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </button>
            </div>

            <!-- Sidebar Navigation -->
            <nav class="px-4 py-6 space-y-2 flex-1 overflow-y-auto">
                <p class="px-2 text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-3">Menu Utama</p>

                <!-- Menu: Dashboard -->
                <a href="/admin/dashboard" class="flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-semibold transition-all {{ request()->is('admin/dashboard') ? 'bg-primary-50 text-primary-700 border-l-4 border-primary-600 shadow-sm' : 'text-slate-600 hover:bg-slate-50 hover:text-primary-600' }}">
                    <!-- Icon LayoutDashboard -->
                    <svg class="w-5 h-5 {{ request()->is('admin/dashboard') ? 'text-primary-600' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                    Dashboard
                </a>

                <!-- Menu: Data Management -->
                <a href="/admin/management" class="flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-semibold transition-all {{ request()->is('admin/management') ? 'bg-primary-50 text-primary-700 border-l-4 border-primary-600 shadow-sm' : 'text-slate-600 hover:bg-slate-50 hover:text-primary-600' }}">
                    <!-- Icon Users/Database -->
                    <svg class="w-5 h-5 {{ request()->is('admin/management') ? 'text-primary-600' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    Data Management
                </a>
            </nav>

            <!-- Sidebar Footer (Logout) -->
            <div class="w-full border-t border-slate-100 p-4 bg-white shrink-0">
                <a href="/" class="flex w-full items-center gap-3 text-sm font-bold text-red-500 hover:text-red-600 hover:bg-red-50 rounded-xl px-4 py-2.5 transition-colors">
                    <!-- Icon LogOut -->
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                    Keluar
                </a>
            </div>
        </aside>

        <!-- ================= MAIN CONTENT ================= -->
        <div class="flex-1 flex flex-col min-w-0 transition-all duration-300 h-screen overflow-hidden">
            
            <!-- Header Sticky Navbar -->
            <header class="sticky top-0 z-30 h-16 bg-white/90 backdrop-blur-md border-b border-slate-200 flex items-center justify-between px-4 sm:px-6 shadow-sm shrink-0">
                <div class="flex items-center gap-4">
                    <button class="text-slate-500 hover:text-primary-600 transition p-1.5 bg-white rounded-lg border border-slate-200 shadow-sm hover:shadow" onclick="toggleSidebar()" aria-label="Buka sidebar">
                        <!-- Icon Menu -->
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                    </button>
                    <h1 class="text-xl font-extrabold text-slate-800 tracking-tight">
                        @yield('title')
                    </h1>
                </div>

                <!-- Profil Info -->
                <div class="flex items-center gap-3 text-right">
                    <div class="hidden sm:block">
                        <!-- (Nanti diganti dengan Auth::user()->name) -->
                        <div class="text-sm font-bold text-slate-800">Johnny Kondo, S.A.P.</div> 
                        <div class="text-[10px] font-extrabold uppercase tracking-widest mt-0.5 text-primary-600">
                            Superadmin
                        </div>
                    </div>
                    <!-- Avatar Lingkaran -->
                    <div class="w-10 h-10 rounded-full bg-gradient-to-br from-primary-500 to-primary-600 shadow-md flex items-center justify-center text-white font-bold text-sm border-2 border-white ring-2 ring-slate-100">
                        JK
                    </div>
                </div>
            </header>

            <!-- Scrollable Content Area -->
            <main class="flex-1 p-4 sm:p-6 lg:p-8 overflow-y-auto">
                @yield('content')
            </main>

        </div>
    </div>

    <!-- Script Logika Toggle Off-Canvas Sidebar -->
    <script>
        const sidebar = document.getElementById('sidebar');
        const backdrop = document.getElementById('sidebar-backdrop');
        let isSidebarOpen = false;

        function toggleSidebar() {
            isSidebarOpen = !isSidebarOpen;
            if (isSidebarOpen) {
                // Tampilkan Backdrop
                backdrop.classList.remove('hidden');
                // Timeout sebentar untuk memicu transisi opacity
                setTimeout(() => backdrop.classList.remove('opacity-0'), 10);
                
                // Geser Sidebar masuk
                sidebar.classList.remove('-translate-x-full');
                sidebar.classList.add('translate-x-0');
            } else {
                // Transisi Backdrop menghilang
                backdrop.classList.add('opacity-0');
                
                // Geser Sidebar keluar
                sidebar.classList.remove('translate-x-0');
                sidebar.classList.add('-translate-x-full');

                // Sembunyikan backdrop setelah transisi selesai
                setTimeout(() => backdrop.classList.add('hidden'), 300);
            }
        }
    </script>

    @stack('scripts')
</body>
</html>