<?php

namespace App\Exports;

use App\Models\Disposisi;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportDisposisi implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $disposisi = Disposisi::get();
    
        return $disposisi->map(function($item, $index) {
            return [
                'No' => $index + 1,
                'KODE_SURAT' => optional($item->surat)->KODE_SURAT,
                'NAMA' => $item->pegawais->implode('NAMA_PEGAWAI', ', '),
                'PENERUS' => $item->PENERUS,
                'INSTRUKSI' => $item->INSTRUKSI,
                'INFORMASI_LAINNYA' => $item->INFORMASI_LAINNYA,
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
            'Diteruskan', 
            'Nama', 
            'Instruksi', 
            'Informasi Lainnya'
        ];
    }
}