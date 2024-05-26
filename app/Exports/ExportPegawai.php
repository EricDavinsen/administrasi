<?php

namespace App\Exports;

use App\Models\Pegawai;
use App\Models\Disposisi;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportPegawai implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $pegawai = Pegawai::orderBy('NAMA_PEGAWAI', 'asc')->get();
        
        return $pegawai->map(function($item, $index) {
            return [
                'No' => $index + 1,
                "NAMA_PEGAWAI" => $item->NAMA_PEGAWAI,
                "NIK" => $item->NIK,
                "NO_KK" => $item->NO_KK,
                "TANGGAL_LAHIR" => \Carbon\Carbon::parse($item->TANGGAL_LAHIR)->format('d-m-Y'),
                "JENIS_KELAMIN" => $item->JENIS_KELAMIN,
                "AGAMA" => $item->AGAMA,
                "INSTANSI" => $item->INSTANSI,
                "UNIT" => $item->UNIT,
                "SUB_UNIT" => $item->SUB_UNIT,
                "JABATAN_PEGAWAI" => $item->JABATAN_PEGAWAI,
                "JENIS_PEGAWAI" => $item->JENIS_PEGAWAI,
                "PENDIDIKAN_TERAKHIR" => $item->PENDIDIKAN_TERAKHIR,
                "STATUS_PEGAWAI" => $item->STATUS_PEGAWAI,
                "KEDUDUKAN" => $item->KEDUDUKAN,
                "SISA_CUTI_TAHUNAN" => $item->SISA_CUTI_TAHUNAN,
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
            "Nama Pegawai",
            "NIK",
            "No KK",
            "Tanggal Lahir",
            "Jenis Kelamin",
            "Agama",
            "Instansi",
            "Unit",
            "Sub Unit",
            "Jabatan Pegawai",
            "Jenis Pegawai",
            "Pendidikan Terakhir",
            "Status Pegawai",
            "Kedudukan",
            "Sisa Cuti Tahunan",
        ];
    }
}