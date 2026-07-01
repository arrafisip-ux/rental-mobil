@extends('layouts.app')

@section('title','Riwayat Ganti Oli')

@section('content')

<div class="flex justify-between items-center mb-8">

    <div>

        <h1 class="text-3xl font-bold text-slate-800 dark:text-white">
            Riwayat Ganti Oli
        </h1>

        <p class="mt-2 text-slate-600 dark:text-slate-400">
            Daftar riwayat penggantian oli kendaraan.
        </p>

    </div>

    <a href="{{ route('riwayat-oli.create') }}"
        class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-xl shadow transition">

        + Tambah Riwayat

    </a>

</div>

@if(session('success'))

<div class="mb-6 bg-green-100 border border-green-300 text-green-700 px-5 py-4 rounded-xl">

    {{ session('success') }}

</div>

@endif

<div class="bg-white dark:bg-slate-800 rounded-2xl shadow-lg overflow-hidden">

    <table class="w-full">

        <thead class="bg-slate-200 dark:bg-slate-700">

            <tr>

                <th class="p-4 text-left font-semibold text-slate-800 dark:text-white">
                    Mobil
                </th>

                <th class="p-4 text-left font-semibold text-slate-800 dark:text-white">
                    Tanggal Ganti
                </th>

                <th class="p-4 text-left font-semibold text-slate-800 dark:text-white">
                    KM Ganti
                </th>

                <th class="p-4 text-left font-semibold text-slate-800 dark:text-white">
                    KM Berikutnya
                </th>

                <th class="p-4 text-left font-semibold text-slate-800 dark:text-white">
                    Keterangan
                </th>

                <th class="p-4 text-left font-semibold text-slate-800 dark:text-white">
                    Status Oli
                </th>

                <th class="p-4 text-center font-semibold text-slate-800 dark:text-white">
                    Aksi
                </th>

            </tr>

        </thead>

        <tbody>

        @forelse($riwayatOlis as $item)

            @php

                $mobilKm = $item->mobil->kilometer;

                $sisaKm = $item->km_berikutnya - $mobilKm;

            @endphp

            <tr class="border-t border-slate-200 dark:border-slate-700 hover:bg-slate-100 dark:hover:bg-slate-700 transition">

                <td class="p-4 text-slate-700 dark:text-slate-200">

                    <div class="font-semibold">

                        {{ $item->mobil->merk }}

                    </div>

                    <div class="text-sm text-slate-500 dark:text-slate-400">

                        {{ $item->mobil->tipe }}

                    </div>

                </td>

                <td class="p-4 text-slate-700 dark:text-slate-200">

                    {{ \Carbon\Carbon::parse($item->tanggal_ganti)->format('d-m-Y') }}

                </td>

                <td class="p-4 text-slate-700 dark:text-slate-200">

                    {{ number_format($item->km_ganti) }} KM

                </td>

                <td class="p-4 text-slate-700 dark:text-slate-200">

                    {{ number_format($item->km_berikutnya) }} KM

                </td>

                <td class="p-4 text-slate-700 dark:text-slate-200">

                    {{ $item->keterangan ?? '-' }}

                </td>

                <td class="p-4">

                    @if($mobilKm >= $item->km_berikutnya)

                        <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm font-semibold">

                            🔴 Harus Ganti Oli

                        </span>

                    @elseif($sisaKm <= 500)

                        <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm font-semibold">

                            🟡 Segera Ganti Oli

                        </span>

                    @else

                        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">

                            🟢 Aman

                        </span>

                    @endif

                </td>

                <td class="p-4">

                    <div class="flex justify-center gap-2">

                        <a href="{{ route('riwayat-oli.edit',$item) }}"
                            class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg transition">

                            Edit

                        </a>

                        <form action="{{ route('riwayat-oli.destroy',$item) }}"
                            method="POST">

                            @csrf
                            @method('DELETE')

                            <button
                                onclick="return confirm('Yakin ingin menghapus riwayat ini?')"
                                class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg transition">

                                Hapus

                            </button>

                        </form>

                    </div>

                </td>

            </tr>

        @empty

            <tr>

                <td colspan="7"
                    class="text-center py-10 text-slate-500 dark:text-slate-400">

                    Belum ada data riwayat ganti oli.

                </td>

            </tr>

        @endforelse

        </tbody>

    </table>

    @if($riwayatOlis->count())

    <div class="p-5 border-t border-slate-200 dark:border-slate-700">

        {{ $riwayatOlis->links() }}

    </div>

    @endif

</div>

@endsection