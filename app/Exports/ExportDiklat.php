<?php

namespace App\Exports;

use App\Models\Diklat;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportDiklat implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $diklat = Diklat::get();
        
        return $diklat->map(function($item, $index) {
            return [
                'No' => $index + 1,
                "NAMA_DIKLAT" => $item->NAMA_DIKLAT,
                "TANGGAL_MULAI" => \Carbon\Carbon::parse($item->TANGGAL_MULAI)->format('d-m-Y'),
                "TANGGAL_SELESAI" => \Carbon\Carbon::parse($item->TANGGAL_SELESAI)->format('d-m-Y'),
                "JUMLAH_JAM" => $item->JUMLAH_JAM,
                "PENYELENGGARA" => $item->PENYELENGGARA,
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
            "Nama Diklat",
            "Tanggal Mulai",
            "Tanggal Selesai",
            "Jumlah Jam",
            "Penyelenggara",
        ];
    }
}