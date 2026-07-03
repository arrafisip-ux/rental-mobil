<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\Pelanggan;
use App\Models\Penyewaan;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Statistik Mobil
        $totalMobil = Mobil::count();

        $mobilReady = Mobil::where('status', 'Ready')->count();

        $mobilDipakai = Mobil::where('status', 'Dipakai')->count();

        $mobilPengecekan = Mobil::where('status', 'Pengecekan')->count();

        // Statistik Pelanggan
        $totalPelanggan = Pelanggan::count();

        // Penyewaan
        $penyewaanAktif = Penyewaan::where('status', 'Berjalan')->count();

        // Pendapatan
        $pendapatan = Penyewaan::sum('total_bayar');

        // Total Denda
        $totalDenda = Penyewaan::sum('denda');

        // ==========================
        // NOTIFIKASI GANTI OLI
        // ==========================

        $mobilPerluServis = Mobil::whereRaw('kilometer >= km_servis_berikutnya')
            ->get();

        $mobilHampirServis = Mobil::whereRaw('kilometer < km_servis_berikutnya')
            ->whereRaw('(km_servis_berikutnya - kilometer) <= 500')
            ->get();

        // ==========================
        // STNK Hampir Habis
        // ==========================

        $stnkHampirHabis = Mobil::whereDate(
                'masa_berlaku_stnk',
                '<=',
                Carbon::now()->addDays(30)
            )
            ->get();

        return view('dashboard.index', compact(

            'totalMobil',
            'mobilReady',
            'mobilDipakai',
            'mobilPengecekan',

            'totalPelanggan',

            'penyewaanAktif',

            'pendapatan',
            'totalDenda',

            'mobilPerluServis',
            'mobilHampirServis',

            'stnkHampirHabis'

        ));
    }
}