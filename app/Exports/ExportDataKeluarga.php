<?php

namespace App\Exports;

use App\Models\DataKeluarga;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportDataKeluarga implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $datakeluarga = DataKeluarga::where('pegawai_id', request('id'))->get();
        
        return $datakeluarga->map(function($item, $index) {
            return [
                'No' => $index + 1,
                "NAMA_KELUARGA" => $item->NAMA_KELUARGA,
                "TANGGAL_LAHIR" => \Carbon\Carbon::parse($item->TANGGAL_LAHIR)->format('d-m-Y'),
                "JENIS_KELAMIN" => $item->JENIS_KELAMIN,
                "STATUS" => $item->STATUS,
                "PEKERJAAN" => $item->PEKERJAAN,
                "NO_TELEPON" => $item->NO_TELEPON
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
            "Nama Keluarga",
            "Tanggal Lahir",
            "Jenis Kelamin",
            "Status",
            "Pekerjaan",
            "No. Telepon"
        ];
    }
}