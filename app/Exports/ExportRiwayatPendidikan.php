<?php

namespace App\Exports;

use App\Models\RiwayatPendidikan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportRiwayatPendidikan implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $riwayatpendidikan = RiwayatPendidikan::where('pegawai_id', request('id'))->get();
        
        return $riwayatpendidikan->map(function($item, $index) {
            return [
                'No' => $index + 1,
                "NAMA_SEKOLAH" => $item->NAMA_SEKOLAH,
                "JURUSAN" => $item->JURUSAN,
                "TAHUN_LULUS" => $item->TAHUN_LULUS,
                "STTB" => $item->STTB,
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
            "Nama Sekolah",
            "Jurusan",
            "Tahun Lulus",
            "STTB",
        ];
    }
}