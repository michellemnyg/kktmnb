<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Superadmin - Kelurahan Manembo-Nembo</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-900 text-slate-800 font-sans antialiased min-h-screen flex items-center justify-center p-4" 
      style="background-image: linear-gradient(rgba(15, 23, 42, 0.85), rgba(15, 23, 42, 0.95)), url('{{ asset('images/header.jpeg') }}'); background-size: cover; background-position: center;">

    <div class="w-full max-w-md bg-white rounded-3xl shadow-2xl border border-slate-100 overflow-hidden p-8 md:p-10 animate-fade-in-up">
        
        <!-- Header Logo & Title -->
        <div class="text-center mb-8">
            <img src="{{ asset('images/logobitung.png') }}" alt="Logo Bitung" class="h-16 w-auto mx-auto mb-4 drop-shadow">
            <h2 class="text-2xl font-bold text-slate-900">Panel Admin Kelurahan</h2>
            <p class="text-slate-500 text-sm mt-1">Silakan login menggunakan NIP Superadmin</p>
        </div>

        <!-- Form Login (Statis) -->
        <form action="#" method="POST" class="space-y-6">
            @csrf
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">NIP (Nomor Induk Pegawai)</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round5" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    </span>
                    <input type="text" name="nip" required placeholder="Masukkan NIP anda..." 
                           class="w-full pl-12 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-800 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all">
                </div>
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Password</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    </span>
                    <input type="password" name="password" required placeholder="••••••••" 
                           class="w-full pl-12 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-800 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all">
                </div>
            </div>

            <div class="flex items-center justify-between text-sm">
                <label class="flex items-center gap-2 cursor-pointer text-slate-600">
                    <input type="checkbox" class="rounded border-slate-300 text-primary-600 focus:ring-primary-500 w-4 h-4">
                    <span>Ingat saya</span>
                </label>
            </div>

            <button type="submit" class="w-full py-3.5 bg-primary-600 hover:bg-primary-700 text-white font-semibold rounded-xl shadow-lg shadow-primary-500/30 transition-all transform hover:-translate-y-0.5">
                Masuk ke Admin Panel
            </button>
        </form>

        <div class="mt-8 text-center border-t border-slate-100 pt-6">
            <p class="text-xs text-slate-500">
                &copy; 2026 PUNYA MICHEL.
            </p>
        </div>

    </div>
</body>
</html>