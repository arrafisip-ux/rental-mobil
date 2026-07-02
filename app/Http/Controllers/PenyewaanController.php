<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\Pelanggan;
use App\Models\Penyewaan;
use Illuminate\Http\Request;
use Carbon\Carbon;

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

    $mobils = Mobil::with('tarif')
        ->where('status', 'Ready')
        ->orderBy('merk')
        ->get();

    return view('penyewaan.create', compact(
        'pelanggans',
        'mobils'
    ));
}

    public function store(Request $request)
    {
        $request->validate([

            'pelanggan_id' => 'required|exists:pelanggans,id',

            'mobil_id' => 'required|exists:mobils,id',

            'tanggal_pinjam' => 'required|date',

            'tanggal_kembali_rencana' => 'required|date',

            'paket' => 'required',

            'tujuan' => 'required',

            'jenis_perjalanan' => 'required',

            'estimasi_km' => 'required|numeric',

            'km_awal' => 'required|numeric',

            'lama_sewa' => 'required|numeric',

            'harga_sewa' => 'required|numeric',

            'biaya_luar_kota' => 'required|numeric',

            'overtime' => 'nullable|numeric',

            'denda' => 'nullable|numeric',

            'total_bayar' => 'required|numeric',

            'status_pembayaran' => 'required',

            'catatan' => 'nullable',

        ]);

        // Validasi Dokumen
        if (
            !$request->boolean('cek_ktp') ||
            !$request->boolean('cek_sim') ||
            (
                !$request->boolean('cek_id_karyawan') &&
                !$request->boolean('cek_slip_gaji') &&
                !$request->boolean('cek_tempat_usaha')
            )
        ) {

            return back()
                ->withInput()
                ->withErrors([
                    'dokumen' => 'Minimal KTP + SIM + salah satu (ID Karyawan / Slip Gaji / Tempat Usaha) wajib dicentang.'
                ]);

        }

        $data = [

            'no_transaksi' => 'TRX-' . now()->format('YmdHis'),

            'pelanggan_id' => $request->pelanggan_id,

            'mobil_id' => $request->mobil_id,

            'tanggal_pinjam' => $request->tanggal_pinjam,

            'tanggal_kembali_rencana' => $request->tanggal_kembali_rencana,

            'paket' => $request->paket,

            'tujuan' => $request->tujuan,

            'jenis_perjalanan' => $request->jenis_perjalanan,

            'estimasi_km' => $request->estimasi_km,

            'km_awal' => $request->km_awal,

            'lama_sewa' => $request->lama_sewa,

            'harga_sewa' => $request->harga_sewa,

            'biaya_luar_kota' => $request->biaya_luar_kota,

            'jam_overtime' => 0,

            'overtime' => 0,

            'denda' => 0,

            'total_bayar' => $request->total_bayar,

            'status_pembayaran' => $request->status_pembayaran,

            'cek_ktp' => $request->boolean('cek_ktp'),

            'cek_sim' => $request->boolean('cek_sim'),

            'cek_id_karyawan' => $request->boolean('cek_id_karyawan'),

            'cek_slip_gaji' => $request->boolean('cek_slip_gaji'),

            'cek_tempat_usaha' => $request->boolean('cek_tempat_usaha'),

            'status' => 'Berjalan',

            'catatan' => $request->catatan,

        ];

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

        $mobils = Mobil::with('tarif')
    ->orderBy('merk')
    ->get();

        return view(
            'penyewaan.edit',
            compact(
                'penyewaan',
                'pelanggans',
                'mobils'
            )
        );
    }

    public function update(Request $request, Penyewaan $penyewaan)
    {
        $request->validate([

            'pelanggan_id' => 'required',

            'mobil_id' => 'required',

            'tanggal_pinjam' => 'required',

            'tanggal_kembali_rencana' => 'required',

            'paket' => 'required',

            'tujuan' => 'required',

            'jenis_perjalanan' => 'required',

            'estimasi_km' => 'required',

            'km_awal' => 'required',

            'lama_sewa' => 'required',

            'harga_sewa' => 'required',

            'biaya_luar_kota' => 'required',

            'overtime' => 'required',

            'denda' => 'required',

            'total_bayar' => 'required',

            'status_pembayaran' => 'required',

            'status' => 'required',

            'catatan' => 'nullable',

        ]);

        $penyewaan->update($request->except('no_transaksi'));

        return redirect()
            ->route('penyewaan.index')
            ->with('success', 'Data penyewaan berhasil diperbarui.');
    }
    public function pengembalian(Penyewaan $penyewaan)
{
    $penyewaan->load(['pelanggan', 'mobil.tarif']);

    return view(
        'pengembalian.create',
        compact('penyewaan')
    );
}
public function selesai(Request $request, Penyewaan $penyewaan)
{
    $request->validate([
        'km_akhir' => 'required|numeric|gte:km_awal',
        'tanggal_kembali' => 'required|date',
        'jam_overtime' => 'nullable|numeric',
        'denda' => 'nullable|numeric',
        'total_bayar' => 'required|numeric',
        'kondisi_kembali' => 'nullable'
    ]);

    $totalKm = $request->km_akhir - $penyewaan->km_awal;

    $penyewaan->update([

        'tanggal_kembali' => $request->tanggal_kembali,

        'km_akhir' => $request->km_akhir,

        'total_km' => $totalKm,

        'jam_overtime' => $request->jam_overtime,

        'overtime' => $request->overtime,

        'denda' => $request->denda,

        'total_bayar' => $request->total_bayar,

        'kondisi_kembali' => $request->kondisi_kembali,

        'status' => 'Selesai',

        'status_pembayaran' => 'Lunas'

    ]);

    $mobil = $penyewaan->mobil;

    $mobil->update([

        'kilometer' => $request->km_akhir,

        'status' => 'Ready'

    ]);

    return redirect()
        ->route('penyewaan.index')
        ->with(
            'success',
            'Pengembalian kendaraan berhasil diproses.'
        );
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