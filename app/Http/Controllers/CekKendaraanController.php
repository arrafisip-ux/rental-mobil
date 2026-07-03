<?php

namespace App\Http\Controllers;

use App\Models\CekKendaraan;
use App\Models\Mobil;
use Illuminate\Http\Request;

class CekKendaraanController extends Controller
{
    public function index()
    {
        $cekKendaraans = CekKendaraan::with('mobil')
            ->latest()
            ->paginate(10);

        return view('cek-kendaraan.index', compact('cekKendaraans'));
    }

    public function create()
    {
        $mobils = Mobil::orderBy('merk')
            ->orderBy('tipe')
            ->get();

        return view('cek-kendaraan.create', compact('mobils'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'mobil_id' => 'required|exists:mobils,id',
            'tanggal' => 'required|date',
            'jenis_cek' => 'required|in:Sebelum Digunakan,Sesudah Digunakan',
            'catatan' => 'nullable|string',
        ]);

        CekKendaraan::create([

            'mobil_id' => $request->mobil_id,

            'tanggal' => $request->tanggal,

            'jenis_cek' => $request->jenis_cek,

            'cek_body' => $request->boolean('cek_body'),

            'cek_ban' => $request->boolean('cek_ban'),

            'cek_lampu' => $request->boolean('cek_lampu'),

            'cek_rem' => $request->boolean('cek_rem'),

            'cek_oli' => $request->boolean('cek_oli'),

            'cek_air_radiator' => $request->boolean('cek_air_radiator'),

            'cek_bensin' => $request->boolean('cek_bensin'),

            'cek_interior' => $request->boolean('cek_interior'),

            'catatan' => $request->catatan,

        ]);

        return redirect()
            ->route('cek-kendaraan.index')
            ->with('success', 'Data cek kendaraan berhasil ditambahkan.');
    }

    public function edit(CekKendaraan $cekKendaraan)
    {
        $mobils = Mobil::orderBy('merk')
            ->orderBy('tipe')
            ->get();

        return view(
            'cek-kendaraan.edit',
            compact(
                'cekKendaraan',
                'mobils'
            )
        );
    }

    public function update(Request $request, CekKendaraan $cekKendaraan)
    {
        $request->validate([
            'mobil_id' => 'required|exists:mobils,id',
            'tanggal' => 'required|date',
            'jenis_cek' => 'required|in:Sebelum Digunakan,Sesudah Digunakan',
            'catatan' => 'nullable|string',
        ]);

        $cekKendaraan->update([

            'mobil_id' => $request->mobil_id,

            'tanggal' => $request->tanggal,

            'jenis_cek' => $request->jenis_cek,

            'cek_body' => $request->boolean('cek_body'),

            'cek_ban' => $request->boolean('cek_ban'),

            'cek_lampu' => $request->boolean('cek_lampu'),

            'cek_rem' => $request->boolean('cek_rem'),

            'cek_oli' => $request->boolean('cek_oli'),

            'cek_air_radiator' => $request->boolean('cek_air_radiator'),

            'cek_bensin' => $request->boolean('cek_bensin'),

            'cek_interior' => $request->boolean('cek_interior'),

            'catatan' => $request->catatan,

        ]);

        return redirect()
            ->route('cek-kendaraan.index')
            ->with('success', 'Data cek kendaraan berhasil diperbarui.');
    }

    public function destroy(CekKendaraan $cekKendaraan)
    {
        $cekKendaraan->delete();

        return back()->with(
            'success',
            'Data cek kendaraan berhasil dihapus.'
        );
    }
}