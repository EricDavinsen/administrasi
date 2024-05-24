<?php

namespace App\Exports;

use App\Models\RiwayatPendidikan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportRiwayatPendidikan implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view():View
    {
        $riwayatpendidikan = RiwayatPendidikan::get();
        return view('tabel/tabelriwayatpendidikan', ['riwayatpendidikan' => $riwayatpendidikan]);
    }
}