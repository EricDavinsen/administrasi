<?php

namespace App\Exports;

use App\Models\RiwayatSk;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportRiwayatSk implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $riwayatsk = RiwayatSk::get();
        
        return $riwayatsk->map(function($item, $index) {
            return [
                'No' => $index + 1,
                "JABATAN" => $item->JABATAN,
                "NOMOR_SK" => $item->NOMOR_SK,
                "TANGGAL_SK" => \Carbon\Carbon::parse($item->TANGGAL_SK)->format('d-m-Y'),
                "TMT_SK" => $item->TMT_SK
            ];
        });
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            "No",
            "Jabatan",
            "Nomor SK",
            "Tanggal SK",
            "TMT"
        ];
    }
}