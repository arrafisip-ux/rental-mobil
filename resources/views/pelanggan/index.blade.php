@extends('layouts.app')

@section('title', 'Data Pelanggan')

@section('content')

<div class="flex justify-between items-center mb-8">

    <div>
        <h1 class="text-3xl font-bold text-slate-800 dark:text-white">
            Data Pelanggan
        </h1>

        <p class="text-slate-500 mt-2">
            Daftar seluruh pelanggan rental mobil.
        </p>
    </div>

    <a href="{{ route('pelanggan.create') }}"
        class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-xl shadow">
        + Tambah Pelanggan
    </a>

</div>

@if(session('success'))
<div class="mb-6 p-4 rounded-xl bg-green-100 border border-green-300 text-green-700">
    {{ session('success') }}
</div>
@endif

<div class="bg-white rounded-2xl shadow overflow-hidden">

    <div class="overflow-x-auto">

        <table class="min-w-full">

            <thead class="bg-slate-100">

                <tr>

                    <th class="px-5 py-4 text-left">Kode</th>
                    <th class="px-5 py-4 text-left">Nama</th>
                    <th class="px-5 py-4 text-left">NIK</th>
                    <th class="px-5 py-4 text-left">No HP</th>
                    <th class="px-5 py-4 text-left">HP Darurat</th>
                    <th class="px-5 py-4 text-left">Nomor SIM</th>
                    <th class="px-5 py-4 text-left">Masa Berlaku</th>
                    <th class="px-5 py-4 text-left">Alamat</th>
                    <th class="px-5 py-4 text-center">Aksi</th>

                </tr>

            </thead>

            <tbody>

                @forelse($pelanggans as $pelanggan)

                <tr class="border-t hover:bg-slate-50">

                    <td class="px-5 py-4">
                        {{ $pelanggan->kode_pelanggan }}
                    </td>

                    <td class="px-5 py-4 font-semibold">
                        {{ $pelanggan->nama }}
                    </td>

                    <td class="px-5 py-4">
                        {{ $pelanggan->nik }}
                    </td>

                    <td class="px-5 py-4">
                        {{ $pelanggan->telepon }}
                    </td>

                    <td class="px-5 py-4">
                        {{ $pelanggan->telepon_darurat }}
                    </td>

                    <td class="px-5 py-4">
                        {{ $pelanggan->nomor_sim }}
                    </td>

                    <td class="px-5 py-4">
                        {{ \Carbon\Carbon::parse($pelanggan->masa_berlaku_sim)->format('d/m/Y') }}
                    </td>

                    <td class="px-5 py-4">
                        {{ $pelanggan->alamat }}
                    </td>

                    <td class="px-5 py-4">

                        <div class="flex justify-center gap-2">

                            <a href="{{ route('pelanggan.edit',$pelanggan) }}"
                                class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg">
                                Edit
                            </a>

                            <form action="{{ route('pelanggan.destroy',$pelanggan) }}"
                                method="POST">

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
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

                    <td colspan="9" class="text-center py-8 text-slate-500">

                        Belum ada data pelanggan.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    <div class="p-5 border-t">

        {{ $pelanggans->links() }}

    </div>

</div>

@endsection