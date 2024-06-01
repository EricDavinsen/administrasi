<?php

namespace App\Exports;

use App\Models\SuratMasuk;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportSuratMasuk implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $suratmasuk = SuratMasuk::orderBy("TANGGAL_SURAT", "asc")->get();

        return $suratmasuk->map(function($item, $index) {
            return [
                'No' => $index + 1,
                'KODE_SURAT' => $item->KODE_SURAT,
                'NOMOR_SURAT' => $item->NOMOR_SURAT,
                'TANGGAL_SURAT' => \Carbon\Carbon::parse($item->TANGGAL_SURAT)->format('d-m-Y'),
                'TANGGAL_MASUK' => \Carbon\Carbon::parse($item->TANGGAL_MASUK)->format('d-m-Y'),
                'JENIS_SURAT' => $item->jenis->JENIS_SURAT,
                'ASAL_SURAT' => $item->ASAL_SURAT,
                'SIFAT_SURAT' => $item->sifat->SIFAT_SURAT,
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
            'Kode Surat', 
            'Nomor Surat', 
            'Tanggal Surat', 
            'Tanggal Masuk', 
            'Jenis Surat', 
            'Asal Surat', 
            'Sifat',
            'Perihal'
        ];
    }
}