<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\Tarif;
use App\Models\Perawatan;
use Illuminate\Http\Request;
use App\Models\RiwayatOli;

class PerawatanController extends Controller
{
    public function index()
    {
        $perawatans = Perawatan::with('mobil')
            ->latest()
            ->paginate(10);

        return view('perawatan.index', compact('perawatans'));
    }

    public function create()
    {
        $mobils = Mobil::orderBy('merk')->get();

        return view('perawatan.create', compact('mobils'));
    }

    public function store(Request $request)
{
    $request->validate([
        'mobil_id' => 'required|exists:mobils,id',
        'tanggal_perawatan' => 'required|date',
        'jenis_perawatan' => 'required',
        'nama_sparepart' => 'nullable|string|max:255',
        'km_servis' => 'required|integer|min:0',
        'km_servis_berikutnya' => 'required|integer|min:0',
        'biaya' => 'required|numeric|min:0',
        'bengkel' => 'nullable|string|max:255',
        'keterangan' => 'nullable|string',
    ]);

    $perawatan = Perawatan::create($request->all());

    $mobil = Mobil::find($request->mobil_id);

    $mobil->update([
        'km_terakhir_servis'     => $request->km_servis,
        'km_servis_berikutnya'   => $request->km_servis_berikutnya,
        'tanggal_servis_terakhir'=> $request->tanggal_perawatan,
        'status_servis'          => 'Aman',
    ]);

    dd($request->jenis_perawatan);

    if ($request->jenis_perawatan == 'Ganti Oli') {

    RiwayatOli::create([
        'mobil_id'       => $request->mobil_id,
        'tanggal_ganti'  => $request->tanggal_perawatan,
        'km_ganti'       => $request->km_servis,
        'km_berikutnya'  => $request->km_servis_berikutnya,
        'keterangan'     => $request->nama_sparepart,
    ]);

}

    return redirect()
        ->route('perawatan.index')
        ->with('success', 'Data perawatan berhasil ditambahkan.');
}

    public function edit(Perawatan $perawatan)
    {
        $mobils = Mobil::orderBy('merk')->get();

        return view('perawatan.edit', compact(
            'perawatan',
            'mobils'
        ));
    }

    public function update(Request $request, Perawatan $perawatan)
{
    $request->validate([
        'mobil_id' => 'required|exists:mobils,id',
        'tanggal_perawatan' => 'required|date',
        'jenis_perawatan' => 'required',
        'nama_sparepart' => 'nullable|string|max:255',
        'km_servis' => 'required|integer|min:0',
        'km_servis_berikutnya' => 'required|integer|min:0',
        'biaya' => 'required|numeric|min:0',
        'bengkel' => 'nullable|string|max:255',
        'keterangan' => 'nullable|string',
    ]);

    $perawatan->update($request->all());

    $mobil = Mobil::find($request->mobil_id);

    $mobil->update([
        'km_terakhir_servis'      => $request->km_servis,
        'km_servis_berikutnya'    => $request->km_servis_berikutnya,
        'tanggal_servis_terakhir' => $request->tanggal_perawatan,
    ]);

    if ($request->jenis_perawatan == 'Ganti Oli') {

    RiwayatOli::updateOrCreate(

        [
            'mobil_id'      => $request->mobil_id,
            'tanggal_ganti' => $request->tanggal_perawatan,
        ],

        [
            'km_ganti'      => $request->km_servis,
            'km_berikutnya' => $request->km_servis_berikutnya,
            'keterangan'    => $request->nama_sparepart,
        ]

    );

}

    return redirect()
        ->route('perawatan.index')
        ->with('success', 'Data perawatan berhasil diperbarui.');
}

    public function destroy(Perawatan $perawatan)
    {
        $perawatan->delete();

        return back()->with(
            'success',
            'Data perawatan berhasil dihapus.'
        );
    }

    public function servisData(Mobil $mobil)
{
    $tarif = Tarif::where('mobil_id', $mobil->id)->first();

    $kmSaatServis = $mobil->kilometer;
    $interval = $tarif?->interval_ganti_oli ?? 10000;

    return response()->json([
        'kilometer' => $kmSaatServis,
        'interval' => $interval,
        'km_berikutnya' => $kmSaatServis + $interval,
    ]);
}
}