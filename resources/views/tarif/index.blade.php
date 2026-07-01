@extends('layouts.app')

@section('title','Data Tarif')

@section('content')

<div class="flex justify-between items-center mb-8">

    <div>
        <h1 class="text-3xl font-bold text-slate-800 dark:text-white">
            Data Tarif
        </h1>

        <p class="mt-2 text-slate-600 dark:text-slate-400">
            Daftar tarif rental mobil.
        </p>
    </div>

    <a href="{{ route('tarif.create') }}"
        class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-xl shadow transition">
        + Tambah Tarif
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
                    Harga / Hari
                </th>

                <th class="p-4 text-left font-semibold text-slate-800 dark:text-white">
                    KM Dalam Kota
                </th>

                <th class="p-4 text-left font-semibold text-slate-800 dark:text-white">
                    KM Luar Kota
                </th>

                <th class="p-4 text-left font-semibold text-slate-800 dark:text-white">
                    Denda / Hari
                </th>

                <th class="p-4 text-left font-semibold text-slate-800 dark:text-white">
                    Interval Oli
                </th>

                <th class="p-4 text-left font-semibold text-slate-800 dark:text-white">
                    Notifikasi
                </th>

                <th class="p-4 text-center font-semibold text-slate-800 dark:text-white">
                    Aksi
                </th>

            </tr>

        </thead>

        <tbody>

            @forelse($tarifs as $tarif)

            <tr class="border-t border-slate-200 dark:border-slate-700 hover:bg-slate-100 dark:hover:bg-slate-700 transition">

                <td class="p-4 text-slate-700 dark:text-slate-200">
                    Rp {{ number_format($tarif->harga_per_hari,0,',','.') }}
                </td>

                <td class="p-4 text-slate-700 dark:text-slate-200">
                    Rp {{ number_format($tarif->tarif_km_dalam_kota,0,',','.') }}
                </td>

                <td class="p-4 text-slate-700 dark:text-slate-200">
                    Rp {{ number_format($tarif->tarif_km_luar_kota,0,',','.') }}
                </td>

                <td class="p-4 text-slate-700 dark:text-slate-200">
                    Rp {{ number_format($tarif->denda_per_hari,0,',','.') }}
                </td>

                <td class="p-4 text-slate-700 dark:text-slate-200">
                    {{ number_format($tarif->interval_ganti_oli) }} KM
                </td>

                <td class="p-4 text-slate-700 dark:text-slate-200">
                    {{ number_format($tarif->notifikasi_ganti_oli) }} KM
                </td>

                <td class="p-4">

                    <div class="flex justify-center gap-2">

                        <a href="{{ route('tarif.edit',$tarif) }}"
                            class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg transition">
                            Edit
                        </a>

                        <form action="{{ route('tarif.destroy',$tarif) }}" method="POST">

                            @csrf
                            @method('DELETE')

                            <button
                                onclick="return confirm('Yakin ingin menghapus tarif?')"
                                class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg transition">

                                Hapus

                            </button>

                        </form>

                    </div>

                </td>

            </tr>

            @empty

            <tr>

                <td colspan="7" class="text-center py-10 text-slate-500 dark:text-slate-400">

                    Belum ada data tarif.

                </td>

            </tr>

            @endforelse

        </tbody>

    </table>

    @if($tarifs->count())

    <div class="p-5">

        {{ $tarifs->links() }}

    </div>

    @endif

</div>

@endsection