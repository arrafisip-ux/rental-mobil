@extends('layouts.app')

@section('title','Pemakaian Pribadi')

@section('content')

<div class="flex justify-between items-center mb-8">

    <div>

        <h1 class="text-3xl font-bold text-slate-800 dark:text-white">

            Pemakaian Pribadi

        </h1>

        <p class="mt-2 text-slate-500 dark:text-slate-400">

            Riwayat penggunaan kendaraan untuk operasional perusahaan.

        </p>

    </div>

    <a
        href="{{ route('pemakaian-pribadi.create') }}"
        class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-xl shadow">

        + Tambah Pemakaian

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

                <th class="p-4 text-left">Pengguna</th>

                <th class="p-4 text-left">Keperluan</th>

                <th class="p-4 text-left">Tanggal Keluar</th>

                <th class="p-4 text-left">Tanggal Kembali</th>

                <th class="p-4 text-left">KM</th>

                <th class="p-4 text-center">Status</th>

                <th class="p-4 text-center">Aksi</th>

            </tr>

        </thead>

        <tbody>

        @forelse($pemakaians as $item)

            <tr class="border-t border-slate-200 dark:border-slate-700 hover:bg-slate-50 dark:hover:bg-slate-700 transition">

                <td class="p-4 text-slate-700 dark:text-slate-200">

                    {{ $item->mobil->merk }}
                    {{ $item->mobil->tipe }}

                </td>

                <td class="p-4 text-slate-700 dark:text-slate-200">

                    {{ $item->pengguna }}

                </td>

                <td class="p-4 text-slate-700 dark:text-slate-200">

                    {{ $item->keperluan }}

                </td>

                <td class="p-4 text-slate-700 dark:text-slate-200">

                    {{ \Carbon\Carbon::parse($item->tanggal_keluar)->format('d-m-Y H:i') }}

                </td>

                <td class="p-4 text-slate-700 dark:text-slate-200">

                    @if($item->tanggal_kembali)

                        {{ \Carbon\Carbon::parse($item->tanggal_kembali)->format('d-m-Y H:i') }}

                    @else

                        -

                    @endif

                </td>

                <td class="p-4 text-slate-700 dark:text-slate-200">

                    {{ number_format($item->km_awal) }}
                    -
                    {{ $item->km_akhir ? number_format($item->km_akhir) : '-' }}

                </td>

                <td class="p-4 text-center">

                    @if($item->km_akhir)

                        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">

                            Selesai

                        </span>

                    @else

                        <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm font-semibold">

                            Berjalan

                        </span>

                    @endif

                </td>

                <td class="p-4">

                    <div class="flex justify-center gap-2">

                        <a
                            href="{{ route('pemakaian-pribadi.edit',$item) }}"
                            class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-2 rounded-lg">

                            Edit

                        </a>

                        <form
                            action="{{ route('pemakaian-pribadi.destroy',$item) }}"
                            method="POST">

                            @csrf
                            @method('DELETE')

                            <button
                                onclick="return confirm('Yakin ingin menghapus data ini?')"
                                class="bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded-lg">

                                Hapus

                            </button>

                        </form>

                    </div>

                </td>

            </tr>

        @empty

            <tr>

                <td colspan="8" class="text-center py-10 text-slate-500 dark:text-slate-400">

                    Belum ada data pemakaian pribadi.

                </td>

            </tr>

        @endforelse

        </tbody>

    </table>

    @if($pemakaians->count())

    <div class="p-6">

        {{ $pemakaians->links() }}

    </div>

    @endif

</div>

@endsection