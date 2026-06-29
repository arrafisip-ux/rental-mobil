<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penyewaan extends Model
{
    protected $fillable = [
        'no_transaksi',
        'pelanggan_id',
        'mobil_id',
        'tanggal_pinjam',
        'tanggal_kembali',
        'tanggal_kembali_aktual',
        'tujuan',
        'estimasi_km',
        'km_awal',
        'km_akhir',
        'total_km',
        'biaya_sewa',
        'biaya_jarak',
        'denda',
        'total_bayar',
        'status',
    ];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }

    public function mobil()
    {
        return $this->belongsTo(Mobil::class);
    }
}