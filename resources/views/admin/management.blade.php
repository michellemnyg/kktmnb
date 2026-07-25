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

        <form id="data-form" class="flex flex-col lg:flex-row gap-6 items-start">
            
            <!-- KOLOM KIRI: Laporan Utama (Section I - XII) -->
            <div class="w-full lg:w-2/3 space-y-6">
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
                            <tbody class="divide-y divide-slate-100 text-slate-700" id="table-penduduk">
                                @include('components.row-mutasi', ['label' => 'a. WNA', 'laki' => 0, 'perempuan' => 0])
                                @include('components.row-mutasi', ['label' => 'b. WNI', 'laki' => 2937, 'perempuan' => 2892])
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <!-- SECTION II: Mutasi -->
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
                                @include('components.row-mutasi', ['label' => 'a. Lahir', 'laki' => 4, 'perempuan' => 2])
                                @include('components.row-mutasi', ['label' => 'b. Meninggal', 'laki' => 1, 'perempuan' => 1])
                                @include('components.row-mutasi', ['label' => 'c. Datang', 'laki' => 9, 'perempuan' => 10])
                                @include('components.row-mutasi', ['label' => 'd. Pindah', 'laki' => 3, 'perempuan' => 11])
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- SECTION III & IV: Wajib KK & KTP -->
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                    <div class="bg-slate-50 px-6 py-4 border-b border-slate-200">
                        <h4 class="font-bold text-slate-800 uppercase tracking-wide text-sm">III. Wajib KK & IV. Wajib KTP</h4>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm whitespace-nowrap">
                            <tbody class="divide-y divide-slate-100 text-slate-700">
                                <tr class="bg-slate-50/50"><td class="px-6 py-3 font-bold text-primary-700" colspan="2">WAJIB KK</td></tr>
                                <tr class="hover:bg-slate-50"><td class="px-6 py-4 font-medium w-1/2 pl-10">a. Memiliki KK</td><td class="px-6 py-2"><input type="number" value="1379" readonly class="data-input w-32 bg-transparent border-transparent focus:ring-1 rounded-md py-1 outline-none transition-all"> Keluarga</td></tr>
                                <tr class="hover:bg-slate-50"><td class="px-6 py-4 font-medium w-1/2 pl-10">b. Belum Memiliki KK</td><td class="px-6 py-2"><input type="number" value="551" readonly class="data-input w-32 bg-transparent border-transparent focus:ring-1 rounded-md py-1 outline-none transition-all"> Keluarga</td></tr>
                                <tr class="bg-slate-50/50"><td class="px-6 py-3 font-bold text-primary-700" colspan="2">WAJIB KTP</td></tr>
                                @include('components.row-mutasi', ['label' => 'a. Memiliki KTP', 'laki' => 1187, 'perempuan' => 1181])
                                @include('components.row-mutasi', ['label' => 'b. Belum Memiliki KTP', 'laki' => 755, 'perempuan' => 720])
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- SECTION V: Agama -->
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                    <div class="bg-slate-50 px-6 py-4 border-b border-slate-200">
                        <h4 class="font-bold text-slate-800 uppercase tracking-wide text-sm">V. Penduduk Menurut Agama</h4>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm whitespace-nowrap">
                            <tbody class="divide-y divide-slate-100 text-slate-700">
                                @include('components.row-mutasi', ['label' => 'a. Kristen', 'laki' => 1874, 'perempuan' => 1938])
                                @include('components.row-mutasi', ['label' => 'b. Katholik', 'laki' => 345, 'perempuan' => 332])
                                @include('components.row-mutasi', ['label' => 'c. Islam', 'laki' => 715, 'perempuan' => 618])
                                @include('components.row-mutasi', ['label' => 'd. Hindu', 'laki' => 3, 'perempuan' => 4])
                                @include('components.row-mutasi', ['label' => 'e. Buddha', 'laki' => 0, 'perempuan' => 0])
                                @include('components.row-mutasi', ['label' => 'f. Konghucu', 'laki' => 0, 'perempuan' => 0])
                                @include('components.row-mutasi', ['label' => 'g. Lainnya', 'laki' => 0, 'perempuan' => 0])
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- SECTION VI: Pendidikan -->
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                    <div class="bg-slate-50 px-6 py-4 border-b border-slate-200">
                        <h4 class="font-bold text-slate-800 uppercase tracking-wide text-sm">VI. Penduduk Menurut Pendidikan</h4>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm whitespace-nowrap">
                            <tbody class="divide-y divide-slate-100 text-slate-700">
                                @include('components.row-mutasi', ['label' => 'a. TK', 'laki' => 40, 'perempuan' => 28])
                                @include('components.row-mutasi', ['label' => 'b. SD', 'laki' => 281, 'perempuan' => 342])
                                @include('components.row-mutasi', ['label' => 'c. SMP', 'laki' => 153, 'perempuan' => 171])
                                @include('components.row-mutasi', ['label' => 'd. SMA', 'laki' => 119, 'perempuan' => 111])
                                @include('components.row-mutasi', ['label' => 'e. Perguruan Tinggi', 'laki' => 108, 'perempuan' => 153])
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- SECTION VII: Usia Putus Sekolah -->
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                    <div class="bg-slate-50 px-6 py-4 border-b border-slate-200">
                        <h4 class="font-bold text-slate-800 uppercase tracking-wide text-sm">VII. Usia Yang Putus Sekolah</h4>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm whitespace-nowrap">
                            <tbody class="divide-y divide-slate-100 text-slate-700">
                                @include('components.row-mutasi', ['label' => 'a. Tidak Pernah Sekolah', 'laki' => 5, 'perempuan' => 4])
                                @include('components.row-mutasi', ['label' => 'b. TK', 'laki' => 0, 'perempuan' => 0])
                                @include('components.row-mutasi', ['label' => 'c. SD', 'laki' => 92, 'perempuan' => 87])
                                @include('components.row-mutasi', ['label' => 'd. SMP', 'laki' => 45, 'perempuan' => 35])
                                @include('components.row-mutasi', ['label' => 'e. SMA', 'laki' => 62, 'perempuan' => 58])
                                @include('components.row-mutasi', ['label' => 'f. Cacat Fisik', 'laki' => 0, 'perempuan' => 0])
                                @include('components.row-mutasi', ['label' => 'g. Cacat Mental', 'laki' => 0, 'perempuan' => 0])
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- SECTION VIII: Pekerjaan -->
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                    <div class="bg-slate-50 px-6 py-4 border-b border-slate-200">
                        <h4 class="font-bold text-slate-800 uppercase tracking-wide text-sm">VIII. Penduduk Menurut Pekerjaan</h4>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm whitespace-nowrap">
                            <tbody class="divide-y divide-slate-100 text-slate-700">
                                @include('components.row-mutasi', ['label' => 'a. ASN Pegawai', 'laki' => 36, 'perempuan' => 44])
                                @include('components.row-mutasi', ['label' => 'b. ASN Guru', 'laki' => 5, 'perempuan' => 19])
                                @include('components.row-mutasi', ['label' => 'c. TNI', 'laki' => 12, 'perempuan' => 0])
                                @include('components.row-mutasi', ['label' => 'd. POLRI', 'laki' => 15, 'perempuan' => 1])
                                @include('components.row-mutasi', ['label' => 'e. Petani', 'laki' => 68, 'perempuan' => 13])
                                @include('components.row-mutasi', ['label' => 'f. Tukang', 'laki' => 125, 'perempuan' => 0])
                                @include('components.row-mutasi', ['label' => 'g. Pelaut', 'laki' => 58, 'perempuan' => 0])
                                @include('components.row-mutasi', ['label' => 'h. Nelayan', 'laki' => 233, 'perempuan' => 0])
                                @include('components.row-mutasi', ['label' => 'i. Buruh', 'laki' => 118, 'perempuan' => 6])
                                @include('components.row-mutasi', ['label' => 'j. Wiraswasta', 'laki' => 111, 'perempuan' => 0])
                                @include('components.row-mutasi', ['label' => 'k. Karyawan Swasta', 'laki' => 136, 'perempuan' => 83])
                                @include('components.row-mutasi', ['label' => 'l. Karyawan BUMN/BUMD', 'laki' => 11, 'perempuan' => 22])
                                @include('components.row-mutasi', ['label' => 'm. IRT/PRT', 'laki' => 0, 'perempuan' => 388])
                                @include('components.row-mutasi', ['label' => 'n. Pendeta', 'laki' => 4, 'perempuan' => 0])
                                @include('components.row-mutasi', ['label' => 'o. Imam', 'laki' => 5, 'perempuan' => 0])
                                @include('components.row-mutasi', ['label' => 'p. Sopir', 'laki' => 95, 'perempuan' => 0])
                                @include('components.row-mutasi', ['label' => 'q. Belum/Tidak Bekerja', 'laki' => 30, 'perempuan' => 13])
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- SECTION IX: Bangunan -->
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                    <div class="bg-slate-50 px-6 py-4 border-b border-slate-200">
                        <h4 class="font-bold text-slate-800 uppercase tracking-wide text-sm">IX. Kondisi Bangunan</h4>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm whitespace-nowrap">
                            <tbody class="divide-y divide-slate-100 text-slate-700">
                                <tr class="hover:bg-slate-50"><td class="px-6 py-4 font-medium w-1/2">a. Darurat</td><td class="px-6 py-2"><input type="number" value="39" readonly class="data-input w-32 bg-transparent border-transparent focus:ring-1 rounded-md py-1 outline-none transition-all"> Bangunan</td></tr>
                                <tr class="hover:bg-slate-50"><td class="px-6 py-4 font-medium w-1/2">b. Semi Permanen</td><td class="px-6 py-2"><input type="number" value="301" readonly class="data-input w-32 bg-transparent border-transparent focus:ring-1 rounded-md py-1 outline-none transition-all"> Bangunan</td></tr>
                                <tr class="hover:bg-slate-50"><td class="px-6 py-4 font-medium w-1/2">c. Permanen</td><td class="px-6 py-2"><input type="number" value="415" readonly class="data-input w-32 bg-transparent border-transparent focus:ring-1 rounded-md py-1 outline-none transition-all"> Bangunan</td></tr>
                                <tr class="hover:bg-slate-50"><td class="px-6 py-4 font-medium w-1/2">d. Lainnya</td><td class="px-6 py-2"><input type="number" value="0" readonly class="data-input w-32 bg-transparent border-transparent focus:ring-1 rounded-md py-1 outline-none transition-all"> Bangunan</td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- SECTION X: Kendaraan -->
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                    <div class="bg-slate-50 px-6 py-4 border-b border-slate-200">
                        <h4 class="font-bold text-slate-800 uppercase tracking-wide text-sm">X. Kendaraan Bermotor</h4>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm whitespace-nowrap">
                            <tbody class="divide-y divide-slate-100 text-slate-700">
                                <tr class="hover:bg-slate-50"><td class="px-6 py-4 font-medium w-1/2">a. Sepeda Motor</td><td class="px-6 py-2"><input type="number" value="205" readonly class="data-input w-32 bg-transparent border-transparent focus:ring-1 rounded-md py-1 outline-none transition-all"> Unit</td></tr>
                                <tr class="hover:bg-slate-50"><td class="px-6 py-4 font-medium w-1/2">b. Mobil Pribadi</td><td class="px-6 py-2"><input type="number" value="167" readonly class="data-input w-32 bg-transparent border-transparent focus:ring-1 rounded-md py-1 outline-none transition-all"> Unit</td></tr>
                                <tr class="hover:bg-slate-50"><td class="px-6 py-4 font-medium w-1/2">c. Bus</td><td class="px-6 py-2"><input type="number" value="7" readonly class="data-input w-32 bg-transparent border-transparent focus:ring-1 rounded-md py-1 outline-none transition-all"> Unit</td></tr>
                                <tr class="hover:bg-slate-50"><td class="px-6 py-4 font-medium w-1/2">d. Mikrolet</td><td class="px-6 py-2"><input type="number" value="5" readonly class="data-input w-32 bg-transparent border-transparent focus:ring-1 rounded-md py-1 outline-none transition-all"> Unit</td></tr>
                                <tr class="hover:bg-slate-50"><td class="px-6 py-4 font-medium w-1/2">e. Truck</td><td class="px-6 py-2"><input type="number" value="48" readonly class="data-input w-32 bg-transparent border-transparent focus:ring-1 rounded-md py-1 outline-none transition-all"> Unit</td></tr>
                                <tr class="hover:bg-slate-50"><td class="px-6 py-4 font-medium w-1/2">f. Pick Up</td><td class="px-6 py-2"><input type="number" value="5" readonly class="data-input w-32 bg-transparent border-transparent focus:ring-1 rounded-md py-1 outline-none transition-all"> Unit</td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- SECTION XI: Domisili -->
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                    <div class="bg-slate-50 px-6 py-4 border-b border-slate-200">
                        <h4 class="font-bold text-slate-800 uppercase tracking-wide text-sm">XI. Data Domisili</h4>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm whitespace-nowrap">
                            <tbody class="divide-y divide-slate-100 text-slate-700">
                                @include('components.row-mutasi', ['label' => 'a. Penduduk Tetap', 'laki' => 2085, 'perempuan' => 2004])
                                @include('components.row-mutasi', ['label' => 'b. Penduduk Tidak Tetap', 'laki' => 80, 'perempuan' => 76])
                                @include('components.row-mutasi', ['label' => 'c. Pendatang', 'laki' => 35, 'perempuan' => 39])
                                @include('components.row-mutasi', ['label' => 'd. Pindah Keluar', 'laki' => 20, 'perempuan' => 21])
                                @include('components.row-mutasi', ['label' => 'e. Meninggal Dunia', 'laki' => 12, 'perempuan' => 11])
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- KOLOM KANAN: Tabel Umur -->
            <div class="w-full lg:w-1/3">
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden h-full flex flex-col">
                    
                    <!-- Header Tabel Elegan -->
                    <div class="bg-slate-50 px-5 py-4 border-b border-slate-200 flex justify-between items-center">
                        <h4 class="font-bold text-slate-800 uppercase tracking-wide text-sm">Data Jiwa Per Usia</h4>
                        <span class="text-[10px] font-bold bg-primary-100 text-primary-700 px-2.5 py-1 rounded-md">0 - 80+ Tahun</span>
                    </div>

                    <!-- Wrapper Tabel (Scroll di Mobile, Membentang di Desktop) -->
                    <div class="max-h-[500px] overflow-y-auto lg:max-h-none lg:overflow-visible p-4 flex-1">
                        <table class="w-full text-sm border-collapse rounded-xl overflow-hidden ring-1 ring-slate-200">
                            
                            <!-- Thead yang lebih soft dan profesional -->
                            <thead class="bg-slate-100 text-slate-600 border-b border-slate-200 text-xs tracking-wider uppercase">
                                <tr>
                                    <th class="px-2 py-3 font-bold text-center border-r border-slate-200">Umur</th>
                                    <th class="px-2 py-3 font-bold text-center border-r border-slate-200 text-primary-700 bg-primary-50/50">Total</th>
                                    <th class="px-2 py-3 font-bold text-center border-r border-slate-200">L</th>
                                    <th class="px-2 py-3 font-bold text-center">P</th>
                                </tr>
                            </thead>
                            
                            <tbody id="table-umur">
                                <!-- Data Usia Balita (Sample Manual) -->
                                @include('components.row-umur', ['umur' => '0', 'laki' => 45, 'perempuan' => 17])
                                @include('components.row-umur', ['umur' => '1', 'laki' => 24, 'perempuan' => 23])
                                @include('components.row-umur', ['umur' => '2', 'laki' => 31, 'perempuan' => 21])
                                @include('components.row-umur', ['umur' => '3', 'laki' => 50, 'perempuan' => 30])
                                @include('components.row-umur', ['umur' => '4', 'laki' => 41, 'perempuan' => 28])
                                @include('components.row-umur', ['umur' => '5', 'laki' => 40, 'perempuan' => 30])
                                
                                <!-- LOOPING OTOMATIS: Usia 6 sampai 79 Tahun -->
                                @for ($i = 6; $i <= 79; $i++)
                                    @include('components.row-umur', [
                                        'umur' => $i, 
                                        'laki' => rand(20, 60), 
                                        'perempuan' => rand(20, 60)
                                    ])
                                @endfor

                                <!-- Data Usia Lansia Akhir -->
                                @include('components.row-umur', ['umur' => '80+', 'laki' => 1, 'perempuan' => 1])
                            </tbody>
                        </table>
                    </div>
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

        // Kalkulasi Auto-sum Dinamis untuk Laporan Kiri (I - XII)
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

        // Kalkulasi Auto-sum Dinamis untuk Tabel Umur Kanan
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

        // Event Tampilkan Data
        btnLoad.addEventListener('click', () => {
            const mText = document.getElementById('manage-month').options[document.getElementById('manage-month').selectedIndex].text;
            const yText = document.getElementById('manage-year').value;
            titleEditor.textContent = `Data Laporan: ${mText} ${yText}`;
            
            editorSection.classList.remove('hidden');
            setTimeout(() => editorSection.classList.remove('opacity-0'), 50);
        });

        // Event Edit Mode
        btnEdit.addEventListener('click', () => {
            btnEdit.classList.add('hidden');
            btnSave.classList.remove('hidden');
            
            inputs.forEach(input => {
                input.removeAttribute('readonly');
                input.classList.remove('bg-transparent', 'border-transparent');
                input.classList.add('bg-white', 'border-slate-300', 'shadow-inner');
            });
        });

        // Event Save Mode
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