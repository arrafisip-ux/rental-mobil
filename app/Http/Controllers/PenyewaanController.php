<?php

namespace App\Http\Controllers;

use App\Models\Penyewaan;
use App\Models\Mobil;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PenyewaanController extends Controller
{
    public function index()
    {
        $penyewaans = Penyewaan::with(['mobil','pelanggan'])
                        ->latest()
                        ->paginate(10);

        return view('penyewaan.index', compact('penyewaans'));
    }

    public function create()
    {
        $mobils = Mobil::where('status','Ready')->get();
        $pelanggans = Pelanggan::all();

        return view('penyewaan.create', compact('mobils','pelanggans'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'pelanggan_id'=>'required',
            'mobil_id'=>'required',
            'tanggal_sewa'=>'required|date',
            'tanggal_kembali'=>'required|date',
            'lama_sewa'=>'required|integer',
            'harga_per_hari'=>'required|numeric',
            'total_bayar'=>'required|numeric',
            'catatan'=>'nullable'
        ]);

        $data['status']='Booking';

        Penyewaan::create($data);

        Mobil::find($request->mobil_id)
            ->update([
                'status'=>'Dipakai'
            ]);

        return redirect()->route('penyewaan.index')
                ->with('success','Booking berhasil dibuat.');
    }

    public function edit(Penyewaan $penyewaan)
    {
        $mobils = Mobil::all();
        $pelanggans = Pelanggan::all();

        return view('penyewaan.edit',
            compact('penyewaan','mobils','pelanggans'));
    }

    public function update(Request $request, Penyewaan $penyewaan)
    {
        $data = $request->validate([
            'pelanggan_id'=>'required',
            'mobil_id'=>'required',
            'tanggal_sewa'=>'required',
            'tanggal_kembali'=>'required',
            'lama_sewa'=>'required',
            'harga_per_hari'=>'required',
            'total_bayar'=>'required',
            'status'=>'required',
            'catatan'=>'nullable'
        ]);

        $penyewaan->update($data);

        return redirect()->route('penyewaan.index')
                ->with('success','Data berhasil diupdate.');
    }

    public function destroy(Penyewaan $penyewaan)
    {
        $penyewaan->delete();

        return back()->with('success','Data berhasil dihapus.');
    }
}