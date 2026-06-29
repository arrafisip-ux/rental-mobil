@extends('layouts.app')

@section('title', 'Data Mobil')

@section('content')

<div class="flex justify-between items-center mb-8">

    <div>

        <h1 class="text-3xl font-bold text-slate-800 dark:text-white">
            Data Mobil
        </h1>

        <p class="text-slate-500 dark:text-slate-400 mt-2">
            Daftar seluruh kendaraan yang tersedia.
        </p>

    </div>

    <a href="{{ route('mobil.create') }}"
       class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-xl shadow">

        + Tambah Mobil

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
Foto
</th>

<th class="p-4 text-left text-slate-700 dark:text-white">
Kode
</th>

<th class="p-4 text-left text-slate-700 dark:text-white">
Mobil
</th>

<th class="p-4 text-left text-slate-700 dark:text-white">
Plat
</th>

<th class="p-4 text-left text-slate-700 dark:text-white">
Kilometer
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

@forelse($mobils as $mobil)

<tr class="border-t border-slate-200 dark:border-slate-700 hover:bg-slate-50 dark:hover:bg-slate-700 transition">

<td class="p-4">

@if($mobil->foto)

<img src="{{ asset('storage/'.$mobil->foto) }}"
     class="w-24 h-16 rounded-lg object-cover shadow">

@else

<div class="w-24 h-16 rounded-lg bg-slate-200 dark:bg-slate-600 flex items-center justify-center text-sm text-slate-500 dark:text-slate-300">

Tidak ada foto

</div>

@endif

</td>

<td class="p-4 text-slate-700 dark:text-slate-200">

{{ $mobil->kode_mobil }}

</td>

<td class="p-4">

<div class="font-semibold text-slate-800 dark:text-white">

{{ $mobil->merk }}

</div>

<div class="text-sm text-slate-500 dark:text-slate-400">

{{ $mobil->tipe }}

</div>

</td>

<td class="p-4 text-slate-700 dark:text-slate-200">

{{ $mobil->plat_nomor }}

</td>

<td class="p-4 text-slate-700 dark:text-slate-200">

{{ number_format($mobil->kilometer) }} km

</td>

<td class="p-4">

@if($mobil->status == 'Ready')

<span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">

Ready

</span>

@elseif($mobil->status == 'Dipakai')

<span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm font-semibold">

Dipakai

</span>

@else

<span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm font-semibold">

Pengecekan

</span>

@endif

</td>

<td class="p-4 text-center">

<div class="flex justify-center gap-2">

<a href="{{ route('mobil.edit',$mobil->id) }}"
   class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg">

Edit

</a>

<form action="{{ route('mobil.destroy',$mobil->id) }}"
      method="POST">

@csrf
@method('DELETE')

<button
onclick="return confirm('Yakin ingin menghapus mobil ini?')"
class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg">

Hapus

</button>

</form>

</div>

</td>

</tr>

@empty

<tr>

<td colspan="7"
class="text-center py-10 text-slate-500 dark:text-slate-400">

Belum ada data mobil.

</td>

</tr>

@endforelse

</tbody>

</table>

@if($mobils->count())

<div class="p-6 border-t dark:border-slate-700">

{{ $mobils->links() }}

</div>

@endif

</div>

@endsection