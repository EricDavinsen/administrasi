<?php

namespace App\Exports;

use App\Models\SuratPerintahTugas;
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
        $spt = SuratPerintahTugas::orderBy("TANGGAL_SPT", "asc")->get();
    
        return $spt->map(function($item, $index) {
         
            if ($item->LAMA_TUGAS == 0) {
                $lamaTugas = '1 hari';
            }else{
                $lamaTugas = $item->LAMA_TUGAS . ' hari';
            }

            return [
                'No' => $index + 1,
                'NO_SPT' => $item->NO_SPT,
                'TANGGAL_SPT' => \Carbon\Carbon::parse($item->TANGGAL_SPT)->format('d-m-Y'),
                'NAMA' => $item->pegawais->implode('NAMA_PEGAWAI', ', '),
                'TANGGAL_MULAI' => \Carbon\Carbon::parse($item->TANGGAL_MULAI)->format('d-m-Y'),
                'TANGGAL_SELESAI' => \Carbon\Carbon::parse($item->SELESAI)->format('d-m-Y'),
                'LAMA_TUGAS' => $lamaTugas,
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