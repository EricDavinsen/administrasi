<?php

namespace App\Exports;

use App\Models\Pegawai;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class ExportSurat implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view():View
    {
        $pegawai = Pegawai::orderBy('NAMA_PEGAWAI', 'desc')->get();
        return view('tabelpegawai', ['pegawai' => $pegawai]);
    }
}
