<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use Illuminate\Http\Request;

class MobilController extends Controller
{
    public function index()
    {
        $mobils = Mobil::latest()->paginate(10);

        return view('mobil.index', compact('mobils'));
    }

    public function create()
    {
        return view('mobil.create');
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'kode_mobil' => 'required|unique:mobils',
        'merk' => 'required',
        'tipe' => 'required',
        'tahun' => 'required',
        'warna' => 'required',
        'plat_nomor' => 'required|unique:mobils',
        'kapasitas' => 'required',
        'transmisi' => 'required',
        'bahan_bakar' => 'required',
        'kilometer' => 'required',
        'nomor_stnk' => 'required',
        'masa_berlaku_stnk' => 'required',
        'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
    ]);

    if ($request->hasFile('foto')) {
        $validated['foto'] = $request
            ->file('foto')
            ->store('mobil', 'public');
    }

    $validated['status'] = 'Ready';

    Mobil::create($validated);

    return redirect()
        ->route('mobil.index')
        ->with('success', 'Mobil berhasil ditambahkan.');
}

    public function show(Mobil $mobil)
    {
    }

    public function edit(Mobil $mobil)
    {
        return view('mobil.edit',compact('mobil'));
    }

    public function update(Request $request, Mobil $mobil)
{
    $mobil->update([
        'kode_mobil'=>$request->kode_mobil,
        'merk'=>$request->merk,
    ]);

    return redirect()
            ->route('mobil.index')
            ->with('success','Data mobil berhasil diubah.');
}

    public function destroy(Mobil $mobil)
{
    if ($mobil->foto && file_exists(public_path('storage/'.$mobil->foto))) {
        unlink(public_path('storage/'.$mobil->foto));
    }

    $mobil->delete();

    return redirect()
        ->route('mobil.index')
        ->with('success','Data mobil berhasil dihapus.');
}
}