<?php

namespace App\Exports;

use App\Models\SuratCuti;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExportSuratCuti implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view():View
    {
        $suratcuti = SuratCuti::orderBy('NO_CUTI', 'asc')->get();
        return view('tabel/tabelsuratcuti', ['suratcuti' => $suratcuti]);
    }
}