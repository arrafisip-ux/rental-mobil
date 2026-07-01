<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\RiwayatOli;
use App\Models\Tarif;
use Illuminate\Http\Request;
class RiwayatOliController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $riwayatOlis = RiwayatOli::with('mobil')
            ->latest()
            ->paginate(10);

        return view('riwayat-oli.index', compact('riwayatOlis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mobils = Mobil::orderBy('merk')
            ->orderBy('tipe')
            ->get();

        return view('riwayat-oli.create', compact('mobils'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'mobil_id' => 'required|exists:mobils,id',
        'tanggal_ganti' => 'required|date',
        'km_ganti' => 'required|numeric|min:0',
        'keterangan' => 'nullable|string|max:255',
    ]);

    $tarif = Tarif::first();

    if (!$tarif) {
        return back()
            ->withInput()
            ->withErrors([
                'tarif' => 'Silakan tambahkan data tarif terlebih dahulu.'
            ]);
    }

    $validated['km_berikutnya'] =
        $validated['km_ganti'] + $tarif->interval_ganti_oli;

    RiwayatOli::create($validated);

    return redirect()
        ->route('riwayat-oli.index')
        ->with('success', 'Riwayat ganti oli berhasil ditambahkan.');
}

    /**
     * Display the specified resource.
     */
    public function show(RiwayatOli $riwayatOli)
    {
        return redirect()->route('riwayat-oli.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RiwayatOli $riwayatOli)
    {
        $mobils = Mobil::orderBy('merk')
            ->orderBy('tipe')
            ->get();

        return view('riwayat-oli.edit', compact(
            'riwayatOli',
            'mobils'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RiwayatOli $riwayatOli)
{
    $validated = $request->validate([
        'mobil_id' => 'required|exists:mobils,id',
        'tanggal_ganti' => 'required|date',
        'km_ganti' => 'required|numeric|min:0',
        'keterangan' => 'nullable|string|max:255',
    ]);

    $tarif = Tarif::first();

    if (!$tarif) {
        return back()
            ->withInput()
            ->withErrors([
                'tarif' => 'Silakan tambahkan data tarif terlebih dahulu.'
            ]);
    }

    $validated['km_berikutnya'] =
        $validated['km_ganti'] + $tarif->interval_ganti_oli;

    $riwayatOli->update($validated);

    return redirect()
        ->route('riwayat-oli.index')
        ->with('success', 'Riwayat ganti oli berhasil diperbarui.');
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RiwayatOli $riwayatOli)
    {
        $riwayatOli->delete();

        return redirect()
            ->route('riwayat-oli.index')
            ->with('success', 'Riwayat ganti oli berhasil dihapus.');
    }
}