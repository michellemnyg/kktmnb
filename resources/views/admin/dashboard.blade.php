@extends('layouts.admin')

@section('title', 'Dashboard Overview')

@section('content')

@php
    $totalWniL = $data->wni_l ?? 0;
    $totalWniP = $data->wni_p ?? 0;
    $totalWni = $totalWniL + $totalWniP;
    
    $totalWna = ($data->wna_l ?? 0) + ($data->wna_p ?? 0);
    $jmlKk = $data->kk_ada ?? 0;

    $mutasiLahir = ($data->lahir_l ?? 0) + ($data->lahir_p ?? 0);
    $mutasiMati = ($data->mati_l ?? 0) + ($data->mati_p ?? 0);
    $mutasiDatang = ($data->datang_l ?? 0) + ($data->datang_p ?? 0);
    $mutasiPindah = ($data->pindah_l ?? 0) + ($data->pindah_p ?? 0);

    $ktpAda = ($data->ktp_ada_l ?? 0) + ($data->ktp_ada_p ?? 0);
    $ktpBelum = ($data->ktp_belum_l ?? 0) + ($data->ktp_belum_p ?? 0);
    $ktpTotal = $ktpAda + $ktpBelum;
    $ktpAdaPct = $ktpTotal > 0 ? round(($ktpAda / $ktpTotal) * 100, 1) : 0;
    $ktpBelumPct = $ktpTotal > 0 ? round(($ktpBelum / $ktpTotal) * 100, 1) : 0;

    $kkAda = $data->kk_ada ?? 0;
    $kkBelum = $data->kk_belum ?? 0;
    $kkTotal = $kkAda + $kkBelum;
    $kkAdaPct = $kkTotal > 0 ? round(($kkAda / $kkTotal) * 100, 1) : 0;
    $kkBelumPct = $kkTotal > 0 ? round(($kkBelum / $kkTotal) * 100, 1) : 0;

    $agamaKristen = ($data->agama_kristen_l ?? 0) + ($data->agama_kristen_p ?? 0);
    $agamaIslam = ($data->agama_islam_l ?? 0) + ($data->agama_islam_p ?? 0);
    $agamaKatolik = ($data->agama_katolik_l ?? 0) + ($data->agama_katolik_p ?? 0);
    $agamaLainnya = ($data->agama_hindu_l ?? 0) + ($data->agama_hindu_p ?? 0) + 
                    ($data->agama_buddha_l ?? 0) + ($data->agama_buddha_p ?? 0) + 
                    ($data->agama_konghucu_l ?? 0) + ($data->agama_konghucu_p ?? 0) + 
                    ($data->agama_lain_l ?? 0) + ($data->agama_lain_p ?? 0);

    $pendidikan = [
        'SD / Sederajat' => ($data->pend_sd_l ?? 0) + ($data->pend_sd_p ?? 0),
        'SMP / Sederajat' => ($data->pend_smp_l ?? 0) + ($data->pend_smp_p ?? 0),
        'Perguruan Tinggi' => ($data->pend_pt_l ?? 0) + ($data->pend_pt_p ?? 0),
        'SMA / Sederajat' => ($data->pend_sma_l ?? 0) + ($data->pend_sma_p ?? 0),
        'TK' => ($data->pend_tk_l ?? 0) + ($data->pend_tk_p ?? 0),
    ];
    arsort($pendidikan);
    $totalPend = array_sum($pendidikan);

    $putusSekolah = [
        'SD' => ($data->pts_sd_l ?? 0) + ($data->pts_sd_p ?? 0),
        'SMA' => ($data->pts_sma_l ?? 0) + ($data->pts_sma_p ?? 0),
        'SMP' => ($data->pts_smp_l ?? 0) + ($data->pts_smp_p ?? 0),
        'Tidak Pernah Sekolah' => ($data->pts_tidak_l ?? 0) + ($data->pts_tidak_p ?? 0),
    ];
    arsort($putusSekolah);

    $pekerjaan = [
        'IRT / PRT' => ($data->pkj_irt_l ?? 0) + ($data->pkj_irt_p ?? 0),
        'Nelayan' => ($data->pkj_nelayan_l ?? 0) + ($data->pkj_nelayan_p ?? 0),
        'Karyawan Swasta' => ($data->pkj_swasta_l ?? 0) + ($data->pkj_swasta_p ?? 0),
        'Tukang' => ($data->pkj_tukang_l ?? 0) + ($data->pkj_tukang_p ?? 0),
        'Buruh' => ($data->pkj_buruh_l ?? 0) + ($data->pkj_buruh_p ?? 0),
        'ASN Pegawai' => ($data->pkj_asn_pegawai_l ?? 0) + ($data->pkj_asn_pegawai_p ?? 0),
        'Wiraswasta' => ($data->pkj_wiraswasta_l ?? 0) + ($data->pkj_wiraswasta_p ?? 0),
        'Petani' => ($data->pkj_petani_l ?? 0) + ($data->pkj_petani_p ?? 0),
    ];
    arsort($pekerjaan);
    $topPekerjaan = array_slice($pekerjaan, 0, 5, true);

    $bgnPermanen = $data->bgn_permanen ?? 0;
    $bgnSemi = $data->bgn_semi ?? 0;
    $bgnDarurat = $data->bgn_darurat ?? 0;

    $kdrMotor = $data->kdr_motor ?? 0;
    $kdrMobil = $data->kdr_mobil ?? 0;
    $kdrTruk = $data->kdr_truk ?? 0;
    $kdrLainnya = ($data->kdr_bus ?? 0) + ($data->kdr_mikrolet ?? 0) + ($data->kdr_pickup ?? 0);
