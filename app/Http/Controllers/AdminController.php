<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Demografi;
use App\Models\DemografiUmur;

class AdminController extends Controller
{
    // Menampilkan Dashboard Overview
    public function dashboard(Request $request)
    {
        $bulan = $request->get('bulan');
        $tahun = $request->get('tahun');
        
        
        if ($bulan && $tahun) {
            $data = Demografi::with('umurs')->where('bulan', $bulan)->where('tahun', $tahun)->first();
        } else {
            $bulanIni = date('m');
            $tahunIni = date('Y');
            
            // Coba ambil data bulan ini
            $data = Demografi::with('umurs')->where('bulan', $bulanIni)->where('tahun', $tahunIni)->first();
            
            // Jika tidak ada data bulan ini, ambil data terbaru yang tersedia
            if (!$data) {
                $data = Demografi::with('umurs')->orderBy('tahun', 'desc')->orderBy('bulan', 'desc')->first();
            }
            
            // Sesuaikan bulan & tahun agar sinkron dengan dropdown di view
            if ($data) {
                $bulan = $data->bulan;
                $tahun = $data->tahun;
            } else {
                $bulan = $bulanIni;
                $tahun = $tahunIni;
            }
        }

        // Siapkan array data umur untuk chart
        $umurLabels = ['0-4 Thn', '5-14 Thn', '15-24 Thn', '25-34 Thn', '35-44 Thn', '45-54 Thn', '55-64 Thn', '65+ Thn'];
        $umurL = array_fill(0, 8, 0);
        $umurP = array_fill(0, 8, 0);

        if ($data) {
            foreach ($data->umurs as $u) {
                $umurInt = (int)$u->umur;
                if ($u->umur === '80+') $umurInt = 80;
                
                $kategori = 0;
                if ($umurInt >= 0 && $umurInt <= 4) $kategori = 0;
                elseif ($umurInt >= 5 && $umurInt <= 14) $kategori = 1;
                elseif ($umurInt >= 15 && $umurInt <= 24) $kategori = 2;
                elseif ($umurInt >= 25 && $umurInt <= 34) $kategori = 3;
                elseif ($umurInt >= 35 && $umurInt <= 44) $kategori = 4;
                elseif ($umurInt >= 45 && $umurInt <= 54) $kategori = 5;
                elseif ($umurInt >= 55 && $umurInt <= 64) $kategori = 6;
                else $kategori = 7; // 65+
                
                $umurL[$kategori] += $u->laki;
                $umurP[$kategori] += $u->perempuan;
            }
        }

        return view('admin.dashboard', compact('data', 'bulan', 'tahun', 'umurLabels', 'umurL', 'umurP'));
    }

    // Menampilkan Halaman Manajemen
    public function management(Request $request)
    {
        $bulan = $request->get('bulan');
        $tahun = $request->get('tahun');
        $data = null;
        
        if ($bulan && $tahun) {
            $data = Demografi::with('umurs')->where('bulan', $bulan)->where('tahun', $tahun)->first();
        }

        return view('admin.management', compact('data', 'bulan', 'tahun'));
    }

