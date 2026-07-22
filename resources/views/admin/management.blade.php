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
                                <td class="px-6 py-4 font-medium">Warga Negara Indonesia (WNI)</td>
                                <td class="px-6 py-2 text-center">
                                    <input type="number" id="input-laki" value="2937" readonly class="data-input w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all">
                                </td>
                                <td class="px-6 py-2 text-center">
                                    <input type="number" id="input-perempuan" value="2892" readonly class="data-input w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all">
                                </td>
                                <td class="px-6 py-4 text-center font-bold text-primary-600">
                                    <input type="number" id="input-total" value="5829" readonly class="w-24 text-center bg-transparent border-transparent font-bold text-primary-600 outline-none pointer-events-none">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <!-- SECTION III & IV: Wajib KK & KTP (Format 1 Kolom Input) -->
            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                <div class="bg-slate-50 px-6 py-4 border-b border-slate-200">
                    <h4 class="font-bold text-slate-800 uppercase tracking-wide text-sm">III. Wajib KK & IV. Wajib KTP</h4>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm whitespace-nowrap">
                        <tbody class="divide-y divide-slate-100 text-slate-700">
                            <!-- KK -->
                            <tr class="bg-slate-50/50">
                                <td class="px-6 py-3 font-bold text-primary-700" colspan="2">WAJIB KK</td>
                            </tr>
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 font-medium w-1/2 pl-10">a. Memiliki KK</td>
                                <td class="px-6 py-2"><input type="number" value="1379" readonly class="data-input w-32 bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all"> Keluarga</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Anda bisa menambahkan struktur tabel mutasi yang sama di sini -->
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

        // Kalkulasi Auto-sum (Laki-laki + Perempuan = Total)
        const inputL = document.getElementById('input-laki');
        const inputP = document.getElementById('input-perempuan');
        const inputTotal = document.getElementById('input-total');

        function calcTotal() {
            const l = parseInt(inputL.value) || 0;
            const p = parseInt(inputP.value) || 0;
            inputTotal.value = l + p;
        }

        inputL.addEventListener('input', calcTotal);
        inputP.addEventListener('input', calcTotal);

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