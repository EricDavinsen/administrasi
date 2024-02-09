<?php

namespace App\Exports;

use App\Models\Disposisi;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExportDisposisi implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view():View
    {
        $disposisi = Disposisi::latest()->paginate(5);
        return view('tabel/tabeldisposisi', ['disposisi' => $disposisi]);
    }
}