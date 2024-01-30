<?php

namespace App\Imports;

use App\Models\Pegawai;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportPegawai implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Pegawai([
            'NAMA_PEGAWAI' => $row['Nama'],
            'TANGGAL_LAHIR' => $row['Tanggal Lahir'],
            'JENIS_KELAMIN' => $row['Jenis Kelamin'],
            'INSTANSI' => $row['Instansi'],
            'JABATAN' => $row['Jabatan'],
            'STATUS_PEGAWAI' => $row['Status'],
        ]);
    }
}
