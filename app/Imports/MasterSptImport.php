<?php

namespace App\Imports;

use App\models\MasterSpt;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MasterSptImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $key_npwp = $row['npwp'] . (string)$row['kd_kpp'] . $row['kd_cabang'];
        $timestamp = mktime(0,0,0,1,$row['tgl_spt']-1,1900);
        $tgl_spt = date('d,M Y',$timestamp);
        // dd($row['tgl_spt']);
        return new MasterSpt([
            'npwp' => $row['npwp'],
            'kd_kpp' => $row['kd_kpp'],
            'kd_cabang' => $row['kd_cabang'],
            'key_npwp' => $key_npwp,
            'no_tandaterima' => $row['no_tandaterima'],
            'jenis_spt' => $row['jenis_spt'],
            'pembetulan' => $row['pembetulan'],
            'tgl_spt' => $tgl_spt,
            'status_spt' => $row['status_spt'],
        ]);
    }
}
