<?php

namespace App\Exports;

use App\Models\RiwayatSk;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportRiwayatSk implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view():View
    {
        $riwayatsk = RiwayatSk::get();
        return view('tabel/tabelriwayatsk', ['riwayatsk' => $riwayatsk]);
    }
}