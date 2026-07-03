@extends('layouts.app')

@section('title','Detail Mobil')

@section('content')

<div class="flex justify-between items-center mb-8">

    <div>

        <h1 class="text-3xl font-bold text-slate-800 dark:text-white">

            Detail Mobil

        </h1>

        <p class="mt-2 text-slate-500 dark:text-slate-400">

            Informasi lengkap dan riwayat kendaraan.

        </p>

    </div>

    <a
        href="{{ route('mobil.index') }}"
        class="bg-slate-600 hover:bg-slate-700 text-white px-5 py-3 rounded-xl">

        Kembali

    </a>

</div>

<div class="bg-white dark:bg-slate-800 rounded-2xl shadow-lg p-8">

    <div class="grid md:grid-cols-2 gap-8">

        <div>

            @if($mobil->foto)

                <img
                    src="{{ asset('storage/'.$mobil->foto) }}"
                    class="rounded-xl w-full">

            @else

                <div class="rounded-xl h-72 bg-slate-200 dark:bg-slate-700 flex items-center justify-center">

                    Tidak Ada Foto

                </div>

            @endif

        </div>

        <div class="space-y-3">

            <h2 class="text-2xl font-bold dark:text-white">

                {{ $mobil->merk }}
                {{ $mobil->tipe }}

            </h2>

            <table class="w-full">

                <tr>

                    <td class="py-2 font-semibold">Kode</td>

                    <td>{{ $mobil->kode_mobil }}</td>

                </tr>

                <tr>

                    <td class="py-2 font-semibold">Plat Nomor</td>

                    <td>{{ $mobil->plat_nomor }}</td>

                </tr>

                <tr>

                    <td class="py-2 font-semibold">Tahun</td>

                    <td>{{ $mobil->tahun }}</td>

                </tr>

                <tr>

                    <td class="py-2 font-semibold">Kilometer</td>

                    <td>{{ number_format($mobil->kilometer) }} KM</td>

                </tr>

                <tr>

                    <td class="py-2 font-semibold">Status</td>

                    <td>{{ $mobil->status }}</td>

                </tr>

                <tr>

                    <td class="py-2 font-semibold">Status Servis</td>

                    <td>

                        @if($mobil->status_servis=='Aman')

                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full">

                                Aman

                            </span>

                        @elseif($mobil->status_servis=='Segera Servis')

                            <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full">

                                Segera Servis

                            </span>

                        @else

                            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full">

                                Terlambat Servis

                            </span>

                        @endif

                    </td>

                </tr>

            </table>

        </div>

    </div>

</div>

{{-- RIWAYAT PENYEWAAN --}}

<div class="mt-8 bg-white dark:bg-slate-800 rounded-2xl shadow-lg p-8">

    <h2 class="text-xl font-bold mb-5 dark:text-white">

        Riwayat Penyewaan

    </h2>

    <div class="overflow-x-auto">

        <table class="w-full">

            <thead>

                <tr class="border-b">

                    <th class="text-left py-3">No Transaksi</th>

                    <th class="text-left">Pelanggan</th>

                    <th class="text-left">Tanggal</th>

                    <th class="text-left">Status</th>

                </tr>

            </thead>

            <tbody>

            @forelse($mobil->penyewaans as $item)

                <tr class="border-b">

                    <td class="py-3">

                        {{ $item->no_transaksi }}

                    </td>

                    <td>

                        {{ $item->pelanggan->nama }}

                    </td>

                    <td>

                        {{ $item->tanggal_pinjam }}

                    </td>

                    <td>

                        {{ $item->status }}

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="4" class="py-5 text-center">

                        Belum ada riwayat.

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

{{-- RIWAYAT PERAWATAN --}}

