<?php

namespace App\Exports;

use App\Models\DataBpjs;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportDataBpjs implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view():View
    {
        $databpjs = DataBpjs::get();
        return view('tabel/tabeldatabpjs', ['databpjs' => $databpjs]);
    }
}
