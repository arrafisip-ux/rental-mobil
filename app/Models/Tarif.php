<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tarif extends Model
{
    protected $fillable = [
        'harga_per_hari',
        'tarif_km_dalam_kota',
        'tarif_km_luar_kota',
        'denda_per_hari',
        'interval_ganti_oli',
        'notifikasi_ganti_oli',
    ];
}