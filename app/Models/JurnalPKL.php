<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JurnalPKL extends Model
{
    protected $table = 'jurnal_pkls';
    
    protected $primaryKey = 'id_jurnal';

    protected $fillable = [
        'siswa_id',
        'tanggal',
        'jam_masuk',
        'jam_pulang',
        'kegiatan',
        'kon',
        'solusi',
        'foto',
        'status_jurnal',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }
}