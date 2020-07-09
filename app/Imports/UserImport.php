<?php

namespace App\Imports;

use App\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UserImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'nip' => $row['nip_pendek'],
            'name' => $row['nama_pegawai'],
            'seksi' => $row['seksi'],
            'password' => \Hash::make('password'),
            'role' => 'pegawai',
        ]);
    }
}
