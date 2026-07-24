@extends('layouts.admin')

@section('title', 'Data Management')

@section('content')
<div class="space-y-8 animate-fade-in-up">
    
    <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-4 border-b border-slate-200 pb-5">
        <div>
            <h2 class="text-2xl font-extrabold text-slate-800">Manajemen Laporan Bulanan</h2>
            <p class="text-slate-500 text-sm mt-1">Pilih periode, tinjau, lalu perbarui data administrasi desa.</p>
        </div>
    </div>

    <!-- STEP 1: PILIH PERIODE -->
    <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
        <h3 class="text-sm font-bold text-primary-600 uppercase tracking-wider mb-4">1. Pilih Periode Data</h3>
        <div class="flex flex-col sm:flex-row gap-4 items-end">
            <div class="w-full sm:w-auto">
                <label class="block text-xs font-semibold text-slate-500 mb-1">Bulan</label>
                <select id="manage-month" class="w-full bg-slate-50 border border-slate-300 text-slate-700 font-semibold py-2.5 px-4 rounded-xl focus:ring-2 focus:ring-primary-500 focus:outline-none">
                    <option value="08">Agustus</option>
                    <option value="07" selected>Juli</option>
                    <option value="06">Juni</option>
                </select>
            </div>
            <div class="w-full sm:w-auto">
                <label class="block text-xs font-semibold text-slate-500 mb-1">Tahun</label>
                <select id="manage-year" class="w-full bg-slate-50 border border-slate-300 text-slate-700 font-semibold py-2.5 px-4 rounded-xl focus:ring-2 focus:ring-primary-500 focus:outline-none">
                    <option value="2026" selected>2026</option>
                    <option value="2025">2025</option>
                </select>
            </div>
            <button id="btn-load-data" class="w-full sm:w-auto px-6 py-2.5 bg-slate-800 hover:bg-slate-900 text-white font-semibold rounded-xl transition-all shadow-md">
                Tampilkan Data
            </button>
        </div>
    </div>

    <!-- STEP 2: VIEW / EDIT DATA -->
    <div id="data-editor-section" class="hidden space-y-6 opacity-0 transition-opacity duration-500">
        
        <div class="flex justify-between items-center bg-primary-50 p-4 rounded-xl border border-primary-100">
            <span class="font-bold text-primary-700" id="editor-period-title">Data Laporan</span>
            <div class="flex gap-3">
                <button id="btn-edit-mode" type="button" class="px-5 py-2 bg-primary-600 hover:bg-primary-700 text-white font-semibold rounded-lg text-sm shadow-md transition-all flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                    Edit Data
                </button>
                <button id="btn-save-mode" type="button" class="hidden px-5 py-2 bg-emerald-600 hover:bg-emerald-700 text-white font-semibold rounded-lg text-sm shadow-md transition-all flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    Simpan Perubahan
                </button>
            </div>
        </div>

        <form id="data-form" class="space-y-6">
            
            <!-- SECTION I: Jumlah Penduduk -->
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
                        <tbody class="divide-y divide-slate-100 text-slate-700">
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 font-medium">a. Warga Negara Indonesia (WNI)</td>
                                <td class="px-6 py-2 text-center">
                                    <input type="number" value="2937" readonly class="data-input input-laki w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all">
                                </td>
                                <td class="px-6 py-2 text-center">
                                    <input type="number" value="2892" readonly class="data-input input-perempuan w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all">
                                </td>
                                <td class="px-6 py-4 text-center font-bold text-primary-600">
                                    <input type="number" value="5829" readonly class="input-total w-24 text-center bg-transparent border-transparent font-bold text-primary-600 outline-none pointer-events-none">
                                </td>
                            </tr>
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 font-medium">b. Warga Negara Asing (WNA)</td>
                                <td class="px-6 py-2 text-center">
                                    <input type="number" value="8" readonly class="data-input input-laki w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all">
                                </td>
                                <td class="px-6 py-2 text-center">
                                    <input type="number" value="4" readonly class="data-input input-perempuan w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all">
                                </td>
                                <td class="px-6 py-4 text-center font-bold text-primary-600">
                                    <input type="number" value="12" readonly class="input-total w-24 text-center bg-transparent border-transparent font-bold text-primary-600 outline-none pointer-events-none">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <!-- SECTION II : Jumlah Kelahiran, Meninggal, Datang & Pindah -->
            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                <div class="bg-slate-50 px-6 py-4 border-b border-slate-200">
                    <h4 class="font-bold text-slate-800 uppercase tracking-wide text-sm">II. Jumlah Kelahiran, Meninggal, Datang & Pindah</h4>
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
                        <tbody class="divide-y divide-slate-100 text-slate-700">
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 font-medium">a. Lahir</td>
                                <td class="px-6 py-2 text-center"><input type="number" value="4" readonly class="data-input input-laki w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all"></td>
                                <td class="px-6 py-2 text-center"><input type="number" value="2" readonly class="data-input input-perempuan w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all"></td>
                                <td class="px-6 py-4 text-center font-bold text-primary-600"><input type="number" value="6" readonly class="input-total w-24 text-center bg-transparent border-transparent font-bold outline-none pointer-events-none"></td>
                            </tr>
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 font-medium">b. Meninggal</td>
                                <td class="px-6 py-2 text-center"><input type="number" value="1" readonly class="data-input input-laki w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all"></td>
                                <td class="px-6 py-2 text-center"><input type="number" value="1" readonly class="data-input input-perempuan w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all"></td>
                                <td class="px-6 py-4 text-center font-bold text-primary-600"><input type="number" value="2" readonly class="input-total w-24 text-center bg-transparent border-transparent font-bold outline-none pointer-events-none"></td>
                            </tr>
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 font-medium">c. Datang</td>
                                <td class="px-6 py-2 text-center"><input type="number" value="9" readonly class="data-input input-laki w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all"></td>
                                <td class="px-6 py-2 text-center"><input type="number" value="10" readonly class="data-input input-perempuan w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all"></td>
                                <td class="px-6 py-4 text-center font-bold text-primary-600"><input type="number" value="19" readonly class="input-total w-24 text-center bg-transparent border-transparent font-bold outline-none pointer-events-none"></td>
                            </tr>
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 font-medium">d. Pindah</td>
                                <td class="px-6 py-2 text-center"><input type="number" value="3" readonly class="data-input input-laki w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all"></td>
                                <td class="px-6 py-2 text-center"><input type="number" value="11" readonly class="data-input input-perempuan w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all"></td>
                                <td class="px-6 py-4 text-center font-bold text-primary-600"><input type="number" value="14" readonly class="input-total w-24 text-center bg-transparent border-transparent font-bold outline-none pointer-events-none"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- SECTION III: Wajib KK -->
            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                <div class="bg-slate-50 px-6 py-4 border-b border-slate-200">
                    <h4 class="font-bold text-slate-800 uppercase tracking-wide text-sm">III. WAJIB KK</h4>
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
                                <td class="px-6 py-4 font-medium">a. Memiliki KK</td>
                                <td class="px-6 py-2 text-center">
                                    <input type="number" value="157" readonly class="data-input w-32 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all">
                                </td>
                            </tr>
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 font-medium">b. Belum Memiliki KK</td>
                                <td class="px-6 py-2 text-center">
                                    <input type="number" value="157" readonly class="data-input w-32 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- SECTION IV: Wajib KTP -->
            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                <div class="bg-slate-50 px-6 py-4 border-b border-slate-200">
                    <h4 class="font-bold text-slate-800 uppercase tracking-wide text-sm">IV. Wajib KTP</h4>
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
                        <tbody class="divide-y divide-slate-100 text-slate-700">
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 font-medium">a. Memiliki KTP</td>
                                <td class="px-6 py-2 text-center"><input type="number" value="4" readonly class="data-input input-laki w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all"></td>
                                <td class="px-6 py-2 text-center"><input type="number" value="2" readonly class="data-input input-perempuan w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all"></td>
                                <td class="px-6 py-4 text-center font-bold text-primary-600"><input type="number" value="6" readonly class="input-total w-24 text-center bg-transparent border-transparent font-bold outline-none pointer-events-none"></td>
                            </tr>
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 font-medium">b. Belum Memiliki KTP</td>
                                <td class="px-6 py-2 text-center"><input type="number" value="1" readonly class="data-input input-laki w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all"></td>
                                <td class="px-6 py-2 text-center"><input type="number" value="1" readonly class="data-input input-perempuan w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all"></td>
                                <td class="px-6 py-4 text-center font-bold text-primary-600"><input type="number" value="2" readonly class="input-total w-24 text-center bg-transparent border-transparent font-bold outline-none pointer-events-none"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- SECTION V: Penduduk Menurut Agama -->
            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                <div class="bg-slate-50 px-6 py-4 border-b border-slate-200">
                    <h4 class="font-bold text-slate-800 uppercase tracking-wide text-sm">V. Penduduk Menurut Agama</h4>
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
                        <tbody class="divide-y divide-slate-100 text-slate-700">
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 font-medium">a. Kristen</td>
                                <td class="px-6 py-2 text-center"><input type="number" value="1874" readonly class="data-input input-laki w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all"></td>
                                <td class="px-6 py-2 text-center"><input type="number" value="1938" readonly class="data-input input-perempuan w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all"></td>
                                <td class="px-6 py-4 text-center font-bold text-primary-600"><input type="number" value="3812" readonly class="input-total w-24 text-center bg-transparent border-transparent font-bold text-primary-600 outline-none pointer-events-none"></td>
                            </tr>
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 font-medium">b. Katholik</td>
                                <td class="px-6 py-2 text-center"><input type="number" value="345" readonly class="data-input input-laki w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all"></td>
                                <td class="px-6 py-2 text-center"><input type="number" value="332" readonly class="data-input input-perempuan w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all"></td>
                                <td class="px-6 py-4 text-center font-bold text-primary-600"><input type="number" value="677" readonly class="input-total w-24 text-center bg-transparent border-transparent font-bold text-primary-600 outline-none pointer-events-none"></td>
                            </tr>
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 font-medium">c. Islam</td>
                                <td class="px-6 py-2 text-center"><input type="number" value="715" readonly class="data-input input-laki w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all"></td>
                                <td class="px-6 py-2 text-center"><input type="number" value="618" readonly class="data-input input-perempuan w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all"></td>
                                <td class="px-6 py-4 text-center font-bold text-primary-600"><input type="number" value="1333" readonly class="input-total w-24 text-center bg-transparent border-transparent font-bold text-primary-600 outline-none pointer-events-none"></td>
                            </tr>
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 font-medium">d. Hindu</td>
                                <td class="px-6 py-2 text-center"><input type="number" value="3" readonly class="data-input input-laki w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all"></td>
                                <td class="px-6 py-2 text-center"><input type="number" value="4" readonly class="data-input input-perempuan w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all"></td>
                                <td class="px-6 py-4 text-center font-bold text-primary-600"><input type="number" value="7" readonly class="input-total w-24 text-center bg-transparent border-transparent font-bold text-primary-600 outline-none pointer-events-none"></td>
                            </tr>
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 font-medium">e. Buddha</td>
                                <td class="px-6 py-2 text-center"><input type="number" value="0" readonly class="data-input input-laki w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all"></td>
                                <td class="px-6 py-2 text-center"><input type="number" value="0" readonly class="data-input input-perempuan w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all"></td>
                                <td class="px-6 py-4 text-center font-bold text-primary-600"><input type="number" value="0" readonly class="input-total w-24 text-center bg-transparent border-transparent font-bold text-primary-600 outline-none pointer-events-none"></td>
                            </tr>
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 font-medium">f. Konghucu</td>
                                <td class="px-6 py-2 text-center"><input type="number" value="0" readonly class="data-input input-laki w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all"></td>
                                <td class="px-6 py-2 text-center"><input type="number" value="0" readonly class="data-input input-perempuan w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all"></td>
                                <td class="px-6 py-4 text-center font-bold text-primary-600"><input type="number" value="0" readonly class="input-total w-24 text-center bg-transparent border-transparent font-bold text-primary-600 outline-none pointer-events-none"></td>
                            </tr>
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 font-medium">g. Lainnya</td>
                                <td class="px-6 py-2 text-center"><input type="number" value="0" readonly class="data-input input-laki w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all"></td>
                                <td class="px-6 py-2 text-center"><input type="number" value="0" readonly class="data-input input-perempuan w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all"></td>
                                <td class="px-6 py-4 text-center font-bold text-primary-600"><input type="number" value="0" readonly class="input-total w-24 text-center bg-transparent border-transparent font-bold text-primary-600 outline-none pointer-events-none"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- SECTION VI: Penduduk Menurut Pendidikan -->
            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                <div class="bg-slate-50 px-6 py-4 border-b border-slate-200">
                    <h4 class="font-bold text-slate-800 uppercase tracking-wide text-sm">VI. Penduduk Menurut Pendidikan</h4>
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
                        <tbody class="divide-y divide-slate-100 text-slate-700">
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 font-medium">a. TK</td>
                                <td class="px-6 py-2 text-center"><input type="number" value="40" readonly class="data-input input-laki w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all"></td>
                                <td class="px-6 py-2 text-center"><input type="number" value="28" readonly class="data-input input-perempuan w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all"></td>
                                <td class="px-6 py-4 text-center font-bold text-primary-600"><input type="number" value="68" readonly class="input-total w-24 text-center bg-transparent border-transparent font-bold text-primary-600 outline-none pointer-events-none"></td>
                            </tr>
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 font-medium">b. SD</td>
                                <td class="px-6 py-2 text-center"><input type="number" value="281" readonly class="data-input input-laki w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all"></td>
                                <td class="px-6 py-2 text-center"><input type="number" value="342" readonly class="data-input input-perempuan w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all"></td>
                                <td class="px-6 py-4 text-center font-bold text-primary-600"><input type="number" value="623" readonly class="input-total w-24 text-center bg-transparent border-transparent font-bold text-primary-600 outline-none pointer-events-none"></td>
                            </tr>
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 font-medium">c. SMP</td>
                                <td class="px-6 py-2 text-center"><input type="number" value="153" readonly class="data-input input-laki w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all"></td>
                                <td class="px-6 py-2 text-center"><input type="number" value="171" readonly class="data-input input-perempuan w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all"></td>
                                <td class="px-6 py-4 text-center font-bold text-primary-600"><input type="number" value="324" readonly class="input-total w-24 text-center bg-transparent border-transparent font-bold text-primary-600 outline-none pointer-events-none"></td>
                            </tr>
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 font-medium">d. SMA</td>
                                <td class="px-6 py-2 text-center"><input type="number" value="119" readonly class="data-input input-laki w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all"></td>
                                <td class="px-6 py-2 text-center"><input type="number" value="111" readonly class="data-input input-perempuan w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all"></td>
                                <td class="px-6 py-4 text-center font-bold text-primary-600"><input type="number" value="230" readonly class="input-total w-24 text-center bg-transparent border-transparent font-bold text-primary-600 outline-none pointer-events-none"></td>
                            </tr>
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 font-medium">e. Perguruan Tinggi</td>
                                <td class="px-6 py-2 text-center"><input type="number" value="108" readonly class="data-input input-laki w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all"></td>
                                <td class="px-6 py-2 text-center"><input type="number" value="153" readonly class="data-input input-perempuan w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all"></td>
                                <td class="px-6 py-4 text-center font-bold text-primary-600"><input type="number" value="261" readonly class="input-total w-24 text-center bg-transparent border-transparent font-bold text-primary-600 outline-none pointer-events-none"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- SECTION VII: Usia Yang Putus Sekolah -->
            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                <div class="bg-slate-50 px-6 py-4 border-b border-slate-200">
                    <h4 class="font-bold text-slate-800 uppercase tracking-wide text-sm">VII. Usia Yang Putus Sekolah</h4>
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
                        <tbody class="divide-y divide-slate-100 text-slate-700">
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 font-medium">a. Tidak Pernah Sekolah</td>
                                <td class="px-6 py-2 text-center"><input type="number" value="5" readonly class="data-input input-laki w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all"></td>
                                <td class="px-6 py-2 text-center"><input type="number" value="4" readonly class="data-input input-perempuan w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all"></td>
                                <td class="px-6 py-4 text-center font-bold text-primary-600"><input type="number" value="9" readonly class="input-total w-24 text-center bg-transparent border-transparent font-bold text-primary-600 outline-none pointer-events-none"></td>
                            </tr>
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 font-medium">b. TK</td>
                                <td class="px-6 py-2 text-center"><input type="number" value="0" readonly class="data-input input-laki w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all"></td>
                                <td class="px-6 py-2 text-center"><input type="number" value="0" readonly class="data-input input-perempuan w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all"></td>
                                <td class="px-6 py-4 text-center font-bold text-primary-600"><input type="number" value="0" readonly class="input-total w-24 text-center bg-transparent border-transparent font-bold text-primary-600 outline-none pointer-events-none"></td>
                            </tr>
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 font-medium">c. SD</td>
                                <td class="px-6 py-2 text-center"><input type="number" value="92" readonly class="data-input input-laki w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all"></td>
                                <td class="px-6 py-2 text-center"><input type="number" value="87" readonly class="data-input input-perempuan w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all"></td>
                                <td class="px-6 py-4 text-center font-bold text-primary-600"><input type="number" value="179" readonly class="input-total w-24 text-center bg-transparent border-transparent font-bold text-primary-600 outline-none pointer-events-none"></td>
                            </tr>
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 font-medium">d. SMP</td>
                                <td class="px-6 py-2 text-center"><input type="number" value="45" readonly class="data-input input-laki w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all"></td>
                                <td class="px-6 py-2 text-center"><input type="number" value="35" readonly class="data-input input-perempuan w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all"></td>
                                <td class="px-6 py-4 text-center font-bold text-primary-600"><input type="number" value="80" readonly class="input-total w-24 text-center bg-transparent border-transparent font-bold text-primary-600 outline-none pointer-events-none"></td>
                            </tr>
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 font-medium">e. SMA</td>
                                <td class="px-6 py-2 text-center"><input type="number" value="62" readonly class="data-input input-laki w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all"></td>
                                <td class="px-6 py-2 text-center"><input type="number" value="58" readonly class="data-input input-perempuan w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all"></td>
                                <td class="px-6 py-4 text-center font-bold text-primary-600"><input type="number" value="120" readonly class="input-total w-24 text-center bg-transparent border-transparent font-bold text-primary-600 outline-none pointer-events-none"></td>
                            </tr>
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 font-medium">f. Cacat Fisik</td>
                                <td class="px-6 py-2 text-center"><input type="number" value="0" readonly class="data-input input-laki w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all"></td>
                                <td class="px-6 py-2 text-center"><input type="number" value="0" readonly class="data-input input-perempuan w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all"></td>
                                <td class="px-6 py-4 text-center font-bold text-primary-600"><input type="number" value="0" readonly class="input-total w-24 text-center bg-transparent border-transparent font-bold text-primary-600 outline-none pointer-events-none"></td>
                            </tr>
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 font-medium">g. Cacat Mental</td>
                                <td class="px-6 py-2 text-center"><input type="number" value="0" readonly class="data-input input-laki w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all"></td>
                                <td class="px-6 py-2 text-center"><input type="number" value="0" readonly class="data-input input-perempuan w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all"></td>
                                <td class="px-6 py-4 text-center font-bold text-primary-600"><input type="number" value="0" readonly class="input-total w-24 text-center bg-transparent border-transparent font-bold text-primary-600 outline-none pointer-events-none"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- SECTION VIII: Penduduk Menurut Pekerjaan -->
            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                <div class="bg-slate-50 px-6 py-4 border-b border-slate-200">
                    <h4 class="font-bold text-slate-800 uppercase tracking-wide text-sm">VIII. Penduduk Menurut Pekerjaan</h4>
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
                        <tbody class="divide-y divide-slate-100 text-slate-700">
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 font-medium">a. ASN Pegawai</td>
                                <td class="px-6 py-2 text-center"><input type="number" value="36" readonly class="data-input input-laki w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all"></td>
                                <td class="px-6 py-2 text-center"><input type="number" value="44" readonly class="data-input input-perempuan w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all"></td>
                                <td class="px-6 py-4 text-center font-bold text-primary-600"><input type="number" value="80" readonly class="input-total w-24 text-center bg-transparent border-transparent font-bold text-primary-600 outline-none pointer-events-none"></td>
                            </tr>
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 font-medium">b. ASN Guru</td>
                                <td class="px-6 py-2 text-center"><input type="number" value="5" readonly class="data-input input-laki w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all"></td>
                                <td class="px-6 py-2 text-center"><input type="number" value="19" readonly class="data-input input-perempuan w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all"></td>
                                <td class="px-6 py-4 text-center font-bold text-primary-600"><input type="number" value="24" readonly class="input-total w-24 text-center bg-transparent border-transparent font-bold text-primary-600 outline-none pointer-events-none"></td>
                            </tr>
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 font-medium">c. TNI</td>
                                <td class="px-6 py-2 text-center"><input type="number" value="12" readonly class="data-input input-laki w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all"></td>
                                <td class="px-6 py-2 text-center"><input type="number" value="0" readonly class="data-input input-perempuan w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all"></td>
                                <td class="px-6 py-4 text-center font-bold text-primary-600"><input type="number" value="12" readonly class="input-total w-24 text-center bg-transparent border-transparent font-bold text-primary-600 outline-none pointer-events-none"></td>
                            </tr>
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 font-medium">d. POLRI</td>
                                <td class="px-6 py-2 text-center"><input type="number" value="15" readonly class="data-input input-laki w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all"></td>
                                <td class="px-6 py-2 text-center"><input type="number" value="1" readonly class="data-input input-perempuan w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all"></td>
                                <td class="px-6 py-4 text-center font-bold text-primary-600"><input type="number" value="16" readonly class="input-total w-24 text-center bg-transparent border-transparent font-bold text-primary-600 outline-none pointer-events-none"></td>
                            </tr>
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 font-medium">e. Petani</td>
                                <td class="px-6 py-2 text-center"><input type="number" value="68" readonly class="data-input input-laki w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all"></td>
                                <td class="px-6 py-2 text-center"><input type="number" value="13" readonly class="data-input input-perempuan w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all"></td>
                                <td class="px-6 py-4 text-center font-bold text-primary-600"><input type="number" value="81" readonly class="input-total w-24 text-center bg-transparent border-transparent font-bold text-primary-600 outline-none pointer-events-none"></td>
                            </tr>
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 font-medium">f. Tukang</td>
                                <td class="px-6 py-2 text-center"><input type="number" value="125" readonly class="data-input input-laki w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all"></td>
                                <td class="px-6 py-2 text-center"><input type="number" value="0" readonly class="data-input input-perempuan w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all"></td>
                                <td class="px-6 py-4 text-center font-bold text-primary-600"><input type="number" value="125" readonly class="input-total w-24 text-center bg-transparent border-transparent font-bold text-primary-600 outline-none pointer-events-none"></td>
                            </tr>
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 font-medium">g. Pelaut</td>
                                <td class="px-6 py-2 text-center"><input type="number" value="58" readonly class="data-input input-laki w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all"></td>
                                <td class="px-6 py-2 text-center"><input type="number" value="0" readonly class="data-input input-perempuan w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all"></td>
                                <td class="px-6 py-4 text-center font-bold text-primary-600"><input type="number" value="58" readonly class="input-total w-24 text-center bg-transparent border-transparent font-bold text-primary-600 outline-none pointer-events-none"></td>
                            </tr>
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 font-medium">h. Nelayan</td>
                                <td class="px-6 py-2 text-center"><input type="number" value="233" readonly class="data-input input-laki w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all"></td>
                                <td class="px-6 py-2 text-center"><input type="number" value="0" readonly class="data-input input-perempuan w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all"></td>
                                <td class="px-6 py-4 text-center font-bold text-primary-600"><input type="number" value="233" readonly class="input-total w-24 text-center bg-transparent border-transparent font-bold text-primary-600 outline-none pointer-events-none"></td>
                            </tr>
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 font-medium">i. Buruh</td>
                                <td class="px-6 py-2 text-center"><input type="number" value="118" readonly class="data-input input-laki w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all"></td>
                                <td class="px-6 py-2 text-center"><input type="number" value="6" readonly class="data-input input-perempuan w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all"></td>
                                <td class="px-6 py-4 text-center font-bold text-primary-600"><input type="number" value="124" readonly class="input-total w-24 text-center bg-transparent border-transparent font-bold text-primary-600 outline-none pointer-events-none"></td>
                            </tr>
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 font-medium">j. Wiraswasta</td>
                                <td class="px-6 py-2 text-center"><input type="number" value="111" readonly class="data-input input-laki w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all"></td>
                                <td class="px-6 py-2 text-center"><input type="number" value="0" readonly class="data-input input-perempuan w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all"></td>
                                <td class="px-6 py-4 text-center font-bold text-primary-600"><input type="number" value="111" readonly class="input-total w-24 text-center bg-transparent border-transparent font-bold text-primary-600 outline-none pointer-events-none"></td>
                            </tr>
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 font-medium">k. Karyawan Swasta</td>
                                <td class="px-6 py-2 text-center"><input type="number" value="136" readonly class="data-input input-laki w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all"></td>
                                <td class="px-6 py-2 text-center"><input type="number" value="83" readonly class="data-input input-perempuan w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all"></td>
                                <td class="px-6 py-4 text-center font-bold text-primary-600"><input type="number" value="219" readonly class="input-total w-24 text-center bg-transparent border-transparent font-bold text-primary-600 outline-none pointer-events-none"></td>
                            </tr>
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 font-medium">l. Karyawan BUMD/BUMN</td>
                                <td class="px-6 py-2 text-center"><input type="number" value="11" readonly class="data-input input-laki w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all"></td>
                                <td class="px-6 py-2 text-center"><input type="number" value="22" readonly class="data-input input-perempuan w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all"></td>
                                <td class="px-6 py-4 text-center font-bold text-primary-600"><input type="number" value="33" readonly class="input-total w-24 text-center bg-transparent border-transparent font-bold text-primary-600 outline-none pointer-events-none"></td>
                            </tr>
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 font-medium">m. IRT/PRT</td>
                                <td class="px-6 py-2 text-center"><input type="number" value="0" readonly class="data-input input-laki w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all"></td>
                                <td class="px-6 py-2 text-center"><input type="number" value="388" readonly class="data-input input-perempuan w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all"></td>
                                <td class="px-6 py-4 text-center font-bold text-primary-600"><input type="number" value="388" readonly class="input-total w-24 text-center bg-transparent border-transparent font-bold text-primary-600 outline-none pointer-events-none"></td>
                            </tr>
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 font-medium">n. Pendeta</td>
                                <td class="px-6 py-2 text-center"><input type="number" value="4" readonly class="data-input input-laki w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all"></td>
                                <td class="px-6 py-2 text-center"><input type="number" value="0" readonly class="data-input input-perempuan w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all"></td>
                                <td class="px-6 py-4 text-center font-bold text-primary-600"><input type="number" value="4" readonly class="input-total w-24 text-center bg-transparent border-transparent font-bold text-primary-600 outline-none pointer-events-none"></td>
                            </tr>
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 font-medium">o. Imam</td>
                                <td class="px-6 py-2 text-center"><input type="number" value="5" readonly class="data-input input-laki w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all"></td>
                                <td class="px-6 py-2 text-center"><input type="number" value="0" readonly class="data-input input-perempuan w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all"></td>
                                <td class="px-6 py-4 text-center font-bold text-primary-600"><input type="number" value="5" readonly class="input-total w-24 text-center bg-transparent border-transparent font-bold text-primary-600 outline-none pointer-events-none"></td>
                            </tr>
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 font-medium">p. Sopir</td>
                                <td class="px-6 py-2 text-center"><input type="number" value="95" readonly class="data-input input-laki w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all"></td>
                                <td class="px-6 py-2 text-center"><input type="number" value="0" readonly class="data-input input-perempuan w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all"></td>
                                <td class="px-6 py-4 text-center font-bold text-primary-600"><input type="number" value="95" readonly class="input-total w-24 text-center bg-transparent border-transparent font-bold text-primary-600 outline-none pointer-events-none"></td>
                            </tr>
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 font-medium">q. Belum/Tidak Bekerja</td>
                                <td class="px-6 py-2 text-center"><input type="number" value="30" readonly class="data-input input-laki w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all"></td>
                                <td class="px-6 py-2 text-center"><input type="number" value="13" readonly class="data-input input-perempuan w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all"></td>
                                <td class="px-6 py-4 text-center font-bold text-primary-600"><input type="number" value="43" readonly class="input-total w-24 text-center bg-transparent border-transparent font-bold text-primary-600 outline-none pointer-events-none"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- SECTION IX: Kondisi Bangunan -->
            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                <div class="bg-slate-50 px-6 py-4 border-b border-slate-200">
                    <h4 class="font-bold text-slate-800 uppercase tracking-wide text-sm">IX. Kondisi Bangunan</h4>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm whitespace-nowrap">
                        <thead class="bg-white text-slate-500 border-b border-slate-200">
                            <tr>
                                <th class="px-6 py-3 font-semibold w-2/3">Uraian</th>
                                <th class="px-6 py-3 font-semibold text-center w-1/3">Jumlah Bangunan</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-slate-100 text-slate-700">

                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 font-medium">a. Darurat</td>
                                <td class="px-6 py-2 text-center">
                                    <input type="number" value="39" readonly class="data-input w-32 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all">
                                </td>
                            </tr>

                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 font-medium">b. Semi Permanen</td>
                                <td class="px-6 py-2 text-center">
                                    <input type="number" value="301" readonly class="data-input w-32 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all">
                                </td>
                            </tr>

                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 font-medium">c. Permanen</td>
                                <td class="px-6 py-2 text-center">
                                    <input type="number" value="415" readonly class="data-input w-32 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all">
                                </td>
                            </tr>

                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 font-medium">d. Lainnya</td>
                                <td class="px-6 py-2 text-center">
                                    <input type="number" value="0" readonly class="data-input w-32 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- SECTION X: Kendaraan Bermotor -->
            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                <div class="bg-slate-50 px-6 py-4 border-b border-slate-200">
                    <h4 class="font-bold text-slate-800 uppercase tracking-wide text-sm">X. Kendaraan Bermotor</h4>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm whitespace-nowrap">
                        <thead class="bg-white text-slate-500 border-b border-slate-200">
                            <tr>
                                <th class="px-6 py-3 font-semibold w-2/3">Jenis Kendaraan</th>
                                <th class="px-6 py-3 font-semibold text-center w-1/3">Jumlah Unit</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-slate-100 text-slate-700">

                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 font-medium">a. Sepeda Motor</td>
                                <td class="px-6 py-2 text-center">
                                    <input type="number" value="205" readonly class="data-input w-32 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all">
                                </td>
                            </tr>

                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 font-medium">b. Mobil Pribadi</td>
                                <td class="px-6 py-2 text-center">
                                    <input type="number" value="167" readonly class="data-input w-32 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all">
                                </td>
                            </tr>

                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 font-medium">c. Bus</td>
                                <td class="px-6 py-2 text-center">
                                    <input type="number" value="7" readonly class="data-input w-32 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all">
                                </td>
                            </tr>

                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 font-medium">d. Mikrolet</td>
                                <td class="px-6 py-2 text-center">
                                    <input type="number" value="5" readonly class="data-input w-32 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all">
                                </td>
                            </tr>

                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 font-medium">e. Truck</td>
                                <td class="px-6 py-2 text-center">
                                    <input type="number" value="48" readonly class="data-input w-32 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all">
                                </td>
                            </tr>

                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 font-medium">f. Pick Up</td>
                                <td class="px-6 py-2 text-center">
                                    <input type="number" value="5" readonly class="data-input w-32 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- SECTION XII: Data Domisili -->
            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                <div class="bg-slate-50 px-6 py-4 border-b border-slate-200">
                    <h4 class="font-bold text-slate-800 uppercase tracking-wide text-sm">XII. Kegiatan Pelayanan</h4>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm whitespace-nowrap">
                        <thead class="bg-white text-slate-500 border-b border-slate-200">
                            <tr>
                                <th class="px-6 py-3 font-semibold w-2/3">Jenis Pelayanan</th>
                                <th class="px-6 py-3 font-semibold text-center w-1/3">Jumlah Jemaat</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-slate-100 text-slate-700">

                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 font-medium">Jumlah KK</td>
                                <td class="px-6 py-2 text-center">
                                    <input type="number" value="157" readonly class="data-input w-32 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
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
        const inputs = document.querySelectorAll('.data-input');

        // Kalkulasi Auto-sum Dinamis untuk setiap baris (Laki-laki + Perempuan = Total)
        const rows = document.querySelectorAll('tr');
        rows.forEach(row => {
            const inputL = row.querySelector('.input-laki');
            const inputP = row.querySelector('.input-perempuan');
            const inputTotal = row.querySelector('.input-total');

            if (inputL && inputP && inputTotal) {
                const calcTotal = () => {
                    const l = parseInt(inputL.value) || 0;
                    const p = parseInt(inputP.value) || 0;
                    inputTotal.value = l + p;
                };
                inputL.addEventListener('input', calcTotal);
                inputP.addEventListener('input', calcTotal);
            }
        });

        // Tombol Tampilkan Data
        btnLoad.addEventListener('click', () => {
            const mText = document.getElementById('manage-month').options[document.getElementById('manage-month').selectedIndex].text;
            const yText = document.getElementById('manage-year').value;
            titleEditor.textContent = `Data Laporan: ${mText} ${yText}`;
            
            editorSection.classList.remove('hidden');
            setTimeout(() => editorSection.classList.remove('opacity-0'), 50);
        });

        // Toggle Edit Mode
        btnEdit.addEventListener('click', () => {
            btnEdit.classList.add('hidden');
            btnSave.classList.remove('hidden');
            
            inputs.forEach(input => {
                input.removeAttribute('readonly');
                input.classList.remove('bg-transparent', 'border-transparent');
                input.classList.add('bg-white', 'border-slate-300', 'shadow-inner');
            });
        });

        // Toggle Save Mode (Konfirmasi)
        btnSave.addEventListener('click', () => {
            if(confirm("Apakah Anda yakin ingin menyimpan perubahan data? Laporan ini akan dipublikasikan ke Landing Page.")) {
                btnSave.classList.add('hidden');
                btnEdit.classList.remove('hidden');
                
                inputs.forEach(input => {
                    input.setAttribute('readonly', 'true');
                    input.classList.add('bg-transparent', 'border-transparent');
                    input.classList.remove('bg-white', 'border-slate-300', 'shadow-inner');
                });
                
                alert("Data berhasil diperbarui!");
            }
        });
    });
</script>
@endpush