<?php

namespace App\Exports;

use App\Models\DataBpjs;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportDataBpjs implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $databpjs = DataBpjs::get();
        
        return $databpjs->map(function($item, $index) {
            return [
                'No' => $index + 1,
                "NOMOR_JKN" => $item->NOMOR_JKN,
                "NIK" => $item->NIK,
                "NIP" => $item->NIP,
                "NAMA_LENGKAP" => $item->NAMA_LENGKAP,
                "JENIS_KELAMIN" => $item->JENIS_KELAMIN,
                "STATUS_KAWIN" => $item->STATUS_KAWIN,
                "HUBUNGAN_KELUARGA" => $item->HUBUNGAN_KELUARGA,
                "TANGGAL_LAHIR" => \Carbon\Carbon::parse($item->TANGGAL_LAHIR)->format('d-m-Y'),
                "TANGGAL_MULAI_TMT" => \Carbon\Carbon::parse($item->TANGGAL_MULAI_TMT)->format('d-m-Y'),
                "TANGGAL_SELESAI_TMT" => \Carbon\Carbon::parse($item->TANGGAL_SELESAI_TMT)->format('d-m-Y'),
                "GAJI_POKOK" => $item->GAJI_POKOK,
                "NAMA_FASKES" => $item->NAMA_FASKES,
                "NO_TELEPON" => $item->NO_TELEPON,
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
            "No JKN",
            "NIK",
            "NIP",
            "Nama Lengkap",
            "Jenis Kelamin",
            "Status Kawin",
            "Hubungan Keluarga",
            "Tanggal Lahir",
            "Tanggal Mulai TMT",
            "Tanggal Selesai TMT",
            "Gaji Pokok",
            "Nama Faskes",
            "No Telepon",
        ];
    }
}
