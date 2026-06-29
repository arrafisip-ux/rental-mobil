<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\Pelanggan;
use App\Models\Penyewaan;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [

            'totalMobil' => Mobil::count(),

            'mobilReady' => Mobil::where('status','Ready')->count(),

            'mobilDipakai' => Mobil::where('status','Dipakai')->count(),

            'mobilPengecekan' => Mobil::where('status','Pengecekan')->count(),

            'totalPelanggan' => Pelanggan::count(),

            'penyewaanAktif' => Penyewaan::where('status','Aktif')->count(),

            'totalPendapatan' => Penyewaan::sum('total_bayar'),

            'riwayat' => Penyewaan::latest()->take(5)->get(),

        ]);
    }
}