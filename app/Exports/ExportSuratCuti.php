<?php

namespace App\Exports;

use App\Models\SuratCuti;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportSuratCuti implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {

        $suratcuti = SuratCuti::orderBy('pegawai_id->NAMA_PEGAWAI', 'asc')->get();

        return $suratcuti->map(function($item, $index) {
            return [
                'No' => $index + 1,
                'NO_CUTI' => $item->NO_CUTI,
                'NAMA_PEGAWAI' => $item->pegawai->NAMA_PEGAWAI,
                'JENIS_CUTI' => $item->JENIS_CUTI,
                'ALASAN_CUTI' => $item->ALASAN_CUTI,
                'TANGGAL_MULAI' => \Carbon\Carbon::parse($item->TANGGAL_MULAI)->format('d-m-Y'),
                'TANGGAL_SELESAI' => \Carbon\Carbon::parse($item->TANGGAL_SELESAI)->format('d-m-Y'),
                'LAMA_CUTI' => $item->LAMA_CUTI,
                'SISA_CUTI_TAHUNAN' => $item->pegawai->SISA_CUTI_TAHUNAN,
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
            'Nomor Cuti', 
            'Nama', 
            'Jenis Cuti', 
            'Alasan', 
            'Tanggal Mulai', 
            'Tanggal Selesai', 
            'Lama Cuti', 
            'Sisa Cuti Tahunan'
        ];
    }
}