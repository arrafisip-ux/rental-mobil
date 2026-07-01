<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penyewaan extends Model
{
    protected $fillable = [
        'kode_sewa',

        'pelanggan_id',
        'mobil_id',

        'tanggal_pinjam',
        'tanggal_kembali_rencana',
        'tanggal_kembali',

        'paket',
        'jenis_perjalanan',

        'estimasi_km',

        'harga_sewa',
        'biaya_luar_kota',
        'overtime',
        'denda',
        'total_bayar',

        'cek_ktp',
        'cek_sim',
        'cek_id_karyawan',
        'cek_slip_gaji',
        'cek_tempat_usaha',

        'status',
        'catatan',
    ];

    protected $casts = [
        'tanggal_pinjam'            => 'datetime',
        'tanggal_kembali_rencana'   => 'datetime',
        'tanggal_kembali'           => 'datetime',

        'cek_ktp'            => 'boolean',
        'cek_sim'            => 'boolean',
        'cek_id_karyawan'    => 'boolean',
        'cek_slip_gaji'      => 'boolean',
        'cek_tempat_usaha'   => 'boolean',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relasi
    |--------------------------------------------------------------------------
    */

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }

    public function mobil()
    {
        return $this->belongsTo(Mobil::class);
    }
}