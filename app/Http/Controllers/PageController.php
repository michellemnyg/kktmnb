<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Demografi;

class PageController extends Controller
{
    public function index()
    {
        $bulanIni = date('m');
        $tahunIni = date('Y');
        
        // Coba ambil data bulan ini
        $data = Demografi::where('bulan', $bulanIni)->where('tahun', $tahunIni)->first();
        
        // Jika tidak ada data bulan ini, ambil data terbaru yang tersedia
        if (!$data) {
            $data = Demografi::orderBy('tahun', 'desc')->orderBy('bulan', 'desc')->first();
        }

        // Tentukan bulan dan tahun yang ditampilkan
        $displayBulan = $data ? $data->bulan : $bulanIni;
        $displayTahun = $data ? $data->tahun : $tahunIni;

        return view('welcome', compact('data', 'displayBulan', 'displayTahun'));
    }
}
