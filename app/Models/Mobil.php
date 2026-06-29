<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    protected $fillable = [

'kode_mobil',
'merk',
'tipe',
'tahun',
'warna',
'plat_nomor',
'kapasitas',
'transmisi',
'bahan_bakar',
'kilometer',
'nomor_stnk',
'masa_berlaku_stnk',
'foto',
'status'

];

    public function penyewaans()
    {
        return $this->hasMany(Penyewaan::class);
    }

    public function riwayatOlis()
    {
        return $this->hasMany(RiwayatOli::class);
    }
}