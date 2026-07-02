@extends('layouts.app')

@section('title','Data Tarif')

@section('content')

<div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mb-8">

    <div>

        <h1 class="text-3xl font-bold text-slate-800 dark:text-white">
            Data Tarif
        </h1>

        <p class="mt-2 text-slate-600 dark:text-slate-400">
            Kelola tarif setiap kendaraan rental.
        </p>

    </div>

    <a href="{{ route('tarif.create') }}"
        class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-xl shadow transition">

        + Tambah Tarif

    </a>

</div>

@if(session('success'))

<div class="mb-6 bg-green-100 dark:bg-green-900 border border-green-300 dark:border-green-700 text-green-700 dark:text-green-200 px-5 py-4 rounded-xl">

    {{ session('success') }}

</div>

@endif

<div class="bg-white dark:bg-slate-800 rounded-2xl shadow-lg overflow-x-auto">

    <table class="min-w-full">

        <thead class="bg-slate-100 dark:bg-slate-700">

            <tr>

                <th class="px-4 py-4 text-left text-slate-700 dark:text-white">
                    Mobil
                </th>

                <th class="px-4 py-4 text-center text-slate-700 dark:text-white">
                    6 Jam
                </th>

                <th class="px-4 py-4 text-center text-slate-700 dark:text-white">
                    12 Jam
                </th>

                <th class="px-4 py-4 text-center text-slate-700 dark:text-white">
                    24 Jam
                </th>

                <th class="px-4 py-4 text-center text-slate-700 dark:text-white">
                    Overtime
                </th>

                <th class="px-4 py-4 text-center text-slate-700 dark:text-white">
                    >100 KM
                </th>

                <th class="px-4 py-4 text-center text-slate-700 dark:text-white">
                    >200 KM
                </th>

                <th class="px-4 py-4 text-center text-slate-700 dark:text-white">
                    >350 KM
                </th>

                <th class="px-4 py-4 text-center text-slate-700 dark:text-white">
                    Denda
                </th>

                <th class="px-4 py-4 text-center text-slate-700 dark:text-white">
                    Interval Oli
                </th>

                <th class="px-4 py-4 text-center text-slate-700 dark:text-white">
                    Notifikasi
                </th>

                <th class="px-4 py-4 text-center text-slate-700 dark:text-white">
                    Aksi
                </th>

            </tr>

        </thead>

        <tbody>

            @forelse($tarifs as $tarif)

            <tr class="border-t border-slate-200 dark:border-slate-700 hover:bg-slate-50 dark:hover:bg-slate-700 transition">

                <td class="px-4 py-4">

                    <div class="font-semibold text-slate-800 dark:text-white">

                        {{ $tarif->mobil->merk }}

                    </div>

                    <div class="text-sm text-slate-500 dark:text-slate-400">

                        {{ $tarif->mobil->tipe }}

                    </div>

                    <div class="text-xs text-slate-400">

                        {{ $tarif->mobil->plat_nomor }}

                    </div>

                </td>

                <td class="px-4 py-4 text-center dark:text-white">
                    Rp {{ number_format($tarif->harga_6_jam,0,',','.') }}
                </td>

                <td class="px-4 py-4 text-center dark:text-white">
                    Rp {{ number_format($tarif->harga_12_jam,0,',','.') }}
                </td>

                <td class="px-4 py-4 text-center dark:text-white">
                    Rp {{ number_format($tarif->harga_24_jam,0,',','.') }}
                </td>

                <td class="px-4 py-4 text-center dark:text-white">
                    Rp {{ number_format($tarif->overtime_per_jam,0,',','.') }}
                </td>

                <td class="px-4 py-4 text-center dark:text-white">
                    Rp {{ number_format($tarif->tambahan_100km,0,',','.') }}
                </td>

                <td class="px-4 py-4 text-center dark:text-white">
                    Rp {{ number_format($tarif->tambahan_200km,0,',','.') }}
                </td>

                <td class="px-4 py-4 text-center dark:text-white">
                    Rp {{ number_format($tarif->tambahan_350km,0,',','.') }}
                </td>

                <td class="px-4 py-4 text-center dark:text-white">
                    Rp {{ number_format($tarif->denda_per_hari,0,',','.') }}
                </td>

                <td class="px-4 py-4 text-center dark:text-white">
                    {{ number_format($tarif->interval_ganti_oli) }} KM
                </td>

                <td class="px-4 py-4 text-center dark:text-white">
                    {{ number_format($tarif->notifikasi_ganti_oli) }} KM
                </td>

                <td class="px-4 py-4">

                    <div class="flex justify-center gap-2">

                        <a href="{{ route('tarif.edit',$tarif) }}"
                            class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg transition">

                            Edit

                        </a>

                        <form action="{{ route('tarif.destroy',$tarif) }}" method="POST">

                            @csrf
                            @method('DELETE')

                            <button
                                onclick="return confirm('Yakin ingin menghapus tarif ini?')"
                                class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg transition">

                                Hapus

                            </button>

                        </form>

                    </div>

                </td>

            </tr>

            @empty

            <tr>

                <td colspan="12" class="text-center py-10 text-slate-500 dark:text-slate-400">

                    Belum ada data tarif.

                </td>

            </tr>

            @endforelse

        </tbody>

    </table>

    @if($tarifs->count())

    <div class="border-t border-slate-200 dark:border-slate-700 p-5">

        {{ $tarifs->links() }}

    </div>

    @endif

</div>

@endsection