<?php

namespace App\Exports;

use App\Models\SuratMasuk;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExportSuratMasuk implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view():View
    {
        $suratmasuk = SuratMasuk::latest()->paginate(5);
        return view('tabel/tabelsuratmasuk', ['suratmasuk' => $suratmasuk]);
    }
}
