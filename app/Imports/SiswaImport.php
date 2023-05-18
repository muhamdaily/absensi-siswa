<?php

namespace App\Imports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SiswaImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Siswa([
            'nopes'     => $row['nopes'],
            'absen'     => $row['absen'],
            'nama'      => $row['nama'],
            'kelas'     => $row['kelas'],
            'hp_ortu'   => $row['hp_ortu'],
        ]);
    }
}
