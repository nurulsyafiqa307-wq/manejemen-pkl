<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TempatPkl extends Model
{
    protected $fillable = [
        'nama_perusahaan',
        'bidang',
        'alamat',
        'no_hp',
        'kuota',
        'keterangan',
    ];
}