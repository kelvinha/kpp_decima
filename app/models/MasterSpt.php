<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class MasterSpt extends Model
{
    protected $table = 'master_spt';
    protected $fillable = [
        'npwp', 'kd_kpp', 'kd_cabang', 'no_tandaterima', 'jenis_spt', 'pembetulan', 'tgl_spt', 'status_spt','key_npwp',
    ];
}
