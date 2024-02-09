<?php

namespace App\Exports;

use App\Models\Pegawai;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class ExportPegawai implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view():View
    {
        $pegawai = Pegawai::orderBy('NAMA_PEGAWAI', 'desc')->get();
        return view('tabel/tabelpegawai', ['pegawai' => $pegawai]);
    }
}
