<?php

namespace App\Http\Controllers;

use App\Models\Tarif;
use Illuminate\Http\Request;

class TarifController extends Controller
{
    public function index()
    {
        $tarifs = Tarif::latest()->paginate(10);

        return view('tarif.index', compact('tarifs'));
    }

    public function create()
    {
        return view('tarif.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'harga_per_hari' => 'required|numeric',
            'tarif_km_dalam_kota' => 'required|numeric',
            'tarif_km_luar_kota' => 'required|numeric',
            'denda_per_hari' => 'required|numeric',
            'interval_ganti_oli' => 'required|integer',
            'notifikasi_ganti_oli' => 'required|integer',
        ]);

        Tarif::create($data);

        return redirect()
            ->route('tarif.index')
            ->with('success', 'Tarif berhasil ditambahkan.');
    }

    public function show(Tarif $tarif)
    {
        //
    }

    public function edit(Tarif $tarif)
    {
        return view('tarif.edit', compact('tarif'));
    }

    public function update(Request $request, Tarif $tarif)
    {
        $data = $request->validate([
            'harga_per_hari' => 'required|numeric',
            'tarif_km_dalam_kota' => 'required|numeric',
            'tarif_km_luar_kota' => 'required|numeric',
            'denda_per_hari' => 'required|numeric',
            'interval_ganti_oli' => 'required|integer',
            'notifikasi_ganti_oli' => 'required|integer',
        ]);

        $tarif->update($data);

        return redirect()
            ->route('tarif.index')
            ->with('success', 'Tarif berhasil diperbarui.');
    }

    public function destroy(Tarif $tarif)
    {
        $tarif->delete();

        return back()->with('success', 'Tarif berhasil dihapus.');
    }
}