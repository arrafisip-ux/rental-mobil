@extends('layouts.app')

@section('title','Cek Kendaraan')

@section('content')

<div class="flex justify-between items-center mb-8">

    <div>

        <h1 class="text-3xl font-bold text-slate-800 dark:text-white">

            Cek Kendaraan

        </h1>

        <p class="mt-2 text-slate-500 dark:text-slate-400">

            Riwayat pemeriksaan kondisi kendaraan sebelum dan sesudah digunakan.

        </p>

    </div>

    <a
        href="{{ route('cek-kendaraan.create') }}"
        class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-xl shadow">

        + Tambah Pemeriksaan

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

                <th class="p-4 text-left">Petugas</th>

                <th class="p-4 text-left">Kondisi</th>

                <th class="p-4 text-center">Aksi</th>

            </tr>

        </thead>

        <tbody>

        @forelse($cekKendaraans as $item)

            <tr class="border-t">

                <td class="p-4">

                    {{ $item->mobil->merk }}
                    {{ $item->mobil->tipe }}

                </td>

                <td class="p-4">

                    {{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y H:i') }}

                </td>

                <td class="p-4">

                    Administrator

                </td>

                <td class="p-4">

                    @if(
$item->cek_body &&
$item->cek_ban &&
$item->cek_lampu &&
$item->cek_rem &&
$item->cek_oli &&
$item->cek_air_radiator &&
$item->cek_bensin &&
$item->cek_interior
)

<span class="px-3 py-1 bg-green-100 text-green-700 rounded-full">
Baik
</span>

@else

<span class="px-3 py-1 bg-red-100 text-red-700 rounded-full">
Perlu Perbaikan
</span>

@endif

                </td>

                <td class="p-4">

                    <div class="flex justify-center gap-2">

                        <a
                            href="{{ route('cek-kendaraan.edit',$item) }}"
                            class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-2 rounded-lg">

                            Edit

                        </a>

                        <form
                            action="{{ route('cek-kendaraan.destroy',$item) }}"
                            method="POST">

                            @csrf
                            @method('DELETE')

                            <button
                                onclick="return confirm('Hapus data ini?')"
                                class="bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded-lg">

                                Hapus

                            </button>

                        </form>

                    </div>

                </td>

            </tr>

        @empty

            <tr>

                <td colspan="5" class="text-center py-10 text-slate-500">

                    Belum ada data pemeriksaan kendaraan.

                </td>

            </tr>

        @endforelse

        </tbody>

    </table>

    @if($cekKendaraans->count())

    <div class="p-6">

        {{ $cekKendaraans->links() }}

    </div>

    @endif

</div>

@endsection