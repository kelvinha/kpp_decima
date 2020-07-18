<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class DimWilayah extends Model
{
    protected $table = 'dim_wilayah';
    protected $fillable = [
        'kelurahan', 'kecamatan',
    ];
}
