<?php

namespace App\Exports;

use App\Models\DataKeluarga;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportDataKeluarga implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view():View
    {
        $datakeluarga = DataKeluarga::paginate(5);
        return view('tabel/tabeldatakeluarga', ['datakeluarga' => $datakeluarga]);
    }
}