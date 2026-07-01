<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $fillable = [

        'kode_pelanggan',

        'nik',

        'nama',

        'telepon',

        'telepon_darurat',

        'alamat',

        'nomor_sim',

        'masa_berlaku_sim',

    ];

    public function penyewaans()
    {
        return $this->hasMany(Penyewaan::class);
    }
}