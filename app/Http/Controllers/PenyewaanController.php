<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\Pelanggan;
use App\Models\Penyewaan;
use App\Models\Tarif;
use Illuminate\Http\Request;

class PenyewaanController extends Controller
{
    public function index()
    {
        $penyewaans = Penyewaan::with(['pelanggan', 'mobil'])
            ->latest()
            ->paginate(10);

        return view('penyewaan.index', compact('penyewaans'));
    }

    public function create()
    {
        $pelanggans = Pelanggan::orderBy('nama')->get();

        $mobils = Mobil::where('status', 'Ready')
            ->orderBy('merk')
            ->get();

        $tarif = Tarif::first();

        return view('penyewaan.create', compact(
            'pelanggans',
            'mobils',
            'tarif'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pelanggan_id' => 'required|exists:pelanggans,id',
            'mobil_id' => 'required|exists:mobils,id',

            'tanggal_pinjam' => 'required',
            'tanggal_kembali_rencana' => 'required',

            'paket' => 'required',
            'jenis_perjalanan' => 'required',

            'estimasi_km' => 'required|numeric',

            'harga_sewa' => 'required|numeric',
            'biaya_luar_kota' => 'required|numeric',
            'total_bayar' => 'required|numeric',

            'catatan' => 'nullable'
        ]);

        $data = $request->all();

        $data['kode_sewa'] = 'SW-' . date('YmdHis');

        $data['status'] = 'Berjalan';

        Penyewaan::create($data);

        Mobil::where('id', $request->mobil_id)
            ->update([
                'status' => 'Dipakai'
            ]);

        return redirect()
            ->route('penyewaan.index')
            ->with('success', 'Transaksi penyewaan berhasil dibuat.');
    }

    public function edit(Penyewaan $penyewaan)
    {
        $pelanggans = Pelanggan::orderBy('nama')->get();

        $mobils = Mobil::orderBy('merk')->get();

        $tarif = Tarif::first();

        return view('penyewaan.edit', compact(
            'penyewaan',
            'pelanggans',
            'mobils',
            'tarif'
        ));
    }

    public function update(Request $request, Penyewaan $penyewaan)
    {
        $request->validate([
            'pelanggan_id' => 'required',
            'mobil_id' => 'required',

            'tanggal_pinjam' => 'required',
            'tanggal_kembali_rencana' => 'required',

            'paket' => 'required',

            'jenis_perjalanan' => 'required',

            'estimasi_km' => 'required',

            'harga_sewa' => 'required',

            'biaya_luar_kota' => 'required',

            'overtime' => 'required',

            'denda' => 'required',

            'total_bayar' => 'required',

            'status' => 'required',

            'catatan' => 'nullable'
        ]);

        $penyewaan->update($request->all());

        return redirect()
            ->route('penyewaan.index')
            ->with('success', 'Data penyewaan berhasil diperbarui.');
    }

    public function destroy(Penyewaan $penyewaan)
    {
        if ($penyewaan->mobil) {

            $penyewaan->mobil->update([
                'status' => 'Ready'
            ]);

        }

        $penyewaan->delete();

        return back()->with(
            'success',
            'Data penyewaan berhasil dihapus.'
        );
    }
}