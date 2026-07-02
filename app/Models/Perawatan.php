<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perawatan extends Model
{
    protected $fillable = [

        'mobil_id',

        'tanggal_perawatan',

        'jenis_perawatan',

        'nama_sparepart',

        'km_servis',

        'km_servis_berikutnya',

        'biaya',

        'bengkel',

        'keterangan',

    ];

    protected $casts = [

        'tanggal_perawatan' => 'date',

    ];

    public function mobil()
    {
        return $this->belongsTo(Mobil::class);
    }
}