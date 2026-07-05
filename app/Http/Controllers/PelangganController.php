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
        $data = $request->validate(
            [
                'kode_pelanggan'   => 'required|unique:pelanggans,kode_pelanggan',
                'nik'              => 'required|digits:16|unique:pelanggans,nik',
                'nama'             => 'required|string|max:100',
                'telepon'          => 'required|string|max:20',
                'telepon_darurat'  => 'required|string|max:20',
                'alamat'           => 'required|string',
                'nomor_sim'        => 'required|string|max:30|unique:pelanggans,nomor_sim',
                'masa_berlaku_sim' => 'required|date',
            ],
            [
                'required' => ':attribute wajib diisi.',
                'unique'   => ':attribute sudah digunakan.',
                'digits'   => ':attribute harus terdiri dari :digits digit.',
                'date'     => ':attribute harus berupa tanggal yang valid.',
                'max'      => ':attribute maksimal :max karakter.',
            ],
            [
                'kode_pelanggan'   => 'Kode Pelanggan',
                'nik'              => 'NIK',
                'nama'             => 'Nama',
                'telepon'          => 'Nomor HP',
                'telepon_darurat'  => 'Nomor HP Darurat',
                'alamat'           => 'Alamat',
                'nomor_sim'        => 'Nomor SIM',
                'masa_berlaku_sim' => 'Masa Berlaku SIM',
            ]
        );

        Pelanggan::create($data);

        return redirect()
            ->route('pelanggan.index')
            ->with('success', 'Data pelanggan berhasil ditambahkan.');
    }

    public function edit(Pelanggan $pelanggan)
    {
        return view('pelanggan.edit', compact('pelanggan'));
    }

    public function update(Request $request, Pelanggan $pelanggan)
    {
        $data = $request->validate(
            [
                'kode_pelanggan'   => 'required|unique:pelanggans,kode_pelanggan,' . $pelanggan->id,
                'nik'              => 'required|digits:16|unique:pelanggans,nik,' . $pelanggan->id,
                'nama'             => 'required|string|max:100',
                'telepon'          => 'required|string|max:20',
                'telepon_darurat'  => 'required|string|max:20',
                'alamat'           => 'required|string',
                'nomor_sim'        => 'required|string|max:30|unique:pelanggans,nomor_sim,' . $pelanggan->id,
                'masa_berlaku_sim' => 'required|date',
            ],
            [
                'required' => ':attribute wajib diisi.',
                'unique'   => ':attribute sudah digunakan.',
                'digits'   => ':attribute harus terdiri dari :digits digit.',
                'date'     => ':attribute harus berupa tanggal yang valid.',
                'max'      => ':attribute maksimal :max karakter.',
            ],
            [
                'kode_pelanggan'   => 'Kode Pelanggan',
                'nik'              => 'NIK',
                'nama'             => 'Nama',
                'telepon'          => 'Nomor HP',
                'telepon_darurat'  => 'Nomor HP Darurat',
                'alamat'           => 'Alamat',
                'nomor_sim'        => 'Nomor SIM',
                'masa_berlaku_sim' => 'Masa Berlaku SIM',
            ]
        );

        $pelanggan->update($data);

        return redirect()
            ->route('pelanggan.index')
            ->with('success', 'Data pelanggan berhasil diperbarui.');
    }

    public function destroy(Pelanggan $pelanggan)
    {
        $pelanggan->delete();

        return redirect()
            ->route('pelanggan.index')
            ->with('success', 'Data pelanggan berhasil dihapus.');
    }
}