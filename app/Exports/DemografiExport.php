<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Models\Demografi;

class DemografiExport implements FromView, ShouldAutoSize
{
    protected $bulan;
    protected $tahun;
    protected $namaBulan;

    public function __construct($bulan, $tahun, $namaBulan)
    {
        $this->bulan = $bulan;
        $this->tahun = $tahun;
        $this->namaBulan = $namaBulan;
    }

    public function view(): View
    {
        $data = Demografi::with('umurs')->where('bulan', $this->bulan)->where('tahun', $this->tahun)->first();
        
        return view('exports.demografi', [
            'data' => $data,
            'namaBulan' => $this->namaBulan,
            'tahun' => $this->tahun
        ]);
    }
}
