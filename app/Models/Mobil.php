<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    protected $fillable = [
        'kode_mobil',
        'merk',
        'tipe',
        'plat_nomor',
        'tahun',
        'warna',
        'transmisi',
        'bahan_bakar',
        'kilometer',
        'status',
        'foto',
    ];

    public function penyewaans()
    {
        return $this->hasMany(Penyewaan::class);
    }
}