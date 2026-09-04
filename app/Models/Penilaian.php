<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    protected $fillable = [
        'siswa_id',
        'disiplin',
        'komunikasi',
        'kerjasama',
        'tanggung_jawab',
        'keterampilan',
        'rata_rata',
        'catatan'
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}