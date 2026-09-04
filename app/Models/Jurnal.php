<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JurnalPKL extends Model
{
    use HasFactory;

    protected $table = 'jurnal_pkls';

    protected $fillable = [
        'siswa_id',
        'tanggal',
        'kegiatan',
        'catatan',
        'status',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}