@endphp

<div class="space-y-6 md:space-y-8 animate-fade-in-up">
    
    <!-- ================= HEADER & FILTER ================= -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-4 border-b border-slate-200 pb-5">
        <div>
            <h2 class="text-2xl font-extrabold text-slate-800">Analisis Kependudukan Terpadu</h2>
            @if(!$data)
                <p class="text-rose-500 text-sm mt-1 font-semibold">Data untuk periode ini belum tersedia.</p>
            @endif
        </div>
        
        <div class="flex items-center gap-2">
            <span class="text-xs font-bold text-slate-400 uppercase tracking-wider hidden sm:inline-block">Periode:</span>
            <select class="min-w-[130px] bg-white border border-slate-200 text-slate-700 font-semibold py-2 pl-3 pr-8 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 shadow-sm cursor-pointer text-sm appearance-none bg-[url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2220%22%20height%3D%2220%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22%23475569%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%3E%3C%2Fpolyline%3E%3C%2Fsvg%3E')] bg-[length:1.2em_1.2em] bg-[position:right_0.5rem_center] bg-no-repeat" id="dashboard-month">
                @foreach(['01'=>'Januari', '02'=>'Februari', '03'=>'Maret', '04'=>'April', '05'=>'Mei', '06'=>'Juni', '07'=>'Juli', '08'=>'Agustus', '09'=>'September', '10'=>'Oktober', '11'=>'November', '12'=>'Desember'] as $m => $mName)
                    <option value="{{ $m }}" {{ ($bulan ?? date('m')) == $m ? 'selected' : '' }}>{{ $mName }}</option>
                @endforeach
            </select>
            <select class="min-w-[90px] bg-white border border-slate-200 text-slate-700 font-semibold py-2 pl-3 pr-8 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 shadow-sm cursor-pointer text-sm appearance-none bg-[url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2220%22%20height%3D%2220%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22%23475569%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%3E%3C%2Fpolyline%3E%3C%2Fsvg%3E')] bg-[length:1.2em_1.2em] bg-[position:right_0.5rem_center] bg-no-repeat" id="dashboard-year">
                @php $currentYear = date('Y'); @endphp
                @for($y = $currentYear; $y >= 2020; $y--)
                    <option value="{{ $y }}" {{ ($tahun ?? $currentYear) == $y ? 'selected' : '' }}>{{ $y }}</option>
                @endfor
            </select>
        </div>
    </div>

    <!-- ================= LAYER 1: HIGHLIGHT DATA ================= -->
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4 md:gap-6">
        <div class="col-span-2 md:col-span-1 lg:col-span-1 bg-white p-6 rounded-2xl border-t-4 border-t-primary-500 shadow-sm hover:shadow-md transition-shadow flex flex-col justify-center items-center text-center">
            <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-1">I. Total Penduduk</p>
            <h3 class="text-4xl font-extrabold text-primary-600">{{ number_format($totalWni, 0, ',', '.') }}</h3>
            <p class="text-xs font-semibold text-slate-500 mt-1">Jiwa WNI</p>
        </div>

        <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition-shadow">
            <div class="w-10 h-10 rounded-full bg-blue-50 text-blue-500 flex items-center justify-center mb-3">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
            </div>
            <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-1">Laki-Laki</p>
            <h3 class="text-2xl font-extrabold text-slate-800">{{ number_format($totalWniL, 0, ',', '.') }}</h3>
        </div>

        <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition-shadow">
            <div class="w-10 h-10 rounded-full bg-rose-50 text-rose-500 flex items-center justify-center mb-3">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4a4 4 0 100 8 4 4 0 000-8zM2 20h20M12 12v8"></path></svg>
            </div>
            <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-1">Perempuan</p>
            <h3 class="text-2xl font-extrabold text-slate-800">{{ number_format($totalWniP, 0, ',', '.') }}</h3>
        </div>

        <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition-shadow">
            <div class="w-10 h-10 rounded-full bg-slate-100 text-slate-500 flex items-center justify-center mb-3">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path></svg>
            </div>
            <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-1">Penduduk WNA</p>
            <h3 class="text-2xl font-extrabold text-slate-800">{{ number_format($totalWna, 0, ',', '.') }}</h3>
        </div>

        <div class="bg-white p-6 rounded-2xl border-b-4 border-b-emerald-500 shadow-sm hover:shadow-md transition-shadow flex flex-col justify-center">
            <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-1">XI. Jumlah KK</p>
            <h3 class="text-2xl font-extrabold text-slate-800">{{ number_format($jmlKk, 0, ',', '.') }}</h3>
            <span class="text-[10px] font-bold text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded inline-block mt-2 w-max">Keluarga Terdata</span>
        </div>
    </div>

    <!-- ================= LAYER 2: VISUALISASI ================= -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 md:gap-6">
        <div class="lg:col-span-2 bg-white p-6 rounded-2xl border border-slate-100 shadow-sm flex flex-col">
            <div class="flex justify-between items-center mb-6">
                <h3 class="font-bold text-slate-800 text-base">Distribusi Jumlah Jiwa Menurut Umur</h3>
            </div>
            <div class="flex-1 relative w-full h-64 md:h-80">
                <canvas id="ageChart"></canvas>
            </div>
        </div>

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
                    <span class="text-primary-600 text-lg">{{ number_format($totalWniL, 0, ',', '.') }}</span>
                </div>
                <div class="flex flex-col items-center">
                    <span class="text-xs text-slate-500">Perempuan</span>
                    <span class="text-rose-500 text-lg">{{ number_format($totalWniP, 0, ',', '.') }}</span>
                </div>
            </div>
        </div>
    </div>

    <!-- ================= LAYER 3: ADMINISTRASI & MUTASI ================= -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 md:gap-6">
        <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
            <h3 class="font-bold text-slate-800 text-sm mb-4">II. Mutasi Data Penduduk</h3>
            <div class="grid grid-cols-2 gap-3">
                <div class="bg-emerald-50/50 border border-emerald-100 p-3 rounded-xl text-center">
                    <p class="text-[10px] uppercase font-bold text-emerald-600 mb-1">Lahir</p>
                    <p class="font-bold text-slate-800 text-xl">{{ $mutasiLahir }}</p>
                </div>
                <div class="bg-rose-50/50 border border-rose-100 p-3 rounded-xl text-center">
                    <p class="text-[10px] uppercase font-bold text-rose-600 mb-1">Meninggal</p>
                    <p class="font-bold text-slate-800 text-xl">{{ $mutasiMati }}</p>
                </div>
                <div class="bg-primary-50/50 border border-primary-100 p-3 rounded-xl text-center">
                    <p class="text-[10px] uppercase font-bold text-primary-600 mb-1">Datang</p>
                    <p class="font-bold text-slate-800 text-xl">{{ $mutasiDatang }}</p>
                </div>
                <div class="bg-amber-50/50 border border-amber-100 p-3 rounded-xl text-center">
                    <p class="text-[10px] uppercase font-bold text-amber-600 mb-1">Pindah</p>
                    <p class="font-bold text-slate-800 text-xl">{{ $mutasiPindah }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm flex flex-col justify-center">
            <h3 class="font-bold text-slate-800 text-sm mb-5">IV. Status Wajib KTP</h3>
            <div class="space-y-4">
                <div>
                    <div class="flex justify-between text-xs font-semibold mb-1">
                        <span class="text-slate-600">Memiliki KTP</span><span class="text-emerald-600">{{ number_format($ktpAda, 0, ',', '.') }} Jiwa</span>
                    </div>
                    <div class="w-full bg-slate-100 rounded-full h-2"><div class="bg-emerald-500 h-2 rounded-full" style="width: {{ $ktpAdaPct }}%"></div></div>
                </div>
                <div>
                    <div class="flex justify-between text-xs font-semibold mb-1">
                        <span class="text-slate-600">Belum Memiliki</span><span class="text-amber-600">{{ number_format($ktpBelum, 0, ',', '.') }} Jiwa</span>
                    </div>
                    <div class="w-full bg-slate-100 rounded-full h-2"><div class="bg-amber-500 h-2 rounded-full" style="width: {{ $ktpBelumPct }}%"></div></div>
                </div>
                <p class="text-[10px] font-bold text-slate-400 uppercase text-center mt-2">Total Wajib KTP: {{ number_format($ktpTotal, 0, ',', '.') }} Jiwa</p>
            </div>
        </div>

        <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm flex flex-col justify-center">
            <h3 class="font-bold text-slate-800 text-sm mb-5">III. Status Wajib KK</h3>
            <div class="space-y-4">
                <div>
                    <div class="flex justify-between text-xs font-semibold mb-1">
                        <span class="text-slate-600">Memiliki KK</span><span class="text-primary-600">{{ number_format($kkAda, 0, ',', '.') }} Keluarga</span>
                    </div>
                    <div class="w-full bg-slate-100 rounded-full h-2"><div class="bg-primary-500 h-2 rounded-full" style="width: {{ $kkAdaPct }}%"></div></div>
                </div>
                <div>
                    <div class="flex justify-between text-xs font-semibold mb-1">
                        <span class="text-slate-600">Belum Memiliki</span><span class="text-rose-500">{{ number_format($kkBelum, 0, ',', '.') }} Keluarga</span>
                    </div>
                    <div class="w-full bg-slate-100 rounded-full h-2"><div class="bg-rose-400 h-2 rounded-full" style="width: {{ $kkBelumPct }}%"></div></div>
                </div>
                <p class="text-[10px] font-bold text-slate-400 uppercase text-center mt-2">Total Wajib KK: {{ number_format($kkTotal, 0, ',', '.') }} Keluarga</p>
            </div>
        </div>
    </div>

    <!-- ================= LAYER 4: SOSIAL & PENDIDIKAN ================= -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 md:gap-6">
        <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
            <h3 class="font-bold text-slate-800 text-sm mb-4">V. Distribusi Agama</h3>
            <ul class="space-y-3">
                <li class="flex justify-between items-center text-sm border-b border-slate-50 pb-2"><div class="flex items-center gap-2"><span class="w-2.5 h-2.5 rounded-full bg-blue-500"></span><span class="font-medium text-slate-600">Kristen</span></div><span class="font-bold text-slate-800">{{ number_format($agamaKristen, 0, ',', '.') }}</span></li>
                <li class="flex justify-between items-center text-sm border-b border-slate-50 pb-2"><div class="flex items-center gap-2"><span class="w-2.5 h-2.5 rounded-full bg-emerald-500"></span><span class="font-medium text-slate-600">Islam</span></div><span class="font-bold text-slate-800">{{ number_format($agamaIslam, 0, ',', '.') }}</span></li>
                <li class="flex justify-between items-center text-sm border-b border-slate-50 pb-2"><div class="flex items-center gap-2"><span class="w-2.5 h-2.5 rounded-full bg-amber-500"></span><span class="font-medium text-slate-600">Katholik</span></div><span class="font-bold text-slate-800">{{ number_format($agamaKatolik, 0, ',', '.') }}</span></li>
                <li class="flex justify-between items-center text-sm"><div class="flex items-center gap-2"><span class="w-2.5 h-2.5 rounded-full bg-slate-300"></span><span class="font-medium text-slate-600">Lainnya</span></div><span class="font-bold text-slate-800">{{ number_format($agamaLainnya, 0, ',', '.') }}</span></li>
            </ul>
        </div>

        <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
            <h3 class="font-bold text-slate-800 text-sm mb-5">VI. Tingkat Pendidikan</h3>
            <div class="space-y-4">
                @php $colors = ['bg-blue-400', 'bg-indigo-400', 'bg-fuchsia-500', 'bg-violet-500', 'bg-slate-400']; $i = 0; @endphp
                @foreach($pendidikan as $label => $val)
                    @php $pct = $totalPend > 0 ? round(($val/$totalPend)*100, 1) : 0; @endphp
                    <div>
                        <div class="flex justify-between text-xs font-semibold mb-1"><span class="text-slate-600">{{ $label }}</span><span class="text-slate-800">{{ number_format($val, 0, ',', '.') }}</span></div>
                        <div class="w-full bg-slate-100 rounded-full h-1.5"><div class="{{ $colors[$i++ % 5] }} h-1.5 rounded-full" style="width: {{ $pct }}%"></div></div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="bg-rose-50/50 p-6 rounded-2xl border border-rose-100 shadow-sm flex flex-col justify-center">
            <h3 class="font-bold text-rose-800 text-sm mb-4">VII. Usia Putus Sekolah</h3>
            <div class="space-y-2">
                @foreach($putusSekolah as $label => $val)
                <div class="flex justify-between text-sm bg-white px-3 py-2 rounded-lg border border-rose-100"><span class="font-medium text-slate-600">{{ $label }}</span><span class="font-bold text-rose-600">{{ number_format($val, 0, ',', '.') }}</span></div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- ================= LAYER 5: EKONOMI & INFRASTRUKTUR ================= -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 md:gap-6">
        <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
            <h3 class="font-bold text-slate-800 text-sm mb-4 border-b border-slate-100 pb-2">VIII. Top 5 Pekerjaan</h3>
            <ul class="space-y-3">
                @php $rank = 1; @endphp
                @foreach($topPekerjaan as $label => $val)
                <li class="flex items-center justify-between bg-slate-50 px-3 py-2 rounded-lg"><span class="text-xs font-semibold text-slate-600">{{ $rank++ }}. {{ $label }}</span><span class="text-sm font-bold text-primary-600">{{ number_format($val, 0, ',', '.') }}</span></li>
                @endforeach
            </ul>
        </div>

        <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
            <h3 class="font-bold text-slate-800 text-sm mb-4 border-b border-slate-100 pb-2">IX. Kondisi Bangunan</h3>
            <div class="flex flex-col gap-3">
                <div class="px-4 py-3 rounded-xl border border-slate-100 bg-slate-50 flex justify-between items-center">
                    <span class="text-xs text-slate-600 font-bold uppercase">Permanen</span>
                    <span class="text-lg font-bold text-primary-600">{{ number_format($bgnPermanen, 0, ',', '.') }}</span>
                </div>
                <div class="px-4 py-3 rounded-xl border border-slate-100 bg-slate-50 flex justify-between items-center">
                    <span class="text-xs text-slate-600 font-bold uppercase">Semi Permanen</span>
                    <span class="text-lg font-bold text-primary-600">{{ number_format($bgnSemi, 0, ',', '.') }}</span>
                </div>
                <div class="px-4 py-3 rounded-xl border border-rose-100 bg-rose-50 flex justify-between items-center">
                    <span class="text-xs text-rose-600 font-bold uppercase">Darurat</span>
                    <span class="text-lg font-bold text-rose-600">{{ number_format($bgnDarurat, 0, ',', '.') }}</span>
                </div>
            </div>
        </div>

        <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
            <h3 class="font-bold text-slate-800 text-sm mb-4 border-b border-slate-100 pb-2">X. Kendaraan Bermotor</h3>
            <div class="grid grid-cols-2 gap-3">
                <div class="bg-slate-50 p-3 rounded-xl text-center border border-slate-100">
                    <span class="block text-xl font-bold text-slate-800">{{ number_format($kdrMotor, 0, ',', '.') }}</span>
                    <span class="text-[10px] uppercase font-bold text-slate-500">Spd Motor</span>
                </div>
                <div class="bg-slate-50 p-3 rounded-xl text-center border border-slate-100">
                    <span class="block text-xl font-bold text-slate-800">{{ number_format($kdrMobil, 0, ',', '.') }}</span>
                    <span class="text-[10px] uppercase font-bold text-slate-500">Mobil Pribadi</span>
                </div>
                <div class="bg-slate-50 p-3 rounded-xl text-center border border-slate-100">
                    <span class="block text-xl font-bold text-slate-800">{{ number_format($kdrTruk, 0, ',', '.') }}</span>
                    <span class="text-[10px] uppercase font-bold text-slate-500">Truck</span>
                </div>
                <div class="bg-slate-50 p-3 rounded-xl text-center border border-slate-100">
                    <span class="block text-xl font-bold text-slate-800">{{ number_format($kdrLainnya, 0, ',', '.') }}</span>
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
        // TANGGAL FILTER Event Listener
        const dashMonth = document.getElementById('dashboard-month');
        const dashYear = document.getElementById('dashboard-year');
        
        const reloadDashboard = () => {
            window.location.href = `?bulan=${dashMonth.value}&tahun=${dashYear.value}`;
        };

        dashMonth.addEventListener('change', reloadDashboard);
        dashYear.addEventListener('change', reloadDashboard);

        // DATA DARI PHP UNTUK CHART
        const umurLabels = {!! json_encode($umurLabels ?? []) !!};
        const umurL = {!! json_encode($umurL ?? []) !!};
        const umurP = {!! json_encode($umurP ?? []) !!};
        
        const totalWniL = {{ $totalWniL }};
        const totalWniP = {{ $totalWniP }};

        // CHART UMUR
        const ctxAge = document.getElementById('ageChart');
        if(ctxAge && umurLabels.length > 0) {
            new Chart(ctxAge, {
                type: 'bar',
                data: {
                    labels: umurLabels,
                    datasets: [{
                        label: 'Laki-Laki',
                        data: umurL, 
                        backgroundColor: '#3b82f6', 
                        borderRadius: 4, barPercentage: 0.8, categoryPercentage: 0.8
                    },
                    {
                        label: 'Perempuan',
                        data: umurP,
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
        if(ctxGender && (totalWniL > 0 || totalWniP > 0)) {
            new Chart(ctxGender, {
                type: 'doughnut',
                data: {
                    labels: ['Laki-Laki', 'Perempuan'],
                    datasets: [{ data: [totalWniL, totalWniP], backgroundColor: ['#3b82f6', '#fb7185'], borderWidth: 0, hoverOffset: 4 }]
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