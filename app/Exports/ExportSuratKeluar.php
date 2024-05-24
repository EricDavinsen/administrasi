<?php

namespace App\Exports;

use App\Models\SuratKeluar;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExportSuratKeluar implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view():View
    {
        $suratkeluar = SuratKeluar::orderBy('TANGGAL_SURAT', 'asc')->get();
        return view('tabel/tabelsuratkeluar', ['suratkeluar' => $suratkeluar]);
    }
}