<?php

namespace App\Exports;

use App\Models\SuratPanggilanTugas;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class ExportSpt implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view():View
    {
        $spt = SuratPanggilanTugas::orderBy('TANGGAL_SPT', 'asc')->get();
        return view('tabel/tabelspt', ['spt' => $spt]);
    }
}