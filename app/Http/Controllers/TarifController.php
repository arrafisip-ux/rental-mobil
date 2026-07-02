<?php

namespace App\Http\Controllers;

use App\Models\Tarif;
use App\Models\Mobil;
use Illuminate\Http\Request;

class TarifController extends Controller
{
    public function index()
    {
        $tarifs = Tarif::with('mobil')->latest()->paginate(10);

        return view('tarif.index', compact('tarifs'));
    }

    public function create()
    {
        $mobils = Mobil::whereDoesntHave('tarif')
                    ->orderBy('merk')
                    ->get();

        return view('tarif.create', compact('mobils'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'mobil_id'=>'required|exists:mobils,id',

            'harga_6_jam'=>'required|numeric',
            'harga_12_jam'=>'required|numeric',
            'harga_24_jam'=>'required|numeric',

            'overtime_per_jam'=>'required|numeric',

            'tambahan_100km'=>'required|numeric',
            'tambahan_200km'=>'required|numeric',
            'tambahan_350km'=>'required|numeric',

            'denda_per_hari'=>'required|numeric',

            'interval_ganti_oli'=>'required|numeric',
            'notifikasi_ganti_oli'=>'required|numeric',
        ]);

        Tarif::create($request->all());

        return redirect()
            ->route('tarif.index')
            ->with('success','Tarif berhasil ditambahkan.');
    }

    public function edit(Tarif $tarif)
    {
        $mobils = Mobil::orderBy('merk')->get();

        return view('tarif.edit', compact('tarif','mobils'));
    }

    public function update(Request $request, Tarif $tarif)
    {
        $request->validate([
            'mobil_id'=>'required',

            'harga_6_jam'=>'required|numeric',
            'harga_12_jam'=>'required|numeric',
            'harga_24_jam'=>'required|numeric',

            'overtime_per_jam'=>'required|numeric',

            'tambahan_100km'=>'required|numeric',
            'tambahan_200km'=>'required|numeric',
            'tambahan_350km'=>'required|numeric',

            'denda_per_hari'=>'required|numeric',

            'interval_ganti_oli'=>'required|numeric',
            'notifikasi_ganti_oli'=>'required|numeric',
        ]);

        $tarif->update($request->all());

        return redirect()
            ->route('tarif.index')
            ->with('success','Tarif berhasil diubah.');
    }

    public function destroy(Tarif $tarif)
    {
        $tarif->delete();

        return back()->with('success','Tarif berhasil dihapus.');
    }
}