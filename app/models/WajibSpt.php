<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class WajibSpt extends Model
{
    protected $table = 'wajib_spt';

    protected $fillable = [
        'npwp','nama_wp', 'jenis_wp', 'tahun',
    ];
}
