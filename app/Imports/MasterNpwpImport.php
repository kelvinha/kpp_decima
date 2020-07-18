<?php

namespace App\Imports;

use App\models\MasterNpwp;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MasterNpwpImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $key_npwp = $row['npwp'] . (string)$row['kd_kpp'] . $row['kd_cabang'];
        // dd($key_npwp);
        return new MasterNpwp([
            'npwp' => $row['npwp'],
            'kd_kpp' => $row['kd_kpp'],
            'kd_cabang' => $row['kd_cabang'],
            'key_npwp' => $key_npwp,
            'nama_wp' => $row['nama_wp'],
            'jenis_wp' => $row['jenis_wp'],
            'kota' => $row['kota'],
            'kelurahan' => $row['kelurahan'],
            'kecamatan' => $row['kecamatan'],
            'propinsi' => $row['propinsi'],
            'nama_ar' => $row['nama_ar'],
            'seksi' => $row['seksi'],
            'nip_pendek' => $row['nip_pendek'],
        ]);
    }
}
