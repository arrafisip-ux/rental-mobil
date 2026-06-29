<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiwayatOli extends Model
{
    protected $table = 'riwayat_olis';

    protected $fillable = [
        'mobil_id',
        'tanggal_ganti',
        'km_ganti',
        'km_berikutnya',
        'keterangan',
    ];

    public function mobil()
    {
        return $this->belongsTo(Mobil::class);
    }
}