    // Memproses Input Data dari Operator
    public function saveData(Request $request)
    {
        // Daftar semua field integer yang diizinkan sesuai database (Mencegah Mass Assignment)
        $allowedIntegerFields = [
            'wni_l', 'wni_p', 'wna_l', 'wna_p',
            'lahir_l', 'lahir_p', 'mati_l', 'mati_p', 'datang_l', 'datang_p', 'pindah_l', 'pindah_p',
            'kk_ada', 'kk_belum', 'ktp_ada_l', 'ktp_ada_p', 'ktp_belum_l', 'ktp_belum_p',
            'agama_kristen_l', 'agama_kristen_p', 'agama_katolik_l', 'agama_katolik_p', 'agama_islam_l', 'agama_islam_p', 'agama_hindu_l', 'agama_hindu_p', 'agama_buddha_l', 'agama_buddha_p', 'agama_konghucu_l', 'agama_konghucu_p', 'agama_lain_l', 'agama_lain_p',
            'pend_tk_l', 'pend_tk_p', 'pend_sd_l', 'pend_sd_p', 'pend_smp_l', 'pend_smp_p', 'pend_sma_l', 'pend_sma_p', 'pend_pt_l', 'pend_pt_p',
            'pts_tidak_l', 'pts_tidak_p', 'pts_tk_l', 'pts_tk_p', 'pts_sd_l', 'pts_sd_p', 'pts_smp_l', 'pts_smp_p', 'pts_sma_l', 'pts_sma_p',
            'cacat_fisik_l', 'cacat_fisik_p', 'cacat_mental_l', 'cacat_mental_p',
            'pkj_asn_pegawai_l', 'pkj_asn_pegawai_p', 'pkj_asn_guru_l', 'pkj_asn_guru_p', 'pkj_tni_l', 'pkj_tni_p', 'pkj_polri_l', 'pkj_polri_p', 'pkj_petani_l', 'pkj_petani_p', 'pkj_tukang_l', 'pkj_tukang_p', 'pkj_pelaut_l', 'pkj_pelaut_p', 'pkj_nelayan_l', 'pkj_nelayan_p', 'pkj_buruh_l', 'pkj_buruh_p', 'pkj_wiraswasta_l', 'pkj_wiraswasta_p', 'pkj_swasta_l', 'pkj_swasta_p', 'pkj_bumd_l', 'pkj_bumd_p', 'pkj_irt_l', 'pkj_irt_p', 'pkj_pendeta_l', 'pkj_pendeta_p', 'pkj_imam_l', 'pkj_imam_p', 'pkj_sopir_l', 'pkj_sopir_p', 'pkj_belum_l', 'pkj_belum_p',
            'bgn_permanen', 'bgn_semi', 'bgn_darurat', 'bgn_lainnya',
            'kdr_motor', 'kdr_mobil', 'kdr_bus', 'kdr_mikrolet', 'kdr_truk', 'kdr_pickup',
            'dom_tetap_l', 'dom_tetap_p', 'dom_tidak_tetap_l', 'dom_tidak_tetap_p', 'dom_pendatang_l', 'dom_pendatang_p', 'dom_pindah_l', 'dom_pindah_p', 'dom_mati_l', 'dom_mati_p',
            'jemaat_sm', 'jemaat_remaja', 'jemaat_pemuda', 'jemaat_ibu', 'jemaat_bapa', 'jemaat_lansia', 'jemaat_koor'
        ];

        // Buat rules dinamis
        $rules = [
            'bulan' => ['required', 'string', 'size:2'],
            'tahun' => ['required', 'integer', 'min:2000', 'max:2100'],
            'umur_key' => ['nullable', 'array'],
            'umur_key.*' => ['string'],
            'umur_l' => ['nullable', 'array'],
            'umur_l.*' => ['integer', 'min:0'],
            'umur_p' => ['nullable', 'array'],
            'umur_p.*' => ['integer', 'min:0'],
        ];

        foreach ($allowedIntegerFields as $field) {
            $rules[$field] = ['nullable', 'integer', 'min:0'];
        }

        // 1. Validasi ketat semua input
        $validatedData = $request->validate($rules);

        // 2. Ambil hanya data demografi (tanpa umur, bulan, tahun)
        $dataDemografi = \Illuminate\Support\Arr::only($validatedData, $allowedIntegerFields);
        
        // Ubah null menjadi 0 untuk keamanan konsistensi tipe data di database
        foreach ($dataDemografi as $key => $val) {
            $dataDemografi[$key] = $val ?? 0;
        }

        // 3. Simpan atau Update Master Demografi
        $laporan = Demografi::updateOrCreate(
            ['bulan' => $validatedData['bulan'], 'tahun' => $validatedData['tahun']], // Kunci pencarian
            $dataDemografi // Data yang disimpan
        );

        // 4. Simpan atau Update Relasi Umur (80+ Baris)
        if (isset($validatedData['umur_key']) && is_array($validatedData['umur_key'])) {
            foreach ($validatedData['umur_key'] as $index => $umur) {
                $laporan->umurs()->updateOrCreate(
                    ['umur' => $umur],
                    [
                        'laki' => $validatedData['umur_l'][$index] ?? 0,
                        'perempuan' => $validatedData['umur_p'][$index] ?? 0,
                    ]
                );
            }
        }

        // 5. Kembalikan ke halaman sebelumnya dengan notifikasi sukses
        return back()->with('success', 'Data laporan ' . $validatedData['bulan'] . '/' . $validatedData['tahun'] . ' berhasil disimpan & dipublikasikan!');
    }
}
