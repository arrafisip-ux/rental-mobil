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
        'tanggal_kembali_rencana',
        'tanggal_kembali',

        'paket',

        'tujuan',
        'jenis_perjalanan',

        'estimasi_km',

        'km_awal',
        'km_akhir',
        'total_km',

        'lama_sewa',

        'harga_sewa',
        'biaya_luar_kota',

        'jam_overtime',
        'overtime',

        'denda',

        'total_bayar',

        'status_pembayaran',

        'cek_ktp',
        'cek_sim',
        'cek_id_karyawan',
        'cek_slip_gaji',
        'cek_tempat_usaha',

        'kondisi_kembali',

        'status',

        'catatan',
    ];

    protected $casts = [

        'tanggal_pinjam' => 'datetime',

        'tanggal_kembali_rencana' => 'datetime',

        'tanggal_kembali' => 'datetime',

        'cek_ktp' => 'boolean',

        'cek_sim' => 'boolean',

        'cek_id_karyawan' => 'boolean',

        'cek_slip_gaji' => 'boolean',

        'cek_tempat_usaha' => 'boolean',

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