<?php

namespace App\Exports;

use App\Models\SuratPanggilanTugas;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;


class ExportSpt implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $spt = SuratPanggilanTugas::orderBy("TANGGAL_SPT", "asc")->get();
        // Select only the columns you want to export
        return $spt->map(function($item, $index) {
            return [
                'No' => $index + 1,
                'NO_SPT' => $item->NO_SPT,
                'TANGGAL_SPT' => \Carbon\Carbon::parse($item->TANGGAL_SPT)->format('d-m-Y'),
                'NAMA' => $item->NAMA,
                'TANGGAL_MULAI' => \Carbon\Carbon::parse($item->TANGGAL_MULAI)->format('d-m-Y'),
                'TANGGAL_SELESAI' => \Carbon\Carbon::parse($item->SELESAI)->format('d-m-Y'),
                'LAMA_TUGAS' => $item->LAMA_TUGAS,
                'KEPERLUAN' => $item->KEPERLUAN,
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
            'Nomor SPT',  
            'Tanggal SPT', 
            'Nama', 
            'Tanggal Mulai', 
            'Tanggal Selesai', 
            'Lama Tugas', 
            'Keperluan'
        ];
    }
}