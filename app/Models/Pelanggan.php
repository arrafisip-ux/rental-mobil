<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $fillable = [
        'kode_pelanggan',
        'nama',
        'nik',
        'telepon',
        'alamat',
        'email',
        'sim',
    ];

    public function penyewaans()
    {
        return $this->hasMany(Penyewaan::class);
    }
}