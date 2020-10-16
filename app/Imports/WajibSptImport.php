<?php

namespace App\Imports;

use App\models\WajibSpt;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class WajibSptImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        return new WajibSpt([
            'npwp' => $row['npwp'],
            'nama_wp' => $row['nama_wp'],
            'jenis_wp' => $row['jenis_wp'],
            'tahun' => $row['tahun'],
        ]);
        
    }
}
