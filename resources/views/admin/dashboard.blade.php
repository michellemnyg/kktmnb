@extends('layouts.admin')

@section('title', 'Dashboard Overview')

@section('content')
<div class="space-y-6 md:space-y-8 animate-fade-in-up">
    
    <!-- ================= HEADER & FILTER ================= -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-4 border-b border-slate-200 pb-5">
        <div>
            <h2 class="text-2xl font-extrabold text-slate-800">Analisis Kependudukan Terpadu</h2>
            <p class="text-slate-500 text-sm mt-1">Ringkasan statistik Section I - XII yang terhubung dengan Landing Page.</p>
        </div>
        
        <div class="flex items-center gap-2">
            <span class="text-xs font-bold text-slate-400 uppercase tracking-wider hidden sm:inline-block">Periode:</span>
            <select class="bg-white border border-slate-200 text-primary-700 font-semibold py-2 px-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 shadow-sm cursor-pointer text-sm" id="dashboard-month"></select>
            <select class="bg-white border border-slate-200 text-primary-700 font-semibold py-2 px-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 shadow-sm cursor-pointer text-sm" id="dashboard-year"></select>
        </div>
    </div>

    <!-- ================= LAYER 1: HIGHLIGHT DATA (TERHUBUNG KE LANDING PAGE) ================= -->
    <!-- Grid 5 Kolom: Total, Laki-laki, Perempuan, WNA, Jumlah KK -->
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4 md:gap-6">
        
        <!-- I. Total Penduduk -->
        <div class="col-span-2 md:col-span-1 lg:col-span-1 bg-white p-6 rounded-2xl border-t-4 border-t-primary-500 shadow-sm hover:shadow-md transition-shadow flex flex-col justify-center items-center text-center">
            <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-1">I. Total Penduduk</p>
            <h3 class="text-4xl font-extrabold text-primary-600">5.829</h3>
            <p class="text-xs font-semibold text-slate-500 mt-1">Jiwa WNI</p>
        </div>

        <!-- I. Laki-Laki -->
        <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition-shadow">
            <div class="w-10 h-10 rounded-full bg-blue-50 text-blue-500 flex items-center justify-center mb-3">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
            </div>
            <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-1">Laki-Laki</p>
            <h3 class="text-2xl font-extrabold text-slate-800">2.937</h3>
        </div>

        <!-- I. Perempuan -->
        <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition-shadow">
            <div class="w-10 h-10 rounded-full bg-rose-50 text-rose-500 flex items-center justify-center mb-3">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4a4 4 0 100 8 4 4 0 000-8zM2 20h20M12 12v8"></path></svg>
            </div>
            <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-1">Perempuan</p>
            <h3 class="text-2xl font-extrabold text-slate-800">2.892</h3>
        </div>

        <!-- I. WNA -->
        <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition-shadow">
            <div class="w-10 h-10 rounded-full bg-slate-100 text-slate-500 flex items-center justify-center mb-3">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path></svg>
            </div>
            <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-1">Penduduk WNA</p>
            <h3 class="text-2xl font-extrabold text-slate-800">0</h3>
        </div>

        <!-- XI. Jumlah KK -->
        <div class="bg-white p-6 rounded-2xl border-b-4 border-b-emerald-500 shadow-sm hover:shadow-md transition-shadow flex flex-col justify-center">
            <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-1">XI. Jumlah KK</p>
            <h3 class="text-2xl font-extrabold text-slate-800">1.379</h3>
            <span class="text-[10px] font-bold text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded inline-block mt-2 w-max">Keluarga Terdata</span>
        </div>
    </div>

    <!-- ================= LAYER 2: VISUALISASI (UMUR & GENDER) ================= -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 md:gap-6">
        
        <!-- Chart: Distribusi Umur -->
        <div class="lg:col-span-2 bg-white p-6 rounded-2xl border border-slate-100 shadow-sm flex flex-col">
            <div class="flex justify-between items-center mb-6">
                <h3 class="font-bold text-slate-800 text-base">Distribusi Jumlah Jiwa Menurut Umur</h3>
            </div>
            <div class="flex-1 relative w-full h-64 md:h-80">
                <canvas id="ageChart"></canvas>
            </div>
        </div>

        <!-- Chart: Proporsi Gender -->
        <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm flex flex-col">
            <div class="mb-4">
                <h3 class="font-bold text-slate-800 text-base">Proporsi Gender Penduduk</h3>
            </div>
            <div class="relative w-full flex-1 min-h-[200px] flex items-center justify-center">
                <canvas id="genderChart"></canvas>
            </div>
            <div class="mt-4 flex justify-between px-4 text-sm font-semibold border-t border-slate-100 pt-4">
                <div class="flex flex-col items-center">
                    <span class="text-xs text-slate-500">Laki-laki</span>
                    <span class="text-primary-600 text-lg">2.937</span>
                </div>
                <div class="flex flex-col items-center">
                    <span class="text-xs text-slate-500">Perempuan</span>
                    <span class="text-rose-500 text-lg">2.892</span>
                </div>
            </div>
        </div>
    </div>

    <!-- ================= LAYER 3: ADMINISTRASI & MUTASI ================= -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 md:gap-6">
        
        <!-- II. Mutasi Data -->
        <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
            <h3 class="font-bold text-slate-800 text-sm mb-4">II. Mutasi Data Penduduk</h3>
            <div class="grid grid-cols-2 gap-3">
                <div class="bg-emerald-50/50 border border-emerald-100 p-3 rounded-xl text-center">
                    <p class="text-[10px] uppercase font-bold text-emerald-600 mb-1">Lahir</p>
                    <p class="font-bold text-slate-800 text-xl">6</p>
                </div>
                <div class="bg-rose-50/50 border border-rose-100 p-3 rounded-xl text-center">
                    <p class="text-[10px] uppercase font-bold text-rose-600 mb-1">Meninggal</p>
                    <p class="font-bold text-slate-800 text-xl">2</p>
                </div>
                <div class="bg-primary-50/50 border border-primary-100 p-3 rounded-xl text-center">
                    <p class="text-[10px] uppercase font-bold text-primary-600 mb-1">Datang</p>
                    <p class="font-bold text-slate-800 text-xl">19</p>
                </div>
                <div class="bg-amber-50/50 border border-amber-100 p-3 rounded-xl text-center">
                    <p class="text-[10px] uppercase font-bold text-amber-600 mb-1">Pindah</p>
                    <p class="font-bold text-slate-800 text-xl">14</p>
                </div>
            </div>
        </div>

        <!-- IV. Wajib KTP -->
        <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm flex flex-col justify-center">
            <h3 class="font-bold text-slate-800 text-sm mb-5">IV. Status Wajib KTP</h3>
            <div class="space-y-4">
                <div>
                    <div class="flex justify-between text-xs font-semibold mb-1">
                        <span class="text-slate-600">Memiliki KTP</span><span class="text-emerald-600">2.368 Jiwa</span>
                    </div>
                    <div class="w-full bg-slate-100 rounded-full h-2"><div class="bg-emerald-500 h-2 rounded-full" style="width: 61.6%"></div></div>
                </div>
                <div>
                    <div class="flex justify-between text-xs font-semibold mb-1">
                        <span class="text-slate-600">Belum Memiliki</span><span class="text-amber-600">1.475 Jiwa</span>
                    </div>
                    <div class="w-full bg-slate-100 rounded-full h-2"><div class="bg-amber-500 h-2 rounded-full" style="width: 38.4%"></div></div>
                </div>
                <p class="text-[10px] font-bold text-slate-400 uppercase text-center mt-2">Total Wajib KTP: 3.843 Jiwa</p>
            </div>
        </div>

        <!-- III. Wajib KK -->
        <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm flex flex-col justify-center">
            <h3 class="font-bold text-slate-800 text-sm mb-5">III. Status Wajib KK</h3>
            <div class="space-y-4">
                <div>
                    <div class="flex justify-between text-xs font-semibold mb-1">
                        <span class="text-slate-600">Memiliki KK</span><span class="text-primary-600">1.379 Keluarga</span>
                    </div>
                    <div class="w-full bg-slate-100 rounded-full h-2"><div class="bg-primary-500 h-2 rounded-full" style="width: 71.4%"></div></div>
                </div>
                <div>
                    <div class="flex justify-between text-xs font-semibold mb-1">
                        <span class="text-slate-600">Belum Memiliki</span><span class="text-rose-500">551 Keluarga</span>
                    </div>
                    <div class="w-full bg-slate-100 rounded-full h-2"><div class="bg-rose-400 h-2 rounded-full" style="width: 28.6%"></div></div>
                </div>
                <p class="text-[10px] font-bold text-slate-400 uppercase text-center mt-2">Total Wajib KK: 1.930 Keluarga</p>
            </div>
        </div>
    </div>

    <!-- ================= LAYER 4: SOSIAL & PENDIDIKAN ================= -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 md:gap-6">
        
        <!-- V. Agama -->
        <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
            <h3 class="font-bold text-slate-800 text-sm mb-4">V. Distribusi Agama</h3>
            <ul class="space-y-3">
                <li class="flex justify-between items-center text-sm border-b border-slate-50 pb-2"><div class="flex items-center gap-2"><span class="w-2.5 h-2.5 rounded-full bg-blue-500"></span><span class="font-medium text-slate-600">Kristen</span></div><span class="font-bold text-slate-800">3.812</span></li>
                <li class="flex justify-between items-center text-sm border-b border-slate-50 pb-2"><div class="flex items-center gap-2"><span class="w-2.5 h-2.5 rounded-full bg-emerald-500"></span><span class="font-medium text-slate-600">Islam</span></div><span class="font-bold text-slate-800">1.333</span></li>
                <li class="flex justify-between items-center text-sm border-b border-slate-50 pb-2"><div class="flex items-center gap-2"><span class="w-2.5 h-2.5 rounded-full bg-amber-500"></span><span class="font-medium text-slate-600">Katholik</span></div><span class="font-bold text-slate-800">677</span></li>
                <li class="flex justify-between items-center text-sm"><div class="flex items-center gap-2"><span class="w-2.5 h-2.5 rounded-full bg-slate-300"></span><span class="font-medium text-slate-600">Lainnya</span></div><span class="font-bold text-slate-800">7</span></li>
            </ul>
        </div>

        <!-- VI. Pendidikan (Progress Bars) -->
        <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
            <h3 class="font-bold text-slate-800 text-sm mb-5">VI. Tingkat Pendidikan</h3>
            <div class="space-y-4">
                <div>
                    <div class="flex justify-between text-xs font-semibold mb-1"><span class="text-slate-600">SD / Sederajat</span><span class="text-slate-800">623</span></div>
                    <div class="w-full bg-slate-100 rounded-full h-1.5"><div class="bg-blue-400 h-1.5 rounded-full" style="width: 41.3%"></div></div>
                </div>
                <div>
                    <div class="flex justify-between text-xs font-semibold mb-1"><span class="text-slate-600">SMP / Sederajat</span><span class="text-slate-800">324</span></div>
                    <div class="w-full bg-slate-100 rounded-full h-1.5"><div class="bg-indigo-400 h-1.5 rounded-full" style="width: 21.5%"></div></div>
                </div>
                <div>
                    <div class="flex justify-between text-xs font-semibold mb-1"><span class="text-slate-600">Perguruan Tinggi</span><span class="text-slate-800">261</span></div>
                    <div class="w-full bg-slate-100 rounded-full h-1.5"><div class="bg-fuchsia-500 h-1.5 rounded-full" style="width: 17.3%"></div></div>
                </div>
                <div>
                    <div class="flex justify-between text-xs font-semibold mb-1"><span class="text-slate-600">SMA / Sederajat</span><span class="text-slate-800">230</span></div>
                    <div class="w-full bg-slate-100 rounded-full h-1.5"><div class="bg-violet-500 h-1.5 rounded-full" style="width: 15.2%"></div></div>
                </div>
                <div>
                    <div class="flex justify-between text-xs font-semibold mb-1"><span class="text-slate-600">TK</span><span class="text-slate-800">68</span></div>
                    <div class="w-full bg-slate-100 rounded-full h-1.5"><div class="bg-slate-400 h-1.5 rounded-full" style="width: 4.5%"></div></div>
                </div>
            </div>
        </div>

        <!-- VII. Usia Putus Sekolah -->
        <div class="bg-rose-50/50 p-6 rounded-2xl border border-rose-100 shadow-sm flex flex-col justify-center">
            <h3 class="font-bold text-rose-800 text-sm mb-4">VII. Usia Putus Sekolah</h3>
            <div class="space-y-2">
                <div class="flex justify-between text-sm bg-white px-3 py-2 rounded-lg border border-rose-100"><span class="font-medium text-slate-600">SD</span><span class="font-bold text-rose-600">179</span></div>
                <div class="flex justify-between text-sm bg-white px-3 py-2 rounded-lg border border-rose-100"><span class="font-medium text-slate-600">SMA</span><span class="font-bold text-rose-600">120</span></div>
                <div class="flex justify-between text-sm bg-white px-3 py-2 rounded-lg border border-rose-100"><span class="font-medium text-slate-600">SMP</span><span class="font-bold text-rose-600">80</span></div>
                <div class="flex justify-between text-sm bg-white px-3 py-2 rounded-lg border border-rose-100"><span class="font-medium text-slate-600">Tidak Pernah Sekolah</span><span class="font-bold text-rose-600">9</span></div>
            </div>
        </div>
    </div>

    <!-- ================= LAYER 5: EKONOMI & INFRASTRUKTUR ================= -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 md:gap-6">
        
        <!-- VIII. Pekerjaan (Top 5) -->
        <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
            <h3 class="font-bold text-slate-800 text-sm mb-4 border-b border-slate-100 pb-2">VIII. Top 5 Pekerjaan</h3>
            <ul class="space-y-3">
                <li class="flex items-center justify-between bg-slate-50 px-3 py-2 rounded-lg"><span class="text-xs font-semibold text-slate-600">1. IRT / PRT</span><span class="text-sm font-bold text-primary-600">388</span></li>
                <li class="flex items-center justify-between bg-slate-50 px-3 py-2 rounded-lg"><span class="text-xs font-semibold text-slate-600">2. Nelayan</span><span class="text-sm font-bold text-primary-600">233</span></li>
                <li class="flex items-center justify-between bg-slate-50 px-3 py-2 rounded-lg"><span class="text-xs font-semibold text-slate-600">3. Karyawan Swasta</span><span class="text-sm font-bold text-primary-600">219</span></li>
                <li class="flex items-center justify-between bg-slate-50 px-3 py-2 rounded-lg"><span class="text-xs font-semibold text-slate-600">4. Tukang</span><span class="text-sm font-bold text-primary-600">125</span></li>
                <li class="flex items-center justify-between bg-slate-50 px-3 py-2 rounded-lg"><span class="text-xs font-semibold text-slate-600">5. Buruh</span><span class="text-sm font-bold text-primary-600">124</span></li>
            </ul>
        </div>

        <!-- IX. Kondisi Bangunan -->
        <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
            <h3 class="font-bold text-slate-800 text-sm mb-4 border-b border-slate-100 pb-2">IX. Kondisi Bangunan</h3>
            <div class="flex flex-col gap-3">
                <div class="px-4 py-3 rounded-xl border border-slate-100 bg-slate-50 flex justify-between items-center">
                    <span class="text-xs text-slate-600 font-bold uppercase">Permanen</span>
                    <span class="text-lg font-bold text-primary-600">415</span>
                </div>
                <div class="px-4 py-3 rounded-xl border border-slate-100 bg-slate-50 flex justify-between items-center">
                    <span class="text-xs text-slate-600 font-bold uppercase">Semi Permanen</span>
                    <span class="text-lg font-bold text-primary-600">301</span>
                </div>
                <div class="px-4 py-3 rounded-xl border border-rose-100 bg-rose-50 flex justify-between items-center">
                    <span class="text-xs text-rose-600 font-bold uppercase">Darurat</span>
                    <span class="text-lg font-bold text-rose-600">39</span>
                </div>
            </div>
        </div>

        <!-- X. Kendaraan Bermotor -->
        <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
            <h3 class="font-bold text-slate-800 text-sm mb-4 border-b border-slate-100 pb-2">X. Kendaraan Bermotor</h3>
            <div class="grid grid-cols-2 gap-3">
                <div class="bg-slate-50 p-3 rounded-xl text-center border border-slate-100">
                    <span class="block text-xl font-bold text-slate-800">205</span>
                    <span class="text-[10px] uppercase font-bold text-slate-500">Spd Motor</span>
                </div>
                <div class="bg-slate-50 p-3 rounded-xl text-center border border-slate-100">
                    <span class="block text-xl font-bold text-slate-800">167</span>
                    <span class="text-[10px] uppercase font-bold text-slate-500">Mobil Pribadi</span>
                </div>
                <div class="bg-slate-50 p-3 rounded-xl text-center border border-slate-100">
                    <span class="block text-xl font-bold text-slate-800">48</span>
                    <span class="text-[10px] uppercase font-bold text-slate-500">Truck</span>
                </div>
                <div class="bg-slate-50 p-3 rounded-xl text-center border border-slate-100">
                    <span class="block text-xl font-bold text-slate-800">17</span>
                    <span class="text-[10px] uppercase font-bold text-slate-500">Lainnya</span>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // TANGGAL FILTER
        const date = new Date();
        const months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        const dashMonth = document.getElementById('dashboard-month');
        const dashYear = document.getElementById('dashboard-year');
        
        if(dashMonth && dashYear) {
            dashMonth.innerHTML = '';
            months.forEach((m, i) => {
                let val = (i+1).toString().padStart(2, '0');
                let opt = new Option(m, val);
                if(i === date.getMonth()) opt.selected = true; 
                dashMonth.add(opt);
            });
            dashYear.innerHTML = '';
            let curYear = date.getFullYear();
            dashYear.add(new Option(curYear, curYear));
            dashYear.add(new Option(curYear-1, curYear-1));
        }

        // CHART UMUR
        const ctxAge = document.getElementById('ageChart');
        if(ctxAge) {
            new Chart(ctxAge, {
                type: 'bar',
                data: {
                    labels: ['0-4 Thn', '5-14 Thn', '15-24 Thn', '25-34 Thn', '35-44 Thn', '45-54 Thn', '55-64 Thn', '65+ Thn'],
                    datasets: [{
                        label: 'Laki-Laki',
                        data: [188, 510, 480, 520, 490, 410, 230, 109], 
                        backgroundColor: '#3b82f6', 
                        borderRadius: 4, barPercentage: 0.8, categoryPercentage: 0.8
                    },
                    {
                        label: 'Perempuan',
                        data: [170, 495, 460, 510, 475, 430, 240, 112],
                        backgroundColor: '#fb7185', 
                        borderRadius: 4, barPercentage: 0.8, categoryPercentage: 0.8
                    }]
                },
                options: {
                    responsive: true, maintainAspectRatio: false,
                    plugins: {
                        legend: { position: 'bottom', labels: { usePointStyle: true, boxWidth: 8, font: { family: 'Inter', size: 12 } } },
                        tooltip: { mode: 'index', intersect: false, backgroundColor: 'rgba(15, 23, 42, 0.9)', padding: 10, cornerRadius: 8 }
                    },
                    scales: {
                        y: { beginAtZero: true, grid: { color: '#f1f5f9', drawBorder: false }, ticks: { font: { family: 'Inter', size: 11 }, color: '#64748b' } },
                        x: { grid: { display: false, drawBorder: false }, ticks: { font: { family: 'Inter', size: 11 }, color: '#64748b' } }
                    },
                    interaction: { mode: 'nearest', axis: 'x', intersect: false }
                }
            });
        }

        // CHART GENDER
        const ctxGender = document.getElementById('genderChart');
        if(ctxGender) {
            new Chart(ctxGender, {
                type: 'doughnut',
                data: {
                    labels: ['Laki-Laki', 'Perempuan'],
                    datasets: [{ data: [2937, 2892], backgroundColor: ['#3b82f6', '#fb7185'], borderWidth: 0, hoverOffset: 4 }]
                },
                options: {
                    responsive: true, maintainAspectRatio: false, cutout: '75%', 
                    plugins: {
                        legend: { display: false }, 
                        tooltip: {
                            backgroundColor: 'rgba(15, 23, 42, 0.9)', padding: 10, cornerRadius: 8,
                            callbacks: {
                                label: function(context) {
                                    let label = context.label || '';
                                    if (label) label += ': ';
                                    if (context.parsed !== null) label += new Intl.NumberFormat('id-ID').format(context.parsed) + ' Jiwa';
                                    return label;
                                }
                            }
                        }
                    }
                }
            });
        }
    });
</script>
@endpush