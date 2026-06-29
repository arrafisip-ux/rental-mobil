@extends('layouts.app')

@section('title','Penyewaan')

@section('content')

<div class="flex justify-between items-center mb-8">

    <div>

        <h1 class="text-3xl font-bold text-slate-800 dark:text-white">
            Data Penyewaan
        </h1>

        <p class="mt-2 text-slate-500 dark:text-slate-400">
            Daftar transaksi penyewaan mobil.
        </p>

    </div>

    <a href="{{ route('penyewaan.create') }}"
       class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-xl shadow">

        + Tambah Penyewaan

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

                <th class="p-4 text-left text-slate-700 dark:text-white">
                    Pelanggan
                </th>

                <th class="p-4 text-left text-slate-700 dark:text-white">
                    Mobil
                </th>

                <th class="p-4 text-left text-slate-700 dark:text-white">
                    Tanggal
                </th>

                <th class="p-4 text-left text-slate-700 dark:text-white">
                    Total
                </th>

                <th class="p-4 text-left text-slate-700 dark:text-white">
                    Status
                </th>

                <th class="p-4 text-center text-slate-700 dark:text-white">
                    Aksi
                </th>

            </tr>

        </thead>

        <tbody>

            @forelse($penyewaans as $item)

            <tr class="border-t border-slate-200 dark:border-slate-700 hover:bg-slate-50 dark:hover:bg-slate-700 transition">

                <td class="p-4 text-slate-700 dark:text-slate-200">

                    {{ $item->pelanggan->nama }}

                </td>

                <td class="p-4 text-slate-700 dark:text-slate-200">

                    {{ $item->mobil->merk }}
                    {{ $item->mobil->tipe }}

                </td>

                <td class="p-4 text-slate-700 dark:text-slate-200">

                    {{ $item->tanggal_sewa }}

                </td>

                <td class="p-4 text-slate-700 dark:text-slate-200">

                    Rp {{ number_format($item->total_bayar,0,',','.') }}

                </td>

                <td class="p-4">

                    @if($item->status=='Booking')

                        <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm font-semibold">
                            Booking
                        </span>

                    @elseif($item->status=='Berjalan')

                        <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm font-semibold">
                            Berjalan
                        </span>

                    @else

                        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">
                            Selesai
                        </span>

                    @endif

                </td>

                <td class="p-4 text-center">

                    <div class="flex justify-center gap-2">

                        <a href="{{ route('penyewaan.edit',$item) }}"
                           class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg">

                            Edit

                        </a>

                        <form action="{{ route('penyewaan.destroy',$item) }}"
                              method="POST">

                            @csrf
                            @method('DELETE')

                            <button
                                onclick="return confirm('Hapus transaksi ini?')"
                                class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg">

                                Hapus

                            </button>

                        </form>

                    </div>

                </td>

            </tr>

            @empty

            <tr>

                <td colspan="6"
                    class="text-center py-10 text-slate-500 dark:text-slate-400">

                    Belum ada transaksi.

                </td>

            </tr>

            @endforelse

        </tbody>

    </table>

    @if($penyewaans->count())

    <div class="p-6 border-t border-slate-200 dark:border-slate-700">

        {{ $penyewaans->links() }}

    </div>

    @endif

</div>

@endsection