<div class="mt-8 bg-white dark:bg-slate-800 rounded-2xl shadow-lg p-8">

    <h2 class="text-xl font-bold mb-5 dark:text-white">

        Riwayat Perawatan

    </h2>

    <div class="overflow-x-auto">

        <table class="w-full">

            <thead>

                <tr class="border-b">

                    <th class="text-left py-3">Tanggal</th>

                    <th class="text-left">Jenis</th>

                    <th class="text-left">KM</th>

                    <th class="text-left">Biaya</th>

                </tr>

            </thead>

            <tbody>

            @forelse($mobil->perawatans as $item)

                <tr class="border-b">

                    <td class="py-3">

                        {{ $item->tanggal_perawatan }}

                    </td>

                    <td>

                        {{ $item->jenis_perawatan }}

                    </td>

                    <td>

                        {{ number_format($item->km_servis) }} KM

                    </td>

                    <td>

                        Rp {{ number_format($item->biaya,0,',','.') }}

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="4" class="text-center py-5">

                        Belum ada riwayat perawatan.

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

{{-- RIWAYAT GANTI OLI --}}

<div class="mt-8 bg-white dark:bg-slate-800 rounded-2xl shadow-lg p-8">

    <h2 class="text-xl font-bold mb-5 dark:text-white">

        Riwayat Ganti Oli

    </h2>

    <div class="overflow-x-auto">

        <table class="w-full">

            <thead>

                <tr class="border-b">

                    <th class="text-left py-3">Tanggal</th>

                    <th class="text-left">KM Saat Ganti</th>

                    <th class="text-left">KM Berikutnya</th>

                </tr>

            </thead>

            <tbody>

            @forelse($mobil->riwayatOlis as $item)

                <tr class="border-b">

                    <td class="py-3">

                        {{ $item->tanggal_ganti }}

                    </td>

                    <td>

                        {{ number_format($item->km_ganti) }}

                    </td>

                    <td>

                        {{ number_format($item->km_berikutnya) }}

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="3" class="text-center py-5">

                        Belum ada riwayat ganti oli.

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

{{-- RIWAYAT PEMAKAIAN PRIBADI --}}

<div class="mt-8 bg-white dark:bg-slate-800 rounded-2xl shadow-lg p-8">

    <h2 class="text-xl font-bold mb-5 dark:text-white">

        Riwayat Pemakaian Pribadi

    </h2>

    <div class="overflow-x-auto">

        <table class="w-full">

            <thead>

                <tr class="border-b">

                    <th class="text-left py-3">Pengguna</th>

                    <th class="text-left">Keperluan</th>

                    <th class="text-left">Tanggal Keluar</th>

                    <th class="text-left">Tanggal Kembali</th>

                </tr>

            </thead>

            <tbody>

            @forelse($mobil->pemakaianPribadis as $item)

                <tr class="border-b">

                    <td class="py-3">

                        {{ $item->pengguna }}

                    </td>

                    <td>

                        {{ $item->keperluan }}

                    </td>

                    <td>

                        {{ $item->tanggal_keluar }}

                    </td>

                    <td>

                        {{ $item->tanggal_kembali ?? '-' }}

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="4" class="text-center py-5">

                        Belum ada riwayat pemakaian.

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

{{-- RIWAYAT CEK KENDARAAN --}}

<div class="mt-8 mb-8 bg-white dark:bg-slate-800 rounded-2xl shadow-lg p-8">

    <h2 class="text-xl font-bold mb-5 dark:text-white">

        Riwayat Cek Kendaraan

    </h2>

    <div class="overflow-x-auto">

        <table class="w-full">

            <thead>

                <tr class="border-b">

                    <th class="text-left py-3">Tanggal</th>

                    <th class="text-left">Jenis Cek</th>

                    <th class="text-left">Catatan</th>

                </tr>

            </thead>

            <tbody>

            @forelse($mobil->cekKendaraans as $item)

                <tr class="border-b">

                    <td class="py-3">

                        {{ $item->tanggal }}

                    </td>

                    <td>

                        {{ $item->jenis_cek }}

                    </td>

                    <td>

                        {{ $item->catatan ?: '-' }}

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="3" class="text-center py-5">

                        Belum ada riwayat pemeriksaan.

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection