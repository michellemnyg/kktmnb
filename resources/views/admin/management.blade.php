@extends('layouts.admin')

@section('title', 'Data Management')

@section('content')
<div class="space-y-8 animate-fade-in-up">
    
    <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-4 border-b border-slate-200 pb-5">
        <div>
            <h2 class="text-2xl font-extrabold text-slate-800">Manajemen Laporan Bulanan</h2>
            <p class="text-slate-500 text-sm mt-1">Pilih periode, tinjau, lalu perbarui data administrasi kelurahan.</p>
        </div>
    </div>

    @if ($errors->any())
        <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-r-lg shadow-sm">
            <div class="flex items-center mb-2">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                <h3 class="font-bold">Gagal Menyimpan Data</h3>
            </div>
            <ul class="list-disc pl-5 text-sm space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
        <h3 class="text-sm font-bold text-primary-600 uppercase tracking-wider mb-4">1. Pilih Periode Data</h3>
        <form action="{{ url('/admin/management') }}" method="GET" class="flex flex-col sm:flex-row gap-4 items-end">
            <div class="w-full sm:w-auto">
                <label class="block text-xs font-semibold text-slate-500 mb-1">Bulan</label>
                @php
                    $monthsList = ['01'=>'Januari','02'=>'Februari','03'=>'Maret','04'=>'April','05'=>'Mei','06'=>'Juni','07'=>'Juli','08'=>'Agustus','09'=>'September','10'=>'Oktober','11'=>'November','12'=>'Desember'];
                    $currentYear = date('Y');
                @endphp
                <select name="bulan" id="manage-month" class="w-full sm:min-w-[180px] bg-slate-50 border border-slate-300 text-slate-700 font-semibold py-2.5 pl-4 pr-10 rounded-xl focus:ring-2 focus:ring-primary-500 focus:outline-none cursor-pointer appearance-none bg-[url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2220%22%20height%3D%2220%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22%23475569%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%3E%3C%2Fpolyline%3E%3C%2Fsvg%3E')] bg-[length:1.2em_1.2em] bg-[position:right_0.8rem_center] bg-no-repeat shadow-sm">
                    @foreach($monthsList as $num => $name)
                        <option value="{{ $num }}" {{ (isset($bulan) ? $bulan : date('m')) == $num ? 'selected' : '' }}>{{ $name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="w-full sm:w-auto">
                <label class="block text-xs font-semibold text-slate-500 mb-1">Tahun</label>
                <select name="tahun" id="manage-year" class="w-full sm:min-w-[140px] bg-slate-50 border border-slate-300 text-slate-700 font-semibold py-2.5 pl-4 pr-10 rounded-xl focus:ring-2 focus:ring-primary-500 focus:outline-none cursor-pointer appearance-none bg-[url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2220%22%20height%3D%2220%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22%23475569%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%3E%3C%2Fpolyline%3E%3C%2Fsvg%3E')] bg-[length:1.2em_1.2em] bg-[position:right_0.8rem_center] bg-no-repeat shadow-sm">
                    @for($y = $currentYear; $y >= 2020; $y--)
                        <option value="{{ $y }}" {{ (isset($tahun) ? $tahun : $currentYear) == $y ? 'selected' : '' }}>{{ $y }}</option>
                    @endfor
                </select>
            </div>
            <button type="submit" id="btn-load-data" class="w-full sm:w-auto px-6 py-2.5 bg-slate-800 hover:bg-slate-900 text-white font-semibold rounded-xl transition-all shadow-md">
                Tampilkan Data
            </button>
            <button type="submit" formaction="{{ route('admin.management.export') }}" id="btn-export-excel" class="w-full sm:w-auto px-6 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white font-semibold rounded-xl transition-all shadow-md flex items-center justify-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                Export Excel
            </button>
        </form>
    </div>

    @if(isset($bulan) && isset($tahun))
    <div id="data-editor-section" class="space-y-6 opacity-100 transition-opacity duration-500">
        <form action="{{ url('/admin/management') }}" method="POST" id="data-form">
            @csrf
            <input type="hidden" name="bulan" value="{{ $bulan }}">
            <input type="hidden" name="tahun" value="{{ $tahun }}">
        
        <div class="flex justify-between items-center bg-primary-50 p-4 rounded-xl border border-primary-100">
            <span class="font-bold text-primary-700" id="editor-period-title">Data Laporan: Bulan {{ $bulan ?? '-' }} Tahun {{ $tahun ?? '-' }}</span>
            <div class="flex gap-3">
                <button id="btn-edit-mode" type="button" class="px-5 py-2 bg-primary-600 hover:bg-primary-700 text-white font-semibold rounded-lg text-sm shadow-md transition-all flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                    Edit Data
                </button>
                <button id="btn-cancel-edit" type="button" class="hidden px-5 py-2 bg-slate-500 hover:bg-slate-600 text-white font-semibold rounded-lg text-sm shadow-md transition-all flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    Batal
                </button>
                <button id="btn-save-mode" type="button" class="hidden px-5 py-2 bg-emerald-600 hover:bg-emerald-700 text-white font-semibold rounded-lg text-sm shadow-md transition-all flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    Simpan Perubahan
                </button>
            </div>
        </div>

        <div class="flex flex-col lg:flex-row gap-6 items-start">
            <div class="w-full lg:w-2/3 space-y-6">
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                    <div class="bg-slate-50 px-6 py-4 border-b border-slate-200">
                        <h4 class="font-bold text-slate-800 uppercase tracking-wide text-sm">I. Jumlah Penduduk</h4>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm whitespace-nowrap">
                            <thead class="bg-white text-slate-500 border-b border-slate-200">
                                <tr>
                                    <th class="px-6 py-3 font-semibold w-1/2">Uraian</th>
                                    <th class="px-6 py-3 font-semibold text-center w-1/6">Laki-Laki</th>
                                    <th class="px-6 py-3 font-semibold text-center w-1/6">Perempuan</th>
                                    <th class="px-6 py-3 font-semibold text-center w-1/6">Total Jiwa</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 text-slate-700" id="table-penduduk">
                                @include('components.row-mutasi', ['label' => 'a. WNA', 'name_l' => 'wna_l', 'name_p' => 'wna_p', 'laki' => $data->wna_l ?? 0, 'perempuan' => $data->wna_p ?? 0])
                                @include('components.row-mutasi', ['label' => 'b. WNI', 'name_l' => 'wni_l', 'name_p' => 'wni_p', 'laki' => $data->wni_l ?? 0, 'perempuan' => $data->wni_p ?? 0])
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                    <div class="bg-slate-50 px-6 py-4 border-b border-slate-200">
                        <h4 class="font-bold text-slate-800 uppercase tracking-wide text-sm">II. Jumlah Data Mutasi</h4>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm whitespace-nowrap">
                            <thead class="bg-white text-slate-500 border-b border-slate-200">
                                <tr><th class="px-6 py-3 font-semibold w-1/2">Uraian</th><th class="px-6 py-3 font-semibold text-center w-1/6">L</th><th class="px-6 py-3 font-semibold text-center w-1/6">P</th><th class="px-6 py-3 font-semibold text-center w-1/6">Total</th></tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 text-slate-700">
                                @include('components.row-mutasi', ['label' => 'a. Lahir', 'name_l' => 'lahir_l', 'name_p' => 'lahir_p', 'laki' => $data->lahir_l ?? 0, 'perempuan' => $data->lahir_p ?? 0])
                                @include('components.row-mutasi', ['label' => 'b. Meninggal', 'name_l' => 'mati_l', 'name_p' => 'mati_p', 'laki' => $data->mati_l ?? 0, 'perempuan' => $data->mati_p ?? 0])
                                @include('components.row-mutasi', ['label' => 'c. Datang', 'name_l' => 'datang_l', 'name_p' => 'datang_p', 'laki' => $data->datang_l ?? 0, 'perempuan' => $data->datang_p ?? 0])
                                @include('components.row-mutasi', ['label' => 'd. Pindah', 'name_l' => 'pindah_l', 'name_p' => 'pindah_p', 'laki' => $data->pindah_l ?? 0, 'perempuan' => $data->pindah_p ?? 0])
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                    <div class="bg-slate-50 px-6 py-4 border-b border-slate-200">
                        <h4 class="font-bold text-slate-800 uppercase tracking-wide text-sm">III. Wajib KK & IV. Wajib KTP</h4>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm whitespace-nowrap">
                            <tbody class="divide-y divide-slate-100 text-slate-700">
                                <tr class="bg-slate-50/50"><td class="px-6 py-3 font-bold text-primary-700" colspan="2">WAJIB KK</td></tr>
                                <tr class="hover:bg-slate-50"><td class="px-6 py-4 font-medium w-1/2 pl-10">a. Memiliki KK</td><td class="px-6 py-2"><input type="number" name="kk_ada" value="{{ $data->kk_ada ?? 0 }}" readonly class="data-input w-32 bg-transparent border-transparent focus:ring-1 rounded-md py-1 outline-none transition-all"> Keluarga</td></tr>
                                <tr class="hover:bg-slate-50"><td class="px-6 py-4 font-medium w-1/2 pl-10">b. Belum Memiliki KK</td><td class="px-6 py-2"><input type="number" name="kk_belum" value="{{ $data->kk_belum ?? 0 }}" readonly class="data-input w-32 bg-transparent border-transparent focus:ring-1 rounded-md py-1 outline-none transition-all"> Keluarga</td></tr>
                                <tr class="bg-slate-50/50"><td class="px-6 py-3 font-bold text-primary-700" colspan="2">WAJIB KTP</td></tr>
                                @include('components.row-mutasi', ['label' => 'a. Memiliki KTP', 'name_l' => 'ktp_ada_l', 'name_p' => 'ktp_ada_p', 'laki' => $data->ktp_ada_l ?? 0, 'perempuan' => $data->ktp_ada_p ?? 0])
                                @include('components.row-mutasi', ['label' => 'b. Belum Memiliki KTP', 'name_l' => 'ktp_belum_l', 'name_p' => 'ktp_belum_p', 'laki' => $data->ktp_belum_l ?? 0, 'perempuan' => $data->ktp_belum_p ?? 0])
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                    <div class="bg-slate-50 px-6 py-4 border-b border-slate-200">
                        <h4 class="font-bold text-slate-800 uppercase tracking-wide text-sm">V. Penduduk Menurut Agama</h4>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm whitespace-nowrap">
                            <tbody class="divide-y divide-slate-100 text-slate-700">
                                @include('components.row-mutasi', ['label' => 'a. Kristen', 'name_l' => 'agama_kristen_l', 'name_p' => 'agama_kristen_p', 'laki' => $data->agama_kristen_l ?? 0, 'perempuan' => $data->agama_kristen_p ?? 0])
                                @include('components.row-mutasi', ['label' => 'b. Katholik', 'name_l' => 'agama_katolik_l', 'name_p' => 'agama_katolik_p', 'laki' => $data->agama_katolik_l ?? 0, 'perempuan' => $data->agama_katolik_p ?? 0])
                                @include('components.row-mutasi', ['label' => 'c. Islam', 'name_l' => 'agama_islam_l', 'name_p' => 'agama_islam_p', 'laki' => $data->agama_islam_l ?? 0, 'perempuan' => $data->agama_islam_p ?? 0])
                                @include('components.row-mutasi', ['label' => 'd. Hindu', 'name_l' => 'agama_hindu_l', 'name_p' => 'agama_hindu_p', 'laki' => $data->agama_hindu_l ?? 0, 'perempuan' => $data->agama_hindu_p ?? 0])
                                @include('components.row-mutasi', ['label' => 'e. Buddha', 'name_l' => 'agama_buddha_l', 'name_p' => 'agama_buddha_p', 'laki' => $data->agama_buddha_l ?? 0, 'perempuan' => $data->agama_buddha_p ?? 0])
                                @include('components.row-mutasi', ['label' => 'f. Konghucu', 'name_l' => 'agama_konghucu_l', 'name_p' => 'agama_konghucu_p', 'laki' => $data->agama_konghucu_l ?? 0, 'perempuan' => $data->agama_konghucu_p ?? 0])
                                @include('components.row-mutasi', ['label' => 'g. Lainnya', 'name_l' => 'agama_lain_l', 'name_p' => 'agama_lain_p', 'laki' => $data->agama_lain_l ?? 0, 'perempuan' => $data->agama_lain_p ?? 0])
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                    <div class="bg-slate-50 px-6 py-4 border-b border-slate-200">
                        <h4 class="font-bold text-slate-800 uppercase tracking-wide text-sm">VI. Penduduk Menurut Pendidikan</h4>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm whitespace-nowrap">
                            <tbody class="divide-y divide-slate-100 text-slate-700">
                                @include('components.row-mutasi', ['label' => 'a. TK', 'name_l' => 'pend_tk_l', 'name_p' => 'pend_tk_p', 'laki' => $data->pend_tk_l ?? 0, 'perempuan' => $data->pend_tk_p ?? 0])
                                @include('components.row-mutasi', ['label' => 'b. SD', 'name_l' => 'pend_sd_l', 'name_p' => 'pend_sd_p', 'laki' => $data->pend_sd_l ?? 0, 'perempuan' => $data->pend_sd_p ?? 0])
                                @include('components.row-mutasi', ['label' => 'c. SMP', 'name_l' => 'pend_smp_l', 'name_p' => 'pend_smp_p', 'laki' => $data->pend_smp_l ?? 0, 'perempuan' => $data->pend_smp_p ?? 0])
                                @include('components.row-mutasi', ['label' => 'd. SMA', 'name_l' => 'pend_sma_l', 'name_p' => 'pend_sma_p', 'laki' => $data->pend_sma_l ?? 0, 'perempuan' => $data->pend_sma_p ?? 0])
                                @include('components.row-mutasi', ['label' => 'e. Perguruan Tinggi', 'name_l' => 'pend_pt_l', 'name_p' => 'pend_pt_p', 'laki' => $data->pend_pt_l ?? 0, 'perempuan' => $data->pend_pt_p ?? 0])
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                    <div class="bg-slate-50 px-6 py-4 border-b border-slate-200">
                        <h4 class="font-bold text-slate-800 uppercase tracking-wide text-sm">VII. Usia Yang Putus Sekolah</h4>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm whitespace-nowrap">
                            <tbody class="divide-y divide-slate-100 text-slate-700">
                                @include('components.row-mutasi', ['label' => 'a. Tidak Pernah Sekolah', 'name_l' => 'pts_tidak_l', 'name_p' => 'pts_tidak_p', 'laki' => $data->pts_tidak_l ?? 0, 'perempuan' => $data->pts_tidak_p ?? 0])
                                @include('components.row-mutasi', ['label' => 'b. TK', 'name_l' => 'pts_tk_l', 'name_p' => 'pts_tk_p', 'laki' => $data->pts_tk_l ?? 0, 'perempuan' => $data->pts_tk_p ?? 0])
                                @include('components.row-mutasi', ['label' => 'c. SD', 'name_l' => 'pts_sd_l', 'name_p' => 'pts_sd_p', 'laki' => $data->pts_sd_l ?? 0, 'perempuan' => $data->pts_sd_p ?? 0])
                                @include('components.row-mutasi', ['label' => 'd. SMP', 'name_l' => 'pts_smp_l', 'name_p' => 'pts_smp_p', 'laki' => $data->pts_smp_l ?? 0, 'perempuan' => $data->pts_smp_p ?? 0])
                                @include('components.row-mutasi', ['label' => 'e. SMA', 'name_l' => 'pts_sma_l', 'name_p' => 'pts_sma_p', 'laki' => $data->pts_sma_l ?? 0, 'perempuan' => $data->pts_sma_p ?? 0])
                                @include('components.row-mutasi', ['label' => 'f. Cacat Fisik', 'name_l' => 'cacat_fisik_l', 'name_p' => 'cacat_fisik_p', 'laki' => $data->cacat_fisik_l ?? 0, 'perempuan' => $data->cacat_fisik_p ?? 0])
                                @include('components.row-mutasi', ['label' => 'g. Cacat Mental', 'name_l' => 'cacat_mental_l', 'name_p' => 'cacat_mental_p', 'laki' => $data->cacat_mental_l ?? 0, 'perempuan' => $data->cacat_mental_p ?? 0])
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                    <div class="bg-slate-50 px-6 py-4 border-b border-slate-200">
                        <h4 class="font-bold text-slate-800 uppercase tracking-wide text-sm">VIII. Penduduk Menurut Pekerjaan</h4>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm whitespace-nowrap">
                            <tbody class="divide-y divide-slate-100 text-slate-700">
                                @include('components.row-mutasi', ['label' => 'a. ASN Pegawai', 'name_l' => 'pkj_asn_pegawai_l', 'name_p' => 'pkj_asn_pegawai_p', 'laki' => $data->pkj_asn_pegawai_l ?? 0, 'perempuan' => $data->pkj_asn_pegawai_p ?? 0])
                                @include('components.row-mutasi', ['label' => 'b. ASN Guru', 'name_l' => 'pkj_asn_guru_l', 'name_p' => 'pkj_asn_guru_p', 'laki' => $data->pkj_asn_guru_l ?? 0, 'perempuan' => $data->pkj_asn_guru_p ?? 0])
                                @include('components.row-mutasi', ['label' => 'c. TNI', 'name_l' => 'pkj_tni_l', 'name_p' => 'pkj_tni_p', 'laki' => $data->pkj_tni_l ?? 0, 'perempuan' => $data->pkj_tni_p ?? 0])
                                @include('components.row-mutasi', ['label' => 'd. POLRI', 'name_l' => 'pkj_polri_l', 'name_p' => 'pkj_polri_p', 'laki' => $data->pkj_polri_l ?? 0, 'perempuan' => $data->pkj_polri_p ?? 0])
                                @include('components.row-mutasi', ['label' => 'e. Petani', 'name_l' => 'pkj_petani_l', 'name_p' => 'pkj_petani_p', 'laki' => $data->pkj_petani_l ?? 0, 'perempuan' => $data->pkj_petani_p ?? 0])
                                @include('components.row-mutasi', ['label' => 'f. Tukang', 'name_l' => 'pkj_tukang_l', 'name_p' => 'pkj_tukang_p', 'laki' => $data->pkj_tukang_l ?? 0, 'perempuan' => $data->pkj_tukang_p ?? 0])
                                @include('components.row-mutasi', ['label' => 'g. Pelaut', 'name_l' => 'pkj_pelaut_l', 'name_p' => 'pkj_pelaut_p', 'laki' => $data->pkj_pelaut_l ?? 0, 'perempuan' => $data->pkj_pelaut_p ?? 0])
                                @include('components.row-mutasi', ['label' => 'h. Nelayan', 'name_l' => 'pkj_nelayan_l', 'name_p' => 'pkj_nelayan_p', 'laki' => $data->pkj_nelayan_l ?? 0, 'perempuan' => $data->pkj_nelayan_p ?? 0])
                                @include('components.row-mutasi', ['label' => 'i. Buruh', 'name_l' => 'pkj_buruh_l', 'name_p' => 'pkj_buruh_p', 'laki' => $data->pkj_buruh_l ?? 0, 'perempuan' => $data->pkj_buruh_p ?? 0])
                                @include('components.row-mutasi', ['label' => 'j. Wiraswasta', 'name_l' => 'pkj_wiraswasta_l', 'name_p' => 'pkj_wiraswasta_p', 'laki' => $data->pkj_wiraswasta_l ?? 0, 'perempuan' => $data->pkj_wiraswasta_p ?? 0])
                                @include('components.row-mutasi', ['label' => 'k. Karyawan Swasta', 'name_l' => 'pkj_swasta_l', 'name_p' => 'pkj_swasta_p', 'laki' => $data->pkj_swasta_l ?? 0, 'perempuan' => $data->pkj_swasta_p ?? 0])
                                @include('components.row-mutasi', ['label' => 'l. Karyawan BUMN/BUMD', 'name_l' => 'pkj_bumd_l', 'name_p' => 'pkj_bumd_p', 'laki' => $data->pkj_bumd_l ?? 0, 'perempuan' => $data->pkj_bumd_p ?? 0])
                                @include('components.row-mutasi', ['label' => 'm. IRT/PRT', 'name_l' => 'pkj_irt_l', 'name_p' => 'pkj_irt_p', 'laki' => $data->pkj_irt_l ?? 0, 'perempuan' => $data->pkj_irt_p ?? 0])
                                @include('components.row-mutasi', ['label' => 'n. Pendeta', 'name_l' => 'pkj_pendeta_l', 'name_p' => 'pkj_pendeta_p', 'laki' => $data->pkj_pendeta_l ?? 0, 'perempuan' => $data->pkj_pendeta_p ?? 0])
                                @include('components.row-mutasi', ['label' => 'o. Imam', 'name_l' => 'pkj_imam_l', 'name_p' => 'pkj_imam_p', 'laki' => $data->pkj_imam_l ?? 0, 'perempuan' => $data->pkj_imam_p ?? 0])
                                @include('components.row-mutasi', ['label' => 'p. Sopir', 'name_l' => 'pkj_sopir_l', 'name_p' => 'pkj_sopir_p', 'laki' => $data->pkj_sopir_l ?? 0, 'perempuan' => $data->pkj_sopir_p ?? 0])
                                @include('components.row-mutasi', ['label' => 'q. Belum/Tidak Bekerja', 'name_l' => 'pkj_belum_l', 'name_p' => 'pkj_belum_p', 'laki' => $data->pkj_belum_l ?? 0, 'perempuan' => $data->pkj_belum_p ?? 0])
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                    <div class="bg-slate-50 px-6 py-4 border-b border-slate-200">
                        <h4 class="font-bold text-slate-800 uppercase tracking-wide text-sm">IX. Kondisi Bangunan</h4>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm whitespace-nowrap">
                            <tbody class="divide-y divide-slate-100 text-slate-700">
                                <tr class="hover:bg-slate-50"><td class="px-6 py-4 font-medium w-1/2">a. Darurat</td><td class="px-6 py-2"><input type="number" name="bgn_darurat" value="{{ $data->bgn_darurat ?? 0 }}" readonly class="data-input w-32 bg-transparent border-transparent focus:ring-1 rounded-md py-1 outline-none transition-all"> Bangunan</td></tr>
                                <tr class="hover:bg-slate-50"><td class="px-6 py-4 font-medium w-1/2">b. Semi Permanen</td><td class="px-6 py-2"><input type="number" name="bgn_semi" value="{{ $data->bgn_semi ?? 0 }}" readonly class="data-input w-32 bg-transparent border-transparent focus:ring-1 rounded-md py-1 outline-none transition-all"> Bangunan</td></tr>
                                <tr class="hover:bg-slate-50"><td class="px-6 py-4 font-medium w-1/2">c. Permanen</td><td class="px-6 py-2"><input type="number" name="bgn_permanen" value="{{ $data->bgn_permanen ?? 0 }}" readonly class="data-input w-32 bg-transparent border-transparent focus:ring-1 rounded-md py-1 outline-none transition-all"> Bangunan</td></tr>
                                <tr class="hover:bg-slate-50"><td class="px-6 py-4 font-medium w-1/2">d. Lainnya</td><td class="px-6 py-2"><input type="number" name="bgn_lainnya" value="{{ $data->bgn_lainnya ?? 0 }}" readonly class="data-input w-32 bg-transparent border-transparent focus:ring-1 rounded-md py-1 outline-none transition-all"> Bangunan</td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                    <div class="bg-slate-50 px-6 py-4 border-b border-slate-200">
                        <h4 class="font-bold text-slate-800 uppercase tracking-wide text-sm">X. Kendaraan Bermotor</h4>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm whitespace-nowrap">
                            <tbody class="divide-y divide-slate-100 text-slate-700">
                                <tr class="hover:bg-slate-50"><td class="px-6 py-4 font-medium w-1/2">a. Sepeda Motor</td><td class="px-6 py-2"><input type="number" name="kdr_motor" value="{{ $data->kdr_motor ?? 0 }}" readonly class="data-input w-32 bg-transparent border-transparent focus:ring-1 rounded-md py-1 outline-none transition-all"> Unit</td></tr>
                                <tr class="hover:bg-slate-50"><td class="px-6 py-4 font-medium w-1/2">b. Mobil Pribadi</td><td class="px-6 py-2"><input type="number" name="kdr_mobil" value="{{ $data->kdr_mobil ?? 0 }}" readonly class="data-input w-32 bg-transparent border-transparent focus:ring-1 rounded-md py-1 outline-none transition-all"> Unit</td></tr>
                                <tr class="hover:bg-slate-50"><td class="px-6 py-4 font-medium w-1/2">c. Bus</td><td class="px-6 py-2"><input type="number" name="kdr_bus" value="{{ $data->kdr_bus ?? 0 }}" readonly class="data-input w-32 bg-transparent border-transparent focus:ring-1 rounded-md py-1 outline-none transition-all"> Unit</td></tr>
                                <tr class="hover:bg-slate-50"><td class="px-6 py-4 font-medium w-1/2">d. Mikrolet</td><td class="px-6 py-2"><input type="number" name="kdr_mikrolet" value="{{ $data->kdr_mikrolet ?? 0 }}" readonly class="data-input w-32 bg-transparent border-transparent focus:ring-1 rounded-md py-1 outline-none transition-all"> Unit</td></tr>
                                <tr class="hover:bg-slate-50"><td class="px-6 py-4 font-medium w-1/2">e. Truck</td><td class="px-6 py-2"><input type="number" name="kdr_truk" value="{{ $data->kdr_truk ?? 0 }}" readonly class="data-input w-32 bg-transparent border-transparent focus:ring-1 rounded-md py-1 outline-none transition-all"> Unit</td></tr>
                                <tr class="hover:bg-slate-50"><td class="px-6 py-4 font-medium w-1/2">f. Pick Up</td><td class="px-6 py-2"><input type="number" name="kdr_pickup" value="{{ $data->kdr_pickup ?? 0 }}" readonly class="data-input w-32 bg-transparent border-transparent focus:ring-1 rounded-md py-1 outline-none transition-all"> Unit</td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                <div class="bg-slate-50 px-6 py-4 border-b border-slate-200">
                    <h4 class="font-bold text-slate-800 uppercase tracking-wide text-sm">XI. Data Domisili</h4>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm whitespace-nowrap">
                        <thead class="bg-white text-slate-500 border-b border-slate-200">
                            <tr>
                                <th class="px-6 py-3 font-semibold w-2/3">Uraian</th>
                                <th class="px-6 py-3 font-semibold text-center w-1/3">Jumlah Keluarga</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 text-slate-700">
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 font-medium">Jumlah KK</td>
                                <td class="px-6 py-2 text-center">
                                    <input type="number" value="{{ $data->kk_ada ?? 0 }}" readonly class="data-input w-32 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            </div>

            <div class="w-full lg:w-1/3">
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden h-full flex flex-col">
                    
                    <div class="bg-slate-50 px-5 py-4 border-b border-slate-200 flex justify-between items-center">
                        <h4 class="font-bold text-slate-800 uppercase tracking-wide text-sm">Data Jiwa Per Usia</h4>
                        <span class="text-[10px] font-bold bg-primary-100 text-primary-700 px-2.5 py-1 rounded-md">0 - 80+ Tahun</span>
                    </div>
                    <div class="max-h-[500px] overflow-y-auto lg:max-h-none lg:overflow-visible p-4 flex-1">
                        <table class="w-full text-sm border-collapse rounded-xl overflow-hidden ring-1 ring-slate-200">
                            <thead class="bg-slate-100 text-slate-600 border-b border-slate-200 text-xs tracking-wider uppercase">
                                <tr>
                                    <th class="px-2 py-3 font-bold text-center border-r border-slate-200">Umur</th>
                                    <th class="px-2 py-3 font-bold text-center border-r border-slate-200 text-primary-700 bg-primary-50/50">Total</th>
                                    <th class="px-2 py-3 font-bold text-center border-r border-slate-200">L</th>
                                    <th class="px-2 py-3 font-bold text-center">P</th>
                                </tr>
                            </thead>
                            
                            <tbody id="table-umur">
                                @for ($i = 0; $i <= 80; $i++)
                                    @php
                                        $uKey = $i == 80 ? '80+' : (string)$i;
                                        $uData = isset($data) ? $data->umurs->where('umur', $uKey)->first() : null;
                                        $uLaki = $uData ? $uData->laki : 0;
                                        $uPerempuan = $uData ? $uData->perempuan : 0;
                                    @endphp
                                    @include('components.row-umur', [
                                        'umur' => $uKey, 
                                        'laki' => $uLaki, 
                                        'perempuan' => $uPerempuan
                                    ])
                                @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
    @endif
    <div id="confirm-modal" class="fixed inset-0 z-[100] hidden flex items-center justify-center">
        <div class="absolute inset-0 bg-slate-900/40 backdrop-blur-sm transition-opacity opacity-0" id="modal-backdrop"></div>
        
        <div class="relative bg-white rounded-3xl p-8 max-w-sm w-full mx-4 shadow-2xl transform scale-95 opacity-0 transition-all duration-300" id="modal-content">
            <div class="w-16 h-16 bg-emerald-100 text-emerald-600 rounded-full flex items-center justify-center mx-auto mb-5 shadow-inner">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            </div>
            
            <h3 class="text-xl font-bold text-slate-800 text-center mb-2">Simpan Data?</h3>
            <p class="text-sm text-slate-500 text-center mb-8">Data kependudukan ini akan diperbarui dan hasilnya langsung dipublikasikan ke Landing Page.</p>
            
            <div class="flex gap-3">
                <button type="button" id="btn-modal-cancel" class="flex-1 py-3 px-4 bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold rounded-xl transition-colors focus:outline-none">
                    Batal
                </button>
                <button type="button" id="btn-modal-confirm" class="flex-1 py-3 px-4 bg-emerald-500 hover:bg-emerald-600 text-white font-semibold rounded-xl shadow-md transition-colors focus:outline-none">
                    Ya, Simpan
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const btnLoad = document.getElementById('btn-load-data');
        const editorSection = document.getElementById('data-editor-section');
        const titleEditor = document.getElementById('editor-period-title');
        
        const btnEdit = document.getElementById('btn-edit-mode');
        const btnSave = document.getElementById('btn-save-mode');
        const btnCancel = document.getElementById('btn-cancel-edit');
        const inputs = document.querySelectorAll('.data-input');
        const rowsMutasi = document.querySelectorAll('tr');
        rowsMutasi.forEach(row => {
            const inputL = row.querySelector('.input-laki');
            const inputP = row.querySelector('.input-perempuan');
            const inputTotal = row.querySelector('.input-total');

            if (inputL && inputP && inputTotal) {
                const calcTotal = () => {
                    inputTotal.value = (parseInt(inputL.value) || 0) + (parseInt(inputP.value) || 0);
                };
                inputL.addEventListener('input', calcTotal);
                inputP.addEventListener('input', calcTotal);
            }
        });

        const rowsUmur = document.querySelectorAll('#table-umur tr');
        rowsUmur.forEach(row => {
            const inputL = row.querySelector('.input-laki-umur');
            const inputP = row.querySelector('.input-perempuan-umur');
            const inputTotal = row.querySelector('.input-total-umur');

            if (inputL && inputP && inputTotal) {
                const calcTotalUmur = () => {
                    inputTotal.value = (parseInt(inputL.value) || 0) + (parseInt(inputP.value) || 0);
                };
                inputL.addEventListener('input', calcTotalUmur);
                inputP.addEventListener('input', calcTotalUmur);
            }
        });

        btnEdit.addEventListener('click', () => {
            btnEdit.classList.add('hidden');
            btnSave.classList.remove('hidden');
            btnCancel.classList.remove('hidden');
            
            inputs.forEach(input => {
                input.removeAttribute('readonly');
                input.classList.remove('bg-transparent', 'border-transparent');
                input.classList.add('bg-white', 'border-slate-300', 'shadow-inner');
            });
        });

        btnCancel.addEventListener('click', () => {
            window.location.reload();
        });
        btnSave.addEventListener('click', () => {
            const modal = document.getElementById('confirm-modal');
            const backdrop = document.getElementById('modal-backdrop');
            const content = document.getElementById('modal-content');
            
            modal.classList.remove('hidden');
            
            requestAnimationFrame(() => {
                backdrop.classList.remove('opacity-0');
                content.classList.remove('opacity-0', 'scale-95');
            });
        });

        document.getElementById('btn-modal-cancel').addEventListener('click', () => {
            const modal = document.getElementById('confirm-modal');
            const backdrop = document.getElementById('modal-backdrop');
            const content = document.getElementById('modal-content');
            
            backdrop.classList.add('opacity-0');
            content.classList.add('opacity-0', 'scale-95');
            
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);
        });

        document.getElementById('btn-modal-confirm').addEventListener('click', function() {
            this.innerHTML = '<svg class="animate-spin w-5 h-5 mx-auto text-white" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path></svg>';
            this.classList.add('opacity-75', 'cursor-not-allowed');
            document.getElementById('data-form').submit();
        });
    });
</script>
@endpush