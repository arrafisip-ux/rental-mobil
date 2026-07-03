<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemakaianPribadi extends Model
{
    use HasFactory;

    protected $fillable = [

        'mobil_id',

        'tanggal_keluar',

        'tanggal_kembali',

        'km_awal',

        'km_akhir',

        'total_km',

        'pengguna',

        'keperluan',

        'catatan',

    ];

    public function mobil()
    {
        return $this->belongsTo(Mobil::class);
    }
}