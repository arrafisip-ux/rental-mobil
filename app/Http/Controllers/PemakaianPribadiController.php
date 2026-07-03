<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\PemakaianPribadi;
use Illuminate\Http\Request;

class PemakaianPribadiController extends Controller
{
    public function index()
    {
        $pemakaians = PemakaianPribadi::with('mobil')
            ->latest()
            ->paginate(10);

        return view('pemakaian-pribadi.index', compact('pemakaians'));
    }

    public function create()
    {
        $mobils = Mobil::where('status', 'Ready')
            ->orderBy('merk')
            ->get();

        return view('pemakaian-pribadi.create', compact('mobils'));
    }

    public function store(Request $request)
    {
        $request->validate([

            'mobil_id'          => 'required|exists:mobils,id',

            'tanggal_keluar'    => 'required|date',

            'tanggal_kembali'   => 'required|date|after_or_equal:tanggal_keluar',

            'km_awal'           => 'required|integer|min:0',

            'pengguna'          => 'required|in:Owner,Karyawan',

            'keperluan'         => 'required|string|max:255',

            'catatan'           => 'nullable|string',

        ]);

        PemakaianPribadi::create([

            'mobil_id'          => $request->mobil_id,

            'tanggal_keluar'    => $request->tanggal_keluar,

            'tanggal_kembali'   => $request->tanggal_kembali,

            'km_awal'           => $request->km_awal,

            'km_akhir'          => null,

            'total_km'          => 0,

            'pengguna'          => $request->pengguna,

            'keperluan'         => $request->keperluan,

            'catatan'           => $request->catatan,

        ]);

        Mobil::where('id', $request->mobil_id)
            ->update([
                'status' => 'Dipakai'
            ]);

        return redirect()
            ->route('pemakaian-pribadi.index')
            ->with('success', 'Pemakaian pribadi berhasil ditambahkan.');
    }

    public function edit(PemakaianPribadi $pemakaianPribadi)
    {
        $mobils = Mobil::orderBy('merk')->get();

        return view(
            'pemakaian-pribadi.edit',
            compact(
                'pemakaianPribadi',
                'mobils'
            )
        );
    }

    public function update(Request $request, PemakaianPribadi $pemakaianPribadi)
    {
        $request->validate([

            'tanggal_kembali' => 'required|date',

            'km_akhir'        => 'required|integer|min:0',

            'catatan'         => 'nullable|string',

        ]);

        $totalKm = $request->km_akhir - $pemakaianPribadi->km_awal;

        if ($totalKm < 0) {
            $totalKm = 0;
        }

        $pemakaianPribadi->update([

            'tanggal_kembali' => $request->tanggal_kembali,

            'km_akhir'        => $request->km_akhir,

            'total_km'        => $totalKm,

            'catatan'         => $request->catatan,

        ]);

        $mobil = $pemakaianPribadi->mobil;

        $mobil->update([

            'kilometer' => $request->km_akhir,

            'status'    => 'Ready',

        ]);

        return redirect()
            ->route('pemakaian-pribadi.index')
            ->with('success', 'Pemakaian pribadi berhasil diselesaikan.');
    }

    public function destroy(PemakaianPribadi $pemakaianPribadi)
    {
        if ($pemakaianPribadi->mobil) {

            $pemakaianPribadi->mobil->update([
                'status' => 'Ready'
            ]);

        }

        $pemakaianPribadi->delete();

        return back()->with(
            'success',
            'Data berhasil dihapus.'
        );
    }
}