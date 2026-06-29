<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\Pelanggan;
use App\Models\Penyewaan;

class DashboardController extends Controller
{
    public function index()
    {
        $totalMobil = Mobil::count();
        $totalPelanggan = Pelanggan::count();
        $penyewaanAktif = Penyewaan::where('status', 'Aktif')->count();
        $pendapatan = Penyewaan::sum('total_bayar');

        return view('dashboard.index', compact(
            'totalMobil',
            'totalPelanggan',
            'penyewaanAktif',
            'pendapatan'
        ));
    }
}