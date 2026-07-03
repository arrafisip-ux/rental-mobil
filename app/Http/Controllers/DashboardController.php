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
        // Update status servis otomatis
        $mobils = Mobil::all();

        foreach ($mobils as $mobil) {

            if ($mobil->km_servis_berikutnya) {

                $sisa = $mobil->km_servis_berikutnya - $mobil->kilometer;

                if ($sisa <= 0) {

                    $mobil->status_servis = 'Terlambat Servis';

                } elseif ($sisa <= 500) {

                    $mobil->status_servis = 'Segera Servis';

                } else {

                    $mobil->status_servis = 'Aman';

                }

                $mobil->save();

            }

        }

        /*
        |--------------------------------------------------------------------------
        | Statistik
        |--------------------------------------------------------------------------
        */

        $totalMobil = Mobil::count();

        $mobilReady = Mobil::where('status', 'Ready')->count();

        $mobilDipakai = Mobil::where('status', 'Dipakai')->count();

        $mobilPengecekan = Mobil::where('status', 'Pengecekan')->count();

        $totalPelanggan = Pelanggan::count();

        $penyewaanAktif = Penyewaan::where('status', 'Berjalan')->count();

        $pendapatan = Penyewaan::sum('total_bayar');

        $totalDenda = Penyewaan::sum('denda');

        /*
        |--------------------------------------------------------------------------
        | Monitoring Servis
        |--------------------------------------------------------------------------
        */

        $mobilPerluServis = Mobil::where('status_servis', 'Terlambat Servis')
            ->orderBy('kilometer')
            ->get();

        $mobilHampirServis = Mobil::where('status_servis', 'Segera Servis')
            ->orderBy('kilometer')
            ->get();

        $mobilServisTerlambat = $mobilPerluServis->count();

        /*
        |--------------------------------------------------------------------------
        | STNK
        |--------------------------------------------------------------------------
        */

        $stnkHampirHabis = Mobil::whereDate(
                'masa_berlaku_stnk',
                '<=',
                Carbon::now()->addDays(30)
            )
            ->orderBy('masa_berlaku_stnk')
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

            'mobilServisTerlambat',

            'stnkHampirHabis'

        ));
    }
}