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
        // 1. Validasi Periode agar tidak kosong
        $request->validate([
            'bulan' => 'required',
            'tahun' => 'required',
        ]);

        // 2. Pisahkan data umur array dari request utama
        $dataDemografi = $request->except(['_token', 'bulan', 'tahun', 'umur_key', 'umur_l', 'umur_p']);

        // 3. Simpan atau Update Master Demografi
        $laporan = Demografi::updateOrCreate(
            ['bulan' => $request->bulan, 'tahun' => $request->tahun], // Kunci pencarian
            $dataDemografi // Data yang disimpan
        );

        // 4. Simpan atau Update Relasi Umur (80+ Baris)
        if ($request->has('umur_key')) {
            foreach ($request->umur_key as $index => $umur) {
                $laporan->umurs()->updateOrCreate(
                    ['umur' => $umur],
                    [
                        'laki' => $request->umur_l[$index] ?? 0,
                        'perempuan' => $request->umur_p[$index] ?? 0,
                    ]
                );
            }
        }

        // 5. Kembalikan ke halaman sebelumnya dengan notifikasi sukses
        return back()->with('success', 'Data laporan ' . $request->bulan . '/' . $request->tahun . ' berhasil disimpan & dipublikasikan!');
    }
}
