@extends('layouts.app')

@section('title','Perawatan Kendaraan')

@section('content')

<div class="flex justify-between items-center mb-8">

    <div>

        <h1 class="text-3xl font-bold text-slate-800 dark:text-white">
            Perawatan Kendaraan
        </h1>

        <p class="mt-2 text-slate-500 dark:text-slate-400">
            Riwayat seluruh perawatan kendaraan.
        </p>

    </div>

    <a href="{{ route('perawatan.create') }}"
        class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-xl shadow">

        + Tambah Perawatan

    </a>

</div>

@if(session('success'))

<div class="mb-6 bg-green-100 border border-green-300 text-green-700 px-5 py-4 rounded-xl">

    {{ session('success') }}

</div>

@endif

<div class="bg-white dark:bg-slate-800 rounded-2xl shadow-lg overflow-hidden">

    <table class="w-full">

        <thead class="bg-slate-100 dark:bg-slate-700">

            <tr>

                <th class="p-4 text-left">Mobil</th>

                <th class="p-4 text-left">Tanggal</th>

                <th class="p-4 text-left">Jenis</th>

                <th class="p-4 text-left">Sparepart / Oli</th>

                <th class="p-4 text-left">KM Servis</th>

                <th class="p-4 text-left">Servis Berikutnya</th>

                <th class="p-4 text-left">Biaya</th>

                <th class="p-4 text-left">Bengkel</th>

                <th class="p-4 text-center">Aksi</th>

            </tr>

        </thead>

        <tbody>

        @forelse($perawatans as $item)

            <tr class="border-t border-slate-200 dark:border-slate-700 hover:bg-slate-50 dark:hover:bg-slate-700">

                <td class="p-4 dark:text-white">

                    {{ $item->mobil->merk }}
                    {{ $item->mobil->tipe }}

                </td>

                <td class="p-4 dark:text-white">

                    {{ $item->tanggal_perawatan->format('d-m-Y') }}

                </td>

                <td class="p-4 dark:text-white">

                    {{ $item->jenis_perawatan }}

                </td>

                <td class="p-4 dark:text-white">

                    {{ $item->nama_sparepart }}

                </td>

                <td class="p-4 dark:text-white">

                    {{ number_format($item->km_servis) }} KM

                </td>

                <td class="p-4 dark:text-white">

                    {{ number_format($item->km_servis_berikutnya) }} KM

                </td>

                <td class="p-4 dark:text-white">

                    Rp {{ number_format($item->biaya,0,',','.') }}

                </td>

                <td class="p-4 dark:text-white">

                    {{ $item->bengkel }}

                </td>

                <td class="p-4">

                    <div class="flex justify-center gap-2">

                        <a href="{{ route('perawatan.edit',$item) }}"
                            class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg">

                            Edit

                        </a>

                        <form action="{{ route('perawatan.destroy',$item) }}"
                            method="POST">

                            @csrf
                            @method('DELETE')

                            <button
                                onclick="return confirm('Yakin ingin menghapus data ini?')"
                                class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg">

                                Hapus

                            </button>

                        </form>

                    </div>

                </td>

            </tr>

        @empty

            <tr>

                <td colspan="9"
                    class="text-center py-10 text-slate-500">

                    Belum ada data perawatan kendaraan.

                </td>

            </tr>

        @endforelse

        </tbody>

    </table>

    @if($perawatans->count())

    <div class="p-6">

        {{ $perawatans->links() }}

    </div>

    @endif

</div>

@endsection