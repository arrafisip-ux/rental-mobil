<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\Penyewaan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $query = Penyewaan::with([
            'pelanggan',
            'mobil'
        ]);

        if ($request->filled('tanggal_awal')) {

            $query->whereDate(
                'tanggal_pinjam',
                '>=',
                $request->tanggal_awal
            );

        }

        if ($request->filled('tanggal_akhir')) {

            $query->whereDate(
                'tanggal_pinjam',
                '<=',
                $request->tanggal_akhir
            );

        }

        if ($request->filled('mobil_id')) {

            $query->where(
                'mobil_id',
                $request->mobil_id
            );

        }

        if ($request->filled('status')) {

            $query->where(
                'status',
                $request->status
            );

        }

        $laporans = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $totalPendapatan = (clone $query)
            ->sum('total_bayar');

        $mobils = Mobil::orderBy('merk')
            ->orderBy('tipe')
            ->get();

        return view(
            'laporan.index',
            compact(
                'laporans',
                'mobils',
                'totalPendapatan'
            )
        );
    }

    public function create()
    {
        abort(404);
    }

    public function store(Request $request)
    {
        abort(404);
    }

    public function show(string $id)
    {
        abort(404);
    }

    public function edit(string $id)
    {
        abort(404);
    }

    public function update(Request $request, string $id)
    {
        abort(404);
    }

    public function destroy(string $id)
    {
        abort(404);
    }
}