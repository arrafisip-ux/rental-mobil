<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\Pelanggan;
use App\Models\Penyewaan;
use App\Models\RiwayatOli;
use App\Models\Tarif;

class DashboardController extends Controller
{
    public function index()
    {
        // Statistik
        $totalMobil = Mobil::count();

        $totalPelanggan = Pelanggan::count();

        $penyewaanAktif = Penyewaan::where('status', 'Berjalan')->count();

        $pendapatan = Penyewaan::sum('total_bayar');

        // Notifikasi Ganti Oli
        $mobilPerluOli = 0;

        $tarif = Tarif::first();

        if ($tarif) {

            $riwayatOlis = RiwayatOli::with('mobil')->get();

            foreach ($riwayatOlis as $item) {

                if (!$item->mobil) {
                    continue;
                }

                $sisaKm = $item->km_berikutnya - $item->mobil->kilometer;

                if ($sisaKm <= $tarif->notifikasi_ganti_oli) {

                    $mobilPerluOli++;

                }

            }

        }

        return view('dashboard.index', compact(
            'totalMobil',
            'totalPelanggan',
            'penyewaanAktif',
            'pendapatan',
            'mobilPerluOli'
        ));
    }
}