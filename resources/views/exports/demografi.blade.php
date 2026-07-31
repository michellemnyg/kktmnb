@php
$left = [];
$d = $data;

$addLeft = function($a, $b, $c, $d_val, $e_val, $f_val, $isBold = false) use (&$left) {
    $left[] = [
        'a' => $a,
        'b' => $b,
        'c' => $c,
        'd' => $d_val,
        'e' => $e_val,
        'f' => $f_val,
        'is_bold' => $isBold
    ];
};

$formatNum = function($num) {
    return (int)$num;
};

$formatUnit = function($num, $unit) {
    return $num > 0 ? number_format($num, 0, ',', '.') : '-';
};

$l_wna = $d->wna_l ?? 0; $p_wna = $d->wna_p ?? 0;
$l_wni = $d->wni_l ?? 0; $p_wni = $d->wni_p ?? 0;
$tot_l = $l_wna + $l_wni;
$tot_p = $p_wna + $p_wni;
$tot_all = $tot_l + $tot_p;

// I. Penduduk
$addLeft('I', 'JUMLAH PENDUDUK', '', '', '', '', true);
$addLeft('', 'a. WNA', ':', $formatNum($l_wna), $formatNum($p_wna), $formatNum($l_wna + $p_wna));
$addLeft('', 'b. WNI', ':', $formatNum($l_wni), $formatNum($p_wni), $formatNum($l_wni + $p_wni));
$addLeft('', 'JUMLAH PENDUDUK', '', $formatNum($tot_l), $formatNum($tot_p), $formatNum($tot_all), true);

// II. Mutasi
$addLeft('II', 'JUMLAH DATA YANG:', '', '', '', '', true);
$addLeft('', 'a. Lahir', ':', $formatNum($d->lahir_l ?? 0), $formatNum($d->lahir_p ?? 0), $formatNum(($d->lahir_l ?? 0) + ($d->lahir_p ?? 0)));
$addLeft('', 'b. Meninggal', ':', $formatNum($d->mati_l ?? 0), $formatNum($d->mati_p ?? 0), $formatNum(($d->mati_l ?? 0) + ($d->mati_p ?? 0)));
$addLeft('', 'c. Datang', ':', $formatNum($d->datang_l ?? 0), $formatNum($d->datang_p ?? 0), $formatNum(($d->datang_l ?? 0) + ($d->datang_p ?? 0)));
$addLeft('', 'd. Pindah', ':', $formatNum($d->pindah_l ?? 0), $formatNum($d->pindah_p ?? 0), $formatNum(($d->pindah_l ?? 0) + ($d->pindah_p ?? 0)));

// III. KK
$kk_ada = $d->kk_ada ?? 0;
$kk_belum = $d->kk_belum ?? 0;
$addLeft('III', 'WAJIB KK', '', $formatNum($kk_ada + $kk_belum), 'Keluarga', '', true);
$addLeft('', 'a. Memiliki KK', '', $formatNum($kk_ada), 'Keluarga', '');
$addLeft('', 'b. Belum Memiliki KK', '', $formatNum($kk_belum), 'Keluarga', '');

// IV. KTP
$ktp_ada_l = $d->ktp_ada_l ?? 0; $ktp_ada_p = $d->ktp_ada_p ?? 0;
$ktp_belum_l = $d->ktp_belum_l ?? 0; $ktp_belum_p = $d->ktp_belum_p ?? 0;
$tot_ktp_l = $ktp_ada_l + $ktp_belum_l;
$tot_ktp_p = $ktp_ada_p + $ktp_belum_p;
$addLeft('IV', 'WAJIB KTP', '', $formatNum($tot_ktp_l), $formatNum($tot_ktp_p), $formatNum($tot_ktp_l + $tot_ktp_p), true);
$addLeft('', 'a. Memiliki KTP', '', $formatNum($ktp_ada_l), $formatNum($ktp_ada_p), $formatNum($ktp_ada_l + $ktp_ada_p));
$addLeft('', 'b. Belum Memiliki KTP', '', $formatNum($ktp_belum_l), $formatNum($ktp_belum_p), $formatNum($ktp_belum_l + $ktp_belum_p));

