<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use App\Models\Demografi;

class DemografiExport implements FromView, ShouldAutoSize, WithStyles, WithColumnFormatting
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

    public function styles(Worksheet $sheet)
    {
        $lastRow = $sheet->getHighestRow();
        
        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => '00000000'],
                ],
            ],
        ];

        // Apply borders to left table (A5 to F[lastRow])
        $sheet->getStyle('A5:F' . ($lastRow - 8))->applyFromArray($styleArray);
        
        // Apply borders to right table (H5 to K89) - age table is fixed size 85 rows + 1 header = 86 rows
        // Let's just find the max row for right side which is fixed (row 5 to 90)
        $sheet->getStyle('H5:K90')->applyFromArray($styleArray);

        // Bold for headers
        $sheet->getStyle('A5:K5')->getFont()->setBold(true);

        return [];
    }

    public function columnFormats(): array
    {
        $format = '#,##0;-#,##0;"-"';
        return [
            'D' => $format,
            'E' => $format,
            'F' => $format,
            'I' => $format,
            'J' => $format,
            'K' => $format,
        ];
    }
}
