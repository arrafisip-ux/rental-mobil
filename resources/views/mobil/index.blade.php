@extends('layouts.app')

@section('content')

<div class="flex justify-between items-center mb-6">

    <div>

        <h2 class="text-3xl font-bold">
            Data Mobil
        </h2>

        <p class="text-gray-500">
            Daftar seluruh kendaraan.
        </p>

    </div>

    <a href="#"
        class="bg-blue-600 text-white px-5 py-3 rounded-xl">

        + Tambah Mobil

    </a>

</div>

<div class="bg-white rounded-2xl shadow overflow-hidden">

<table class="w-full">

<thead class="bg-slate-100">

<tr>

<th class="p-4 text-left">Kode</th>

<th class="p-4 text-left">Merk</th>

<th class="p-4 text-left">Tipe</th>

<th class="p-4 text-left">Plat</th>

<th class="p-4 text-left">Status</th>

<th class="p-4 text-center">Aksi</th>

</tr>

</thead>

<tbody>

@forelse($mobils as $mobil)

<tr class="border-t">

<td class="p-4">{{ $mobil->kode_mobil }}</td>

<td class="p-4">{{ $mobil->merk }}</td>

<td class="p-4">{{ $mobil->tipe }}</td>

<td class="p-4">{{ $mobil->plat_nomor }}</td>

<td class="p-4">{{ $mobil->status }}</td>

<td class="p-4 text-center">

<button class="text-blue-600">
Edit
</button>

</td>

</tr>

@empty

<tr>

<td colspan="6" class="p-5 text-center text-gray-500">

Belum ada data mobil.

</td>

</tr>

@endforelse

</tbody>

</table>

</div>

@endsection