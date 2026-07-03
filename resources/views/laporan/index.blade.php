@extends('layouts.app')

@section('title','Laporan Penyewaan')

@section('content')

<div class="flex justify-between items-center mb-8">

    <div>

        <h1 class="text-3xl font-bold text-slate-800 dark:text-white">
            Laporan Penyewaan
        </h1>

        <p class="mt-2 text-slate-500 dark:text-slate-400">
            Laporan transaksi penyewaan kendaraan.
        </p>

    </div>

</div>

<div class="bg-white dark:bg-slate-800 rounded-2xl shadow-lg p-6 mb-8">

    <form method="GET">

        <div class="grid md:grid-cols-4 gap-4">

            <div>

                <label class="block mb-2 font-semibold dark:text-white">
                    Tanggal Awal
                </label>

                <input
                    type="date"
                    name="tanggal_awal"
                    value="{{ request('tanggal_awal') }}"
                    class="w-full rounded-xl">

            </div>

            <div>

                <label class="block mb-2 font-semibold dark:text-white">
                    Tanggal Akhir
                </label>

                <input
                    type="date"
                    name="tanggal_akhir"
                    value="{{ request('tanggal_akhir') }}"
                    class="w-full rounded-xl">

            </div>

            <div>

                <label class="block mb-2 font-semibold dark:text-white">
                    Mobil
                </label>

                <select
                    name="mobil_id"
                    class="w-full rounded-xl">

                    <option value="">
                        Semua Mobil
                    </option>

                    @foreach($mobils as $mobil)

                        <option
                            value="{{ $mobil->id }}"
                            @selected(request('mobil_id')==$mobil->id)>

                            {{ $mobil->merk }}
                            {{ $mobil->tipe }}

                        </option>

                    @endforeach

                </select>

            </div>

            <div>

                <label class="block mb-2 font-semibold dark:text-white">
                    Status
                </label>

                <select
                    name="status"
                    class="w-full rounded-xl">

                    <option value="">
                        Semua
                    </option>

                    <option
                        value="Booking"
                        @selected(request('status')=='Booking')>

                        Booking

                    </option>

                    <option
                        value="Berjalan"
                        @selected(request('status')=='Berjalan')>

                        Berjalan

                    </option>

                    <option
                        value="Selesai"
                        @selected(request('status')=='Selesai')>

                        Selesai

                    </option>

                </select>

            </div>

        </div>

        <div class="mt-6 flex gap-3">

            <button
                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl">

                Filter

            </button>

            <a
                href="{{ route('laporan.index') }}"
                class="bg-slate-500 hover:bg-slate-600 text-white px-6 py-3 rounded-xl">

                Reset

            </a>

        </div>

    </form>

</div>

<div class="bg-green-50 dark:bg-green-900 rounded-2xl p-6 mb-8">

    <h2 class="text-lg font-semibold">

        Total Pendapatan

    </h2>

    <h1 class="text-4xl font-bold text-green-700 mt-2">

        Rp {{ number_format($totalPendapatan,0,',','.') }}

    </h1>

</div>

<div class="bg-white dark:bg-slate-800 rounded-2xl shadow-lg overflow-hidden">

    <table class="w-full">

        <thead class="bg-slate-100 dark:bg-slate-700">

            <tr>

                <th class="p-4 text-left">No Transaksi</th>

                <th class="p-4 text-left">Pelanggan</th>

                <th class="p-4 text-left">Mobil</th>

                <th class="p-4 text-left">Tanggal</th>

                <th class="p-4 text-left">Status</th>

                <th class="p-4 text-right">Total</th>

            </tr>

        </thead>

        <tbody>

        @forelse($laporans as $item)

            <tr class="border-t">

                <td class="p-4">

                    {{ $item->no_transaksi }}

                </td>

                <td class="p-4">

                    {{ $item->pelanggan->nama }}

                </td>

                <td class="p-4">

                    {{ $item->mobil->merk }}
                    {{ $item->mobil->tipe }}

                </td>

                <td class="p-4">

                    {{ $item->tanggal_pinjam }}

                </td>

                <td class="p-4">

                    {{ $item->status }}

                </td>

                <td class="p-4 text-right">

                    Rp {{ number_format($item->total_bayar,0,',','.') }}

                </td>

            </tr>

        @empty

            <tr>

                <td colspan="6" class="text-center py-10 text-slate-500">

                    Tidak ada data.

                </td>

            </tr>

        @endforelse

        </tbody>

    </table>

    @if($laporans->count())

    <div class="p-6">

        {{ $laporans->links() }}

    </div>

    @endif

</div>

@endsection