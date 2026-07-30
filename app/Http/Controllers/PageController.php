<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Demografi;

class PageController extends Controller
{
    public function index()
    {
        $data = Demografi::orderBy('tahun', 'desc')->orderBy('bulan', 'desc')->first();

        $displayBulan = $data ? str_pad($data->bulan, 2, '0', STR_PAD_LEFT) : date('m');
        $displayTahun = $data ? $data->tahun : date('Y');

        return view('welcome', compact('data', 'displayBulan', 'displayTahun'));
    }
}
