<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class MasterNpwp extends Model
{
    protected $table = 'master_npwp';

    protected $fillable = [
        'npwp', 'kd_kpp', 'kd_cabang', 'nama_wp', 'jenis_wp', 'kota', 'kelurahan', 'kecamatan', 'propinsi', 'nama_ar', 'seksi', 'nip_pendek','key_npwp',
    ];
}
