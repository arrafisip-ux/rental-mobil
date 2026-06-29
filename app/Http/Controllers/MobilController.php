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
    $request->validate([
        'kode_mobil'=>'required|unique:mobils',
        'merk'=>'required',
        'tipe'=>'required',
        'tahun'=>'required',
        'warna'=>'required',
        'plat_nomor'=>'required|unique:mobils',
        'kapasitas'=>'required',
        'transmisi'=>'required',
        'bahan_bakar'=>'required',
        'kilometer'=>'required',
        'nomor_stnk'=>'required',
        'masa_berlaku_stnk'=>'required',
        'foto'=>'nullable|image|max:2048'
    ]);

    $foto = null;

    if($request->hasFile('foto')){
        $foto = $request->file('foto')->store('mobil','public');
    }

    Mobil::create([
        'kode_mobil'=>$request->kode_mobil,
        'merk'=>$request->merk,
        'tipe'=>$request->tipe,
        'tahun'=>$request->tahun,
        'warna'=>$request->warna,
        'plat_nomor'=>$request->plat_nomor,
        'kapasitas'=>$request->kapasitas,
        'transmisi'=>$request->transmisi,
        'bahan_bakar'=>$request->bahan_bakar,
        'kilometer'=>$request->kilometer,
        'nomor_stnk'=>$request->nomor_stnk,
        'masa_berlaku_stnk'=>$request->masa_berlaku_stnk,
        'foto'=>$foto,
        'status'=>'Ready'
    ]);

    return redirect()
            ->route('mobil.index')
            ->with('success','Mobil berhasil ditambahkan.');
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
        //
    }

    public function destroy(Mobil $mobil)
    {
        //
    }
}