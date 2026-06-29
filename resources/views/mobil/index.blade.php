@extends('layouts.app')

@section('content')

<div class="flex justify-between items-center mb-6">

<div>

<h2 class="text-3xl font-bold text-slate-800 dark:text-white">

Data Mobil

</h2>

<p class="text-slate-500 dark:text-slate-400">

Daftar seluruh kendaraan.

</p>

</div>

<a href="{{ route('mobil.create') }}"
class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-xl transition">

+ Tambah Mobil

</a>

</div>

<div class="bg-white dark:bg-slate-800 rounded-2xl shadow-lg overflow-hidden">

<table class="w-full">

<thead class="bg-slate-100 dark:bg-slate-700">

<tr>

<th class="p-4 text-left text-slate-700 dark:text-white">Kode</th>

<th class="p-4 text-left text-slate-700 dark:text-white">Merk</th>

<th class="p-4 text-left text-slate-700 dark:text-white">Tipe</th>

<th class="p-4 text-left text-slate-700 dark:text-white">Plat</th>

<th class="p-4 text-left text-slate-700 dark:text-white">Status</th>

<th class="p-4 text-center text-slate-700 dark:text-white">Aksi</th>

</tr>

</thead>

<tbody>

@forelse($mobils as $mobil)

<tr class="border-t border-slate-200 dark:border-slate-700">

<td class="p-4 text-slate-700 dark:text-slate-200">{{ $mobil->kode_mobil }}</td>

<td class="p-4 text-slate-700 dark:text-slate-200">{{ $mobil->merk }}</td>

<td class="p-4 text-slate-700 dark:text-slate-200">{{ $mobil->tipe }}</td>

<td class="p-4 text-slate-700 dark:text-slate-200">{{ $mobil->plat_nomor }}</td>

<td class="p-4 text-slate-700 dark:text-slate-200">{{ $mobil->status }}</td>

<td class="p-4 text-center">

<button class="text-blue-600 hover:text-blue-700 font-medium">

Edit

</button>

</td>

</tr>

@empty

<tr>

<td colspan="6"
class="p-6 text-center text-slate-500 dark:text-slate-400">

Belum ada data mobil.

</td>

</tr>

@endforelse

</tbody>

</table>

</div>

@endsection