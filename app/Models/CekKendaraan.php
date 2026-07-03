<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CekKendaraan extends Model
{
    use HasFactory;

    protected $fillable = [

        'mobil_id',

        'tanggal',

        'jenis_cek',

        'cek_body',

        'cek_ban',

        'cek_lampu',

        'cek_rem',

        'cek_oli',

        'cek_air_radiator',

        'cek_bensin',

        'cek_interior',

        'catatan',

    ];

    public function mobil()
    {
        return $this->belongsTo(Mobil::class);
    }
}