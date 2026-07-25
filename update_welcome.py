import re

def main():
    file_path = r'd:\Coding Project\KKTmnb\resources\views\welcome.blade.php'
    with open(file_path, 'r', encoding='utf-8') as f:
        content = f.read()

    # Dynamic date
    old_date = '<span class="font-medium text-sm">Data per <strong id="dynamic-period">Bulan Tahun</strong></span>'
    new_date = """@php
                            $bulanStr = ['01'=>'Januari', '02'=>'Februari', '03'=>'Maret', '04'=>'April', '05'=>'Mei', '06'=>'Juni', '07'=>'Juli', '08'=>'Agustus', '09'=>'September', '10'=>'Oktober', '11'=>'November', '12'=>'Desember'];
                        @endphp
                        <span class="font-medium text-sm">Data per <strong>{{ $data ? ($bulanStr[$data->bulan] ?? '-') . ' ' . $data->tahun : 'Belum Ada Data' }}</strong></span>"""
    content = content.replace(old_date, new_date)

    # 5.234
    content = content.replace('<h3 class="text-3xl md:text-4xl font-bold text-primary-600 mb-2">5.234</h3>', 
                              '<h3 class="text-3xl md:text-4xl font-bold text-primary-600 mb-2">{{ $data ? number_format(($data->wni_l ?? 0) + ($data->wni_p ?? 0), 0, \',\', \'.\') : \'0\' }}</h3>')
    
    # 2.650
    content = content.replace('<h3 class="text-3xl md:text-4xl font-bold text-primary-600 mb-2">2.650</h3>', 
                              '<h3 class="text-3xl md:text-4xl font-bold text-primary-600 mb-2">{{ $data ? number_format($data->wni_l ?? 0, 0, \',\', \'.\') : \'0\' }}</h3>')

    # 2.584
    content = content.replace('<h3 class="text-3xl md:text-4xl font-bold text-primary-600 mb-2">2.584</h3>', 
                              '<h3 class="text-3xl md:text-4xl font-bold text-primary-600 mb-2">{{ $data ? number_format($data->wni_p ?? 0, 0, \',\', \'.\') : \'0\' }}</h3>')

    # 1.379
    content = content.replace('<h3 class="text-3xl md:text-4xl font-bold text-primary-600 mb-2">1.379</h3>', 
                              '<h3 class="text-3xl md:text-4xl font-bold text-primary-600 mb-2">{{ $data ? number_format($data->kk_ada ?? 0, 0, \',\', \'.\') : \'0\' }}</h3>')

    # 14
    content = content.replace('<h3 class="text-3xl md:text-4xl font-bold text-primary-600 mb-2">14</h3>', 
                              '<h3 class="text-3xl md:text-4xl font-bold text-primary-600 mb-2">{{ $data ? number_format(($data->wna_l ?? 0) + ($data->wna_p ?? 0), 0, \',\', \'.\') : \'0\' }}</h3>')


    # JS remove
    js_to_remove = """            // --- Dinamis Tanggal Demografi ---
            const periodEl = document.getElementById('dynamic-period');
            if (periodEl) {
                const date = new Date();
                const months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                periodEl.textContent = `${months[date.getMonth()]} ${date.getFullYear()}`;
            }"""
    content = content.replace(js_to_remove, '')

    with open(file_path, 'w', encoding='utf-8') as f:
        f.write(content)

if __name__ == '__main__':
    main()
