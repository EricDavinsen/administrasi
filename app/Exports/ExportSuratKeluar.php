<?php

namespace App\Exports;

use App\Models\SuratKeluar;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportSuratKeluar implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // Select only the columns you want to export
        $suratkeluar = SuratKeluar::orderBy("TANGGAL_SURAT", "asc")->get();
      
        return $suratkeluar->map(function($item, $index) {
            return [
                'No' => $index + 1,
                'NOMOR_SURAT' => $item->NOMOR_SURAT,
                'TANGGAL_SURAT' => \Carbon\Carbon::parse($item->TANGGAL_SURAT)->format('d-m-Y'),
                'JENIS_SURAT' => $item->JENIS_SURAT,
                'TUJUAN_SURAT' => $item->TUJUAN_SURAT,
                'SIFAT_SURAT' => $item->SIFAT_SURAT,
                'PERIHAL_SURAT' => $item->PERIHAL_SURAT,
            ];
        });
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'No',
            'Nomor Surat', 
            'Tanggal Surat', 
            'Jenis Surat', 
            'Tujuan', 
            'Sifat', 
            'Perihal'
        ];
    }
}