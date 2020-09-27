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
        $check = MasterNpwp::where('npwp',$row['npwp'])->get();
        // dd($check->count());
        if($check->count() == 1){
            $perbarui = MasterNpwp::where('npwp',$row['npwp'])->first();
            $perbarui->kd_kpp = $row['kd_kpp'];
            $perbarui->kd_cabang = $row['kd_cabang'];
            $perbarui->key_npwp = $key_npwp;
            $perbarui->nama_wp = $row['nama_wp'];
            $perbarui->jenis_wp = $row['jenis_wp'];
            $perbarui->kota = $row['kota'];
            $perbarui->kelurahan = $row['kelurahan'];
            $perbarui->kecamatan = $row['kecamatan'];
            $perbarui->propinsi = $row['propinsi'];
            $perbarui->nama_ar = $row['nama_ar'];
            $perbarui->seksi = $row['seksi'];
            $perbarui->nip_pendek = $row['nip_pendek'];
            $perbarui->save();
        }
        else {
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
}
