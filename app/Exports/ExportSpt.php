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
        $spt = SuratPanggilanTugas::latest()->paginate(5);
        return view('tabel/tabelspt', ['spt' => $spt]);
    }
}