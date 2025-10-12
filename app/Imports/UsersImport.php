<?php

namespace App\Imports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Siswa([
            'nama'  => $row['nama'],
            'nis' => $row['nis'],
            'kelas_id'    => $row['kelas'],
        ]);
    }
}
