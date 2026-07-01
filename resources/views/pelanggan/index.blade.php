@extends('layouts.app')

@section('title','Data Pelanggan')

@section('content')

<div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mb-8">

    <div>

        <h1 class="text-3xl font-bold text-slate-800 dark:text-white">
            Data Pelanggan
        </h1>

        <p class="mt-2 text-slate-500 dark:text-slate-400">
            Daftar seluruh pelanggan rental mobil.
        </p>

    </div>

    <a href="{{ route('pelanggan.create') }}"
        class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-xl shadow transition">

        + Tambah Pelanggan

    </a>

</div>

@if(session('success'))

<div class="mb-6 rounded-xl border border-green-300 bg-green-100 px-5 py-4 text-green-700 dark:bg-green-900/40 dark:border-green-700 dark:text-green-300">

    {{ session('success') }}

</div>

@endif

<div class="bg-white dark:bg-slate-800 rounded-2xl shadow-lg overflow-hidden">

    <div class="overflow-x-auto">

        <table class="min-w-full whitespace-nowrap">

            <thead class="bg-slate-100 dark:bg-slate-700">

                <tr>

                    <th class="px-5 py-4 text-left font-semibold text-slate-700 dark:text-white">
                        Kode
                    </th>

                    <th class="px-5 py-4 text-left font-semibold text-slate-700 dark:text-white">
                        Nama
                    </th>

                    <th class="px-5 py-4 text-left font-semibold text-slate-700 dark:text-white">
                        NIK
                    </th>

                    <th class="px-5 py-4 text-left font-semibold text-slate-700 dark:text-white">
                        No HP
                    </th>

                    <th class="px-5 py-4 text-left font-semibold text-slate-700 dark:text-white">
                        Email
                    </th>

                    <th class="px-5 py-4 text-left font-semibold text-slate-700 dark:text-white">
                        Nomor SIM
                    </th>

                    <th class="px-5 py-4 text-center font-semibold text-slate-700 dark:text-white">
                        Aksi
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($pelanggans as $pelanggan)

                <tr class="border-t border-slate-200 dark:border-slate-700 hover:bg-slate-50 dark:hover:bg-slate-700 transition">

                    <td class="px-5 py-4 text-slate-700 dark:text-slate-200 font-medium">

                        {{ $pelanggan->kode_pelanggan }}

                    </td>

                    <td class="px-5 py-4">

                        <div class="font-semibold text-slate-800 dark:text-white">

                            {{ $pelanggan->nama }}

                        </div>

                        <div class="text-sm text-slate-500 dark:text-slate-400 mt-1">

                            {{ $pelanggan->alamat }}

                        </div>

                    </td>

                    <td class="px-5 py-4 text-slate-700 dark:text-slate-200">

                        {{ $pelanggan->nik }}

                    </td>

                    <td class="px-5 py-4 text-slate-700 dark:text-slate-200">

                        {{ $pelanggan->telepon }}

                    </td>

                    <td class="px-5 py-4 text-slate-700 dark:text-slate-200">

                        {{ $pelanggan->email ?: '-' }}

                    </td>

                    <td class="px-5 py-4 text-slate-700 dark:text-slate-200">

                        {{ $pelanggan->sim ?: '-' }}

                    </td>

                    <td class="px-5 py-4">

                        <div class="flex justify-center gap-2">

                            <a href="{{ route('pelanggan.edit',$pelanggan) }}"
                                class="px-4 py-2 rounded-lg bg-yellow-500 hover:bg-yellow-600 text-white transition">

                                Edit

                            </a>

                            <form action="{{ route('pelanggan.destroy',$pelanggan) }}"
                                method="POST">

                                @csrf
                                @method('DELETE')

                                <button
                                    onclick="return confirm('Yakin ingin menghapus pelanggan ini?')"
                                    class="px-4 py-2 rounded-lg bg-red-600 hover:bg-red-700 text-white transition">

                                    Hapus

                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="7"
                        class="py-12 text-center text-slate-500 dark:text-slate-400">

                        Belum ada data pelanggan.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    @if($pelanggans->count())

    <div class="border-t border-slate-200 dark:border-slate-700 px-6 py-5">

        {{ $pelanggans->links() }}

    </div>

    @endif

</div>

@endsection