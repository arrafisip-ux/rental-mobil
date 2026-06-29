<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
        $pelanggans = Pelanggan::latest()->paginate(10);

        return view('pelanggan.index', compact('pelanggans'));
    }

    public function create()
    {
        return view('pelanggan.create');
    }

    public function store(Request $request)
{
    $data = $request->validate([
        'kode_pelanggan'=>'required|unique:pelanggans',
        'nama'=>'required',
        'nik'=>'required|unique:pelanggans',
        'telepon'=>'required',
        'alamat'=>'required',
        'email'=>'nullable|email',
        'sim'=>'nullable'
    ]);

    Pelanggan::create($data);

    return redirect()->route('pelanggan.index')
            ->with('success','Pelanggan berhasil ditambahkan.');
}

    public function edit(Pelanggan $pelanggan)
    {
        return view('pelanggan.edit', compact('pelanggan'));
    }

    public function update(Request $request, Pelanggan $pelanggan)
{
    $data = $request->validate([
        'kode_pelanggan'=>'required|unique:pelanggans,kode_pelanggan,'.$pelanggan->id,
        'nama'=>'required',
        'nik'=>'required|unique:pelanggans,nik,'.$pelanggan->id,
        'telepon'=>'required',
        'alamat'=>'required',
        'email'=>'nullable|email',
        'sim'=>'nullable'
    ]);

    $pelanggan->update($data);

    return redirect()->route('pelanggan.index')
            ->with('success','Data berhasil diupdate.');
}

    public function destroy(Pelanggan $pelanggan)
{
    $pelanggan->delete();

    return back()->with('success','Data berhasil dihapus.');
}
}