// V. Agama
$agamas = [
    ['Kristen', 'kristen'], ['Katholik', 'katolik'], ['Islam', 'islam'],
    ['Hindu', 'hindu'], ['Buddha', 'buddha'], ['Konghucu', 'konghucu'], ['Lainnya', 'lain']
];
$tot_agama_l = 0; $tot_agama_p = 0;
foreach($agamas as $ag) {
    $tot_agama_l += $d->{"agama_{$ag[1]}_l"} ?? 0;
    $tot_agama_p += $d->{"agama_{$ag[1]}_p"} ?? 0;
}
$addLeft('V', 'PENDUDUK MENURUT AGAMA', '', $formatNum($tot_agama_l), $formatNum($tot_agama_p), $formatNum($tot_agama_l + $tot_agama_p), true);
$char = 'a';
foreach($agamas as $ag) {
    $l = $d->{"agama_{$ag[1]}_l"} ?? 0;
    $p = $d->{"agama_{$ag[1]}_p"} ?? 0;
    $addLeft('', $char++.'. '.$ag[0], ':', $formatNum($l), $formatNum($p), $formatNum($l + $p));
}

// VI. Pendidikan
$pends = [
    ['TK', 'tk'], ['SD', 'sd'], ['SMP', 'smp'], ['SMA', 'sma'], ['PERGURUAN TINGGI', 'pt']
];
$tot_pend_l = 0; $tot_pend_p = 0;
foreach($pends as $pd) {
    $tot_pend_l += $d->{"pend_{$pd[1]}_l"} ?? 0;
    $tot_pend_p += $d->{"pend_{$pd[1]}_p"} ?? 0;
}
$addLeft('VI', 'PENDUDUK MENURUT PENDIDIKAN', '', $formatNum($tot_pend_l), $formatNum($tot_pend_p), $formatNum($tot_pend_l + $tot_pend_p), true);
$char = 'a';
foreach($pends as $pd) {
    $l = $d->{"pend_{$pd[1]}_l"} ?? 0;
    $p = $d->{"pend_{$pd[1]}_p"} ?? 0;
    $addLeft('', $char++.'. '.$pd[0], ':', $formatNum($l), $formatNum($p), $formatNum($l + $p));
}

// VII. Usia Putus Sekolah
$pts = [
    ['Tidak Pernah Sekolah', 'tidak'], ['TK', 'tk'], ['SD', 'sd'], ['SMP', 'smp'], ['SMA', 'sma']
];
$tot_pts_l = 0; $tot_pts_p = 0;
foreach($pts as $pt) {
    $tot_pts_l += $d->{"pts_{$pt[1]}_l"} ?? 0;
    $tot_pts_p += $d->{"pts_{$pt[1]}_p"} ?? 0;
}
$addLeft('VII', 'USIA YANG PUTUS SEKOLAH', '', $formatNum($tot_pts_l), $formatNum($tot_pts_p), $formatNum($tot_pts_l + $tot_pts_p), true);
$char = 'a';
foreach($pts as $pt) {
    $l = $d->{"pts_{$pt[1]}_l"} ?? 0;
    $p = $d->{"pts_{$pt[1]}_p"} ?? 0;
    $addLeft('', $char++.'. '.$pt[0], ':', $formatNum($l), $formatNum($p), $formatNum($l + $p));
}
// Add cacat
$addLeft('', 'f. Cacat Fisik', ':', $formatNum($d->cacat_fisik_l ?? 0), $formatNum($d->cacat_fisik_p ?? 0), $formatNum(($d->cacat_fisik_l ?? 0) + ($d->cacat_fisik_p ?? 0)));
$addLeft('', 'g. Cacat Mental', ':', $formatNum($d->cacat_mental_l ?? 0), $formatNum($d->cacat_mental_p ?? 0), $formatNum(($d->cacat_mental_l ?? 0) + ($d->cacat_mental_p ?? 0)));

