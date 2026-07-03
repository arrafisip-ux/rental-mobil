<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    protected $fillable = [
        'kode_mobil',
        'merk',
        'tipe',
        'plat_nomor',
        'tahun',
        'warna',
        'kapasitas',
        'transmisi',
        'bahan_bakar',

        'kilometer',

        // Data servis
        'km_terakhir_servis',
        'km_servis_berikutnya',
        'tanggal_servis_terakhir',

        'nomor_stnk',
        'masa_berlaku_stnk',

        'foto',

        'status',
    ];

    public function penyewaans()
    {
        return $this->hasMany(Penyewaan::class);
    }

    public function riwayatOlis()
    {
        return $this->hasMany(RiwayatOli::class);
    }

    public function perawatans()
    {
        return $this->hasMany(Perawatan::class);
    }

    // Relasi tarif berdasarkan tipe mobil
    public function tarif()
    {
        return $this->hasOne(Tarif::class, 'jenis_mobil', 'tipe');
    }
}