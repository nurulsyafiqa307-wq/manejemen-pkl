<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Guru;
use App\Models\Penilaian;

class Siswa extends Model
{
    use HasFactory;
    protected $fillable = [
    'user_id',
    'nis',
    'nama',
    'kelas',
    'jurusan',
    'no_hp',
    'status_pkl',
    'tempat_pkl',
    'guru_pembimbing_id',
];

    /**
     * Siswa memiliki satu akun User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function jurnalPkls()
    {
        return $this->hasMany(JurnalPKL::class, 'siswa_id');
    }

    public function guruPembimbing()
    {
        return $this->belongsTo(Guru::class, 'guru_pembimbing_id');
    }

    public function penilaian()
    {
        return $this->hasOne(Penilaian::class, 'siswa_id');
    }
}