// VIII. Pekerjaan
$pkjs = [
    ['ASN Pegawai', 'asn_pegawai'], ['ASN Guru', 'asn_guru'], ['TNI', 'tni'], ['POLRI', 'polri'],
    ['Petani', 'petani'], ['Tukang', 'tukang'], ['Pelaut', 'pelaut'], ['Nelayan', 'nelayan'],
    ['Buruh', 'buruh'], ['Wiraswasta', 'wiraswasta'], ['Karyawan Swasta', 'swasta'], ['Karyawan BUMD/BUMN', 'bumd'],
    ['IRT/PRT', 'irt'], ['Pendeta', 'pendeta'], ['Imam', 'imam'], ['Sopir', 'sopir'], ['Belum/Tidak Bekerja', 'belum']
];
$tot_pkj_l = 0; $tot_pkj_p = 0;
foreach($pkjs as $pk) {
    $tot_pkj_l += $d->{"pkj_{$pk[1]}_l"} ?? 0;
    $tot_pkj_p += $d->{"pkj_{$pk[1]}_p"} ?? 0;
}
$addLeft('VIII', 'PENDUDUK MENURUT PEKERJAAN', '', $formatNum($tot_pkj_l), $formatNum($tot_pkj_p), $formatNum($tot_pkj_l + $tot_pkj_p), true);
$char = 'a';
foreach($pkjs as $pk) {
    $l = $d->{"pkj_{$pk[1]}_l"} ?? 0;
    $p = $d->{"pkj_{$pk[1]}_p"} ?? 0;
    $addLeft('', $char++.'. '.$pk[0], ':', $formatNum($l), $formatNum($p), $formatNum($l + $p));
}

// IX. Bangunan
$addLeft('IX', 'KONDISI BANGUNAN', '', '', '', '', true);
$addLeft('', 'a. Darurat', ':', $formatNum($d->bgn_darurat ?? 0), 'Bangunan', '');
$addLeft('', 'b. Semi Permanen', ':', $formatNum($d->bgn_semi ?? 0), 'Bangunan', '');
$addLeft('', 'c. Permanen', ':', $formatNum($d->bgn_permanen ?? 0), 'Bangunan', '');
$addLeft('', 'd. Lainnya', ':', $formatNum($d->bgn_lainnya ?? 0), 'Bangunan', '');

// X. Kendaraan
$addLeft('X', 'KENDARAAN BERMOTOR', '', '', '', '', true);
$addLeft('', 'a. Sepeda Motor', ':', $formatNum($d->kdr_motor ?? 0), 'Unit', '');
$addLeft('', 'b. Mobil Pribadi', ':', $formatNum($d->kdr_mobil ?? 0), 'Unit', '');
$addLeft('', 'c. Bus', ':', $formatNum($d->kdr_bus ?? 0), 'Unit', '');
$addLeft('', 'd. Mikrolet', ':', $formatNum($d->kdr_mikrolet ?? 0), 'Unit', '');
$addLeft('', 'e. Truck', ':', $formatNum($d->kdr_truk ?? 0), 'Unit', '');
$addLeft('', 'f. Pick Up', ':', $formatNum($d->kdr_pickup ?? 0), 'Unit', '');

// XI. Domisili
$addLeft('XI', 'DATA DOMISILI', '', '', '', '', true);
$addLeft('', 'JUMLAH KK', ':', $formatNum($kk_ada), 'Keluarga', '');


// Right Data (Umur)
$right = [];
// total umur
$tot_umur_l = 0; $tot_umur_p = 0;
for ($i = 0; $i <= 80; $i++) {
    $uKey = $i == 80 ? '80+' : (string)$i;
    $uData = $d ? $d->umurs->where('umur', $uKey)->first() : null;
    $l = $uData ? $uData->laki : 0;
    $p = $uData ? $uData->perempuan : 0;
    $tot_umur_l += $l;
    $tot_umur_p += $p;
    
    $uLabel = $i == 80 ? '80 Thn keatas' : (string)$i;
    $right[] = [
        'h' => $uLabel,
        'i' => $formatNum($l + $p),
        'j' => $formatNum($l),
        'k' => $formatNum($p),
        'is_bold' => false
    ];
}
// Add total row at bottom of right table
$right[] = [
    'h' => 'TOTAL', // Add label here
    'i' => $formatNum($tot_umur_l + $tot_umur_p),
    'j' => $formatNum($tot_umur_l),
    'k' => $formatNum($tot_umur_p),
    'is_bold' => true
];

$maxRows = max(count($left), count($right));
@endphp

