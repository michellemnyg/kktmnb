import re

def main():
    file_path = r'd:\Coding Project\KKTmnb\resources\views\admin\management.blade.php'
    with open(file_path, 'r', encoding='utf-8') as f:
        content = f.read()

    # 1. Update form wrapper
    # First, revert the big wrapper from POST to GET
    content = content.replace('<form action="{{ url(\'/admin/management\') }}" method="POST" id="data-form" class="space-y-8 animate-fade-in-up">\n    @csrf', '<div class="space-y-8 animate-fade-in-up">')
    
    # Add GET form around step 1
    content = content.replace('<div class="flex flex-col sm:flex-row gap-4 items-end">', '<form action="{{ url(\'/admin/management\') }}" method="GET" class="flex flex-col sm:flex-row gap-4 items-end">')
    # Change button to submit
    content = content.replace('<button type="button" id="btn-load-data"', '<button type="submit" id="btn-load-data"')
    content = content.replace('Tampilkan Data\n            </button>\n        </div>\n    </div>', 'Tampilkan Data\n            </button>\n        </form>\n    </div>')

    # Re-enable POST form for Step 2
    # Find start of step 2
    content = content.replace('<!-- STEP 2: VIEW / EDIT DATA -->\n    <div id="data-editor-section" class="hidden space-y-6 opacity-0 transition-opacity duration-500">', '<!-- STEP 2: VIEW / EDIT DATA -->\n    @if(isset($bulan) && isset($tahun))\n    <div id="data-editor-section" class="space-y-6 opacity-100 transition-opacity duration-500">\n        <form action="{{ url(\'/admin/management\') }}" method="POST" id="data-form">\n            @csrf\n            <input type="hidden" name="bulan" value="{{ $bulan }}">\n            <input type="hidden" name="tahun" value="{{ $tahun }}">')
    
    # Close POST form at the very end
    content = content.replace('    </div>\n</form>\n@endsection', '    </div>\n        </form>\n    </div>\n    @endif\n</div>\n@endsection')

    # Update row-mutasi includes to use $data
    replacements = [
        ("a. WNA", "wna"), ("b. WNI", "wni"),
        ("a. Lahir", "lahir"), ("b. Meninggal", "mati"), ("c. Datang", "datang"), ("d. Pindah", "pindah"),
        ("a. Memiliki KTP", "ktp_ada"), ("b. Belum Memiliki KTP", "ktp_belum"),
        ("a. Kristen", "agama_kristen"), ("b. Katholik", "agama_katolik"), ("c. Islam", "agama_islam"),
        ("d. Hindu", "agama_hindu"), ("e. Buddha", "agama_buddha"), ("f. Konghucu", "agama_konghucu"), ("g. Lainnya", "agama_lain"),
        ("a. TK", "pend_tk"), ("b. SD", "pend_sd"), ("c. SMP", "pend_smp"), ("d. SMA", "pend_sma"), ("e. Perguruan Tinggi", "pend_pt"),
        ("a. Tidak Pernah Sekolah", "pts_tidak"), ("b. TK", "pts_tk"), ("c. SD", "pts_sd"), ("d. SMP", "pts_smp"), ("e. SMA", "pts_sma"),
        ("f. Cacat Fisik", "cacat_fisik"), ("g. Cacat Mental", "cacat_mental"),
        ("a. ASN Pegawai", "pkj_asn_pegawai"), ("b. ASN Guru", "pkj_asn_guru"), ("c. TNI", "pkj_tni"), ("d. POLRI", "pkj_polri"),
        ("e. Petani", "pkj_petani"), ("f. Tukang", "pkj_tukang"), ("g. Pelaut", "pkj_pelaut"), ("h. Nelayan", "pkj_nelayan"),
        ("i. Buruh", "pkj_buruh"), ("j. Wiraswasta", "pkj_wiraswasta"), ("k. Karyawan Swasta", "pkj_swasta"), ("l. Karyawan BUMN/BUMD", "pkj_bumd"),
        ("m. IRT/PRT", "pkj_irt"), ("n. Pendeta", "pkj_pendeta"), ("o. Imam", "pkj_imam"), ("p. Sopir", "pkj_sopir"), ("q. Belum/Tidak Bekerja", "pkj_belum")
    ]

    for label, prefix in replacements:
        pattern = r"@include\('components\.row-mutasi',\s*\['label'\s*=>\s*'" + re.escape(label) + r"',\s*'name_l'\s*=>\s*'" + prefix + r"_l',\s*'name_p'\s*=>\s*'" + prefix + r"_p',\s*'laki'\s*=>\s*\d+,\s*'perempuan'\s*=>\s*\d+\]\)"
        replacement = f"@include('components.row-mutasi', ['label' => '{label}', 'name_l' => '{prefix}_l', 'name_p' => '{prefix}_p', 'laki' => $data->{prefix}_l ?? 0, 'perempuan' => $data->{prefix}_p ?? 0])"
        content = re.sub(pattern, replacement, content)

    # 3. Add dynamic values to standalone inputs
    standalone_replacements = {
        'name="kk_ada" value="1379"': 'name="kk_ada" value="{{ $data->kk_ada ?? 0 }}"',
        'name="kk_belum" value="551"': 'name="kk_belum" value="{{ $data->kk_belum ?? 0 }}"',
        'name="bgn_darurat" value="39"': 'name="bgn_darurat" value="{{ $data->bgn_darurat ?? 0 }}"',
        'name="bgn_semi" value="301"': 'name="bgn_semi" value="{{ $data->bgn_semi ?? 0 }}"',
        'name="bgn_permanen" value="415"': 'name="bgn_permanen" value="{{ $data->bgn_permanen ?? 0 }}"',
        'name="bgn_lainnya" value="0"': 'name="bgn_lainnya" value="{{ $data->bgn_lainnya ?? 0 }}"',
        'name="kdr_motor" value="205"': 'name="kdr_motor" value="{{ $data->kdr_motor ?? 0 }}"',
        'name="kdr_mobil" value="167"': 'name="kdr_mobil" value="{{ $data->kdr_mobil ?? 0 }}"',
        'name="kdr_bus" value="7"': 'name="kdr_bus" value="{{ $data->kdr_bus ?? 0 }}"',
        'name="kdr_mikrolet" value="5"': 'name="kdr_mikrolet" value="{{ $data->kdr_mikrolet ?? 0 }}"',
        'name="kdr_truk" value="48"': 'name="kdr_truk" value="{{ $data->kdr_truk ?? 0 }}"',
        'name="kdr_pickup" value="5"': 'name="kdr_pickup" value="{{ $data->kdr_pickup ?? 0 }}"',
        # Section XI is hardcoded value="1379", we don't have a name attribute, but we can make it dynamic
        'value="1379" readonly class="data-input w-32 text-center bg-transparent border-transparent': 'value="{{ $data->kk_ada ?? 0 }}" readonly class="data-input w-32 text-center bg-transparent border-transparent'
    }
    for old, new in standalone_replacements.items():
        content = content.replace(old, new)

    # Update umur array to pull from relationship
    # Remove the manual samples and loop, and replace with a foreach over data->umurs or a loop up to 80
    old_umur_block = """                                <!-- Data Usia Balita (Sample Manual) -->
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
                                @include('components.row-umur', ['umur' => '80+', 'laki' => 1, 'perempuan' => 1])"""
    new_umur_block = """                                @for ($i = 0; $i <= 80; $i++)
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
                                @endfor"""
    content = content.replace(old_umur_block, new_umur_block)

    # Note: Javascript modification
    # Remove the btnLoad event listener that showed the editor (since it's now PHP driven)
    js_to_remove = """        // Event Tampilkan Data
        btnLoad.addEventListener('click', () => {
            const mText = document.getElementById('manage-month').options[document.getElementById('manage-month').selectedIndex].text;
            const yText = document.getElementById('manage-year').value;
            titleEditor.textContent = `Data Laporan: ${mText} ${yText}`;
            
            editorSection.classList.remove('hidden');
            setTimeout(() => editorSection.classList.remove('opacity-0'), 50);
        });"""
    content = content.replace(js_to_remove, '')
    
    # Also update the title to use server-side values
    # <span class="font-bold text-primary-700" id="editor-period-title">Data Laporan</span>
    content = content.replace('<span class="font-bold text-primary-700" id="editor-period-title">Data Laporan</span>', 
                              '<span class="font-bold text-primary-700" id="editor-period-title">Data Laporan: Bulan {{ $bulan ?? \'-\' }} Tahun {{ $tahun ?? \'-\' }}</span>')
    
    # Select default values in selects
    # <option value="08">Agustus</option>
    for m, mstr in [('01', 'Januari'), ('02', 'Februari'), ('03', 'Maret'), ('04', 'April'), ('05', 'Mei'), ('06', 'Juni'), ('07', 'Juli'), ('08', 'Agustus'), ('09', 'September'), ('10', 'Oktober'), ('11', 'November'), ('12', 'Desember')]:
        content = content.replace(f'<option value="{m}">', f'<option value="{m}" {{{{ isset($bulan) && $bulan == \'{m}\' ? \'selected\' : \'\' }}}}>')
        content = content.replace(f'<option value="{m}" selected>', f'<option value="{m}" {{{{ isset($bulan) && $bulan == \'{m}\' ? \'selected\' : \'\' }}}}>')
    
    for y in ['2025', '2026']:
        content = content.replace(f'<option value="{y}">', f'<option value="{y}" {{{{ isset($tahun) && $tahun == \'{y}\' ? \'selected\' : \'\' }}}}>')
        content = content.replace(f'<option value="{y}" selected>', f'<option value="{y}" {{{{ isset($tahun) && $tahun == \'{y}\' ? \'selected\' : \'\' }}}}>')

    with open(file_path, 'w', encoding='utf-8') as f:
        f.write(content)

if __name__ == '__main__':
    main()
