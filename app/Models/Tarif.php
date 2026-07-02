<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tarif extends Model
{
    protected $fillable = [

        'mobil_id',

        'harga_6_jam',
        'harga_12_jam',
        'harga_24_jam',

        'overtime_per_jam',

        'tambahan_100km',
        'tambahan_200km',
        'tambahan_350km',

        'denda_per_hari',

        'interval_ganti_oli',

        'notifikasi_ganti_oli',
    ];

    public function mobil()
    {
        return $this->belongsTo(Mobil::class);
    }
}