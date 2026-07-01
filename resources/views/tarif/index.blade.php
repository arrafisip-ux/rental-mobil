@extends('layouts.app')

@section('title','Tarif')

@section('content')

<div class="flex justify-between items-center mb-8">

    <div>

        <h1 class="text-3xl font-bold text-white">

            Data Tarif

        </h1>

        <p class="text-slate-400 mt-2">

            Daftar tarif rental mobil.

        </p>

    </div>

    <a href="{{ route('tarif.create') }}"
       class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-xl shadow">

        + Tambah Tarif

    </a>

</div>

@if(session('success'))

<div class="mb-5 bg-green-500 text-white px-5 py-4 rounded-xl">

    {{ session('success') }}

</div>

@endif

<div class="bg-slate-800 rounded-2xl shadow-lg overflow-hidden">

<table class="w-full">

<thead class="bg-slate-700">

<tr>

<th class="p-4 text-white">Harga/Hari</th>
<th class="p-4 text-white">KM Dalam Kota</th>
<th class="p-4 text-white">KM Luar Kota</th>
<th class="p-4 text-white">Denda</th>
<th class="p-4 text-white">Interval Oli</th>
<th class="p-4 text-white">Notifikasi</th>
<th class="p-4 text-center text-white">Aksi</th>

</tr>

</thead>

<tbody>

@forelse($tarifs as $tarif)

<tr class="border-t border-slate-700 hover:bg-slate-700">

<td class="p-4 text-slate-200">
Rp {{ number_format($tarif->harga_per_hari,0,',','.') }}
</td>

<td class="p-4 text-slate-200">
Rp {{ number_format($tarif->tarif_km_dalam_kota,0,',','.') }}
</td>

<td class="p-4 text-slate-200">
Rp {{ number_format($tarif->tarif_km_luar_kota,0,',','.') }}
</td>

<td class="p-4 text-slate-200">
Rp {{ number_format($tarif->denda_per_hari,0,',','.') }}
</td>

<td class="p-4 text-slate-200">
{{ $tarif->interval_ganti_oli }} KM
</td>

<td class="p-4 text-slate-200">
{{ $tarif->notifikasi_ganti_oli }} KM
</td>

<td class="p-4">

<div class="flex justify-center gap-2">

<a href="{{ route('tarif.edit',$tarif) }}"
class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-2 rounded-lg">

Edit

</a>

<form method="POST"
action="{{ route('tarif.destroy',$tarif) }}">

@csrf
@method('DELETE')

<button
onclick="return confirm('Hapus tarif ini?')"
class="bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded-lg">

Hapus

</button>

</form>

</div>

</td>

</tr>

@empty

<tr>

<td colspan="7"
class="text-center py-10 text-slate-400">

Belum ada data tarif.

</td>

</tr>

@endforelse

</tbody>

</table>

@if($tarifs->count())

<div class="p-6">

{{ $tarifs->links() }}

</div>

@endif

</div>

@endsection