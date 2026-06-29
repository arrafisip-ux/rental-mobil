<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $fillable = [
        'nik',
        'nama_lengkap',
        'no_hp',
        'no_darurat',
        'email',
        'alamat',
        'foto_ktp',
    ];

    public function penyewaans()
    {
        return $this->hasMany(Penyewaan::class);
    }
}