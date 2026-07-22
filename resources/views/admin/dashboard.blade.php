@extends('layouts.admin')

@section('title', 'Dashboard Overview')

@section('content')
<div class="space-y-8 animate-fade-in-up">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-4 border-b border-slate-200 pb-5">
        <div>
            <h2 class="text-2xl font-extrabold text-slate-800">Analisis Kependudukan</h2>
            <p class="text-slate-500 text-sm mt-1">Pantau pergerakan data statistik warga secara berkala.</p>
        </div>
        
        <div class="flex items-center gap-2">
            <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Periode:</span>
            <select class="bg-white border border-slate-200 text-primary-700 font-semibold py-2 px-3 rounded-lg focus:outline-none focus:border-primary-500 shadow-sm cursor-pointer" id="dashboard-month"></select>
            <select class="bg-white border border-slate-200 text-primary-700 font-semibold py-2 px-3 rounded-lg focus:outline-none focus:border-primary-500 shadow-sm cursor-pointer" id="dashboard-year"></select>
        </div>
    </div>

    <!-- Cards Statistik -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white p-6 rounded-2xl border-l-4 border-l-primary-500 shadow-sm hover:shadow-md transition-shadow">
            <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Jumlah Penduduk</p>
            <h3 class="text-3xl font-extrabold text-slate-800">5.829</h3>
            <span class="text-xs text-primary-600 font-semibold mt-2 inline-block">WNI: 5.829 | WNA: 0</span>
        </div>
        <div class="bg-white p-6 rounded-2xl border-l-4 border-l-emerald-500 shadow-sm hover:shadow-md transition-shadow">
            <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Wajib KK</p>
            <h3 class="text-3xl font-extrabold text-slate-800">1.930</h3>
            <span class="text-xs text-emerald-600 font-semibold mt-2 inline-block">Memiliki KK: 1.379</span>
        </div>
        <div class="bg-white p-6 rounded-2xl border-l-4 border-l-amber-500 shadow-sm hover:shadow-md transition-shadow">
            <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Wajib KTP</p>
            <h3 class="text-3xl font-extrabold text-slate-800">3.843</h3>
            <span class="text-xs text-amber-600 font-semibold mt-2 inline-block">Memiliki: 2.368</span>
        </div>
        <div class="bg-white p-6 rounded-2xl border-l-4 border-l-rose-500 shadow-sm hover:shadow-md transition-shadow">
            <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Mutasi Data</p>
            <h3 class="text-3xl font-extrabold text-slate-800">33</h3>
            <span class="text-xs text-rose-600 font-semibold mt-2 inline-block">Datang: 19 | Pindah: 14</span>
        </div>
    </div>

    <!-- Detail Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
            <h4 class="font-bold text-slate-800 mb-4 flex items-center justify-between border-b border-slate-100 pb-3">
                <span>Penduduk Menurut Agama</span>
                <span class="text-xs bg-primary-50 text-primary-600 px-2.5 py-1 rounded-lg font-semibold">Total: 5.829</span>
            </h4>
            <ul class="space-y-3 text-sm text-slate-600">
                <li class="flex justify-between items-center pb-2 border-b border-slate-50"><span>Kristen</span> <strong class="text-slate-800">3.812</strong></li>
                <li class="flex justify-between items-center pb-2 border-b border-slate-50"><span>Katholik</span> <strong class="text-slate-800">677</strong></li>
                <li class="flex justify-between items-center pb-2 border-b border-slate-50"><span>Islam</span> <strong class="text-slate-800">1.333</strong></li>
                <li class="flex justify-between items-center"><span>Hindu / Lainnya</span> <strong class="text-slate-800">7</strong></li>
            </ul>
        </div>
        <!-- Tambahkan card visualisasi lain jika perlu (Pendidikan, Bangunan, dll) dari kode sebelumnya -->
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const date = new Date();
        const months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        
        const dashMonth = document.getElementById('dashboard-month');
        const dashYear = document.getElementById('dashboard-year');
        
        months.forEach((m, i) => {
            let val = (i+1).toString().padStart(2, '0');
            let opt = new Option(m, val);
            if(i === date.getMonth()) opt.selected = true; 
            dashMonth.add(opt);
        });
        
        let curYear = date.getFullYear();
        dashYear.add(new Option(curYear, curYear));
        dashYear.add(new Option(curYear-1, curYear-1));
    });
</script>
@endpush