<table style="border-collapse: collapse; font-family: Arial, sans-serif; font-size: 11px;">
    <tr>
        <td style="width: 30px;"></td>
        <td colspan="5" style="font-weight: bold; font-size: 14px;">LAPORAN PENDUDUK</td>
        <td style="width: 20px;"></td>
        <td colspan="4"></td>
    </tr>
    <tr>
        <td></td>
        <td style="font-weight: bold; width: 200px;">KELURAHAN</td>
        <td style="font-weight: bold; width: 10px;">:</td>
        <td colspan="3" style="font-weight: bold;">MANEMBO-NEMBO</td>
        <td></td>
        <td colspan="4"></td>
    </tr>
    <tr>
        <td></td>
        <td style="font-weight: bold;">BULAN</td>
        <td style="font-weight: bold;">:</td>
        <td colspan="3" style="font-weight: bold;">{{ strtoupper($namaBulan) }} {{ $tahun }}</td>
        <td></td>
        <td colspan="4"></td>
    </tr>
    <tr>
        <td colspan="11"></td>
    </tr>
    
    <!-- Table Headers -->
    <tr>
        <td style="text-align: center; font-weight: bold; vertical-align: middle;">NO</td>
        <td colspan="2" style="text-align: center; font-weight: bold; vertical-align: middle;">URAIAN</td>
        <td style="text-align: center; font-weight: bold; vertical-align: middle; width: 60px;">L</td>
        <td style="text-align: center; font-weight: bold; vertical-align: middle; width: 60px;">P</td>
        <td style="text-align: center; font-weight: bold; vertical-align: middle; width: 70px;">JUMLAH<br>JIWA</td>
        <td></td>
        <td colspan="4" style="text-align: center; font-weight: bold; vertical-align: middle;">JUMLAH JIWA MENURUT UMUR</td>
    </tr>
    
    @for($i = 0; $i < $maxRows; $i++)
        <tr>
            {{-- LEFT SIDE --}}
            @if(isset($left[$i]))
                @php $lRow = $left[$i]; $bold = $lRow['is_bold'] ? 'font-weight: bold;' : ''; @endphp
                <td style="text-align: center; {{ $bold }}">{{ $lRow['a'] }}</td>
                <td style="{{ $bold }}">{{ $lRow['b'] }}</td>
                <td style="text-align: center; {{ $bold }}">{{ $lRow['c'] }}</td>
                <td style="text-align: right; {{ $bold }}">{{ $lRow['d'] }}</td>
                
                @if(in_array($lRow['e'], ['Keluarga', 'Bangunan', 'Unit']))
                    <td colspan="2" style="text-align: left; padding-left: 5px; {{ $bold }}">{{ $lRow['e'] }}</td>
                @else
                    <td style="text-align: right; {{ $bold }}">{{ $lRow['e'] }}</td>
                    <td style="text-align: right; {{ $bold }}">{{ $lRow['f'] }}</td>
                @endif
            @else
                {{-- Empty left cells if left is shorter --}}
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            @endif

            {{-- GAP --}}
            <td></td>

            {{-- RIGHT SIDE --}}
            @if($i == 0)
                <td style="text-align: center; font-weight: bold; width: 60px;">UMUR</td>
                <td style="text-align: center; font-weight: bold; width: 80px;">JUMLAH JIWA</td>
                <td style="text-align: center; font-weight: bold; width: 50px;">L</td>
                <td style="text-align: center; font-weight: bold; width: 50px;">P</td>
            @elseif(isset($right[$i - 1]))
                @php $rRow = $right[$i - 1]; $bold = $rRow['is_bold'] ? 'font-weight: bold;' : ''; @endphp
                <td style="text-align: center; {{ $bold }}">{{ $rRow['h'] }}</td>
                <td style="text-align: right; {{ $bold }}">{{ $rRow['i'] }}</td>
                <td style="text-align: right; {{ $bold }}">{{ $rRow['j'] }}</td>
                <td style="text-align: right; {{ $bold }}">{{ $rRow['k'] }}</td>
            @else
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            @endif
        </tr>
    @endfor
    
    {{-- Bottom spacing --}}
    <tr><td colspan="11"></td></tr>
    <tr><td colspan="11"></td></tr>
    
    {{-- TTD Section --}}
    <tr>
        <td colspan="7"></td>
        <td colspan="4" style="text-align: center; font-weight: bold;">MANEMBO-NEMBO, {{ strtoupper($namaBulan) }} {{ $tahun }}</td>
    </tr>
    <tr>
        <td colspan="7"></td>
        <td colspan="4" style="text-align: center; font-weight: bold;">LURAH</td>
    </tr>
    <tr><td colspan="11"></td></tr>
    <tr><td colspan="11"></td></tr>
    <tr><td colspan="11"></td></tr>
    <tr>
        <td colspan="7"></td>
        <td colspan="4" style="text-align: center; font-weight: bold;">JOHNNY KONDO, S.A.P.,</td>
    </tr>
    <tr>
        <td colspan="7"></td>
        <td colspan="4" style="text-align: center; font-weight: bold;">NIP. 198307312006041007</td>
    </tr>
</table>
