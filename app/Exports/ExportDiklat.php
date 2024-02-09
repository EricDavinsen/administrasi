<?php

namespace App\Exports;

use App\Models\Diklat;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportDiklat implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view():View
    {
        $diklat = Diklat::paginate(5);
        return view('tabel/tabeldiklat', ['diklat' => $diklat]);
    }
}
