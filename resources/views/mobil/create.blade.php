@extends('layouts.app')

@section('content')

<h2 class="text-3xl font-bold mb-6 text-slate-800 dark:text-white">
    Tambah Data Mobil
</h2>

<div class="bg-white dark:bg-slate-800 rounded-2xl shadow-lg p-8">

<form action="{{ route('mobil.store') }}"
      method="POST"
      enctype="multipart/form-data">

@csrf

<div class="grid md:grid-cols-2 gap-6">

<div>
<label class="text-slate-700 dark:text-slate-300">Kode Mobil</label>
<input type="text" name="kode_mobil"
class="w-full mt-2 p-3 rounded-xl border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-900 text-slate-800 dark:text-white">
</div>

<div>
<label class="text-slate-700 dark:text-slate-300">Merk</label>
<input type="text" name="merk"
class="w-full mt-2 p-3 rounded-xl border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-900 text-slate-800 dark:text-white">
</div>

<div>
<label class="text-slate-700 dark:text-slate-300">Tipe</label>
<input type="text" name="tipe"
class="w-full mt-2 p-3 rounded-xl border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-900 text-slate-800 dark:text-white">
</div>

<div>
<label class="text-slate-700 dark:text-slate-300">Tahun</label>
<input type="number" name="tahun"
class="w-full mt-2 p-3 rounded-xl border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-900 text-slate-800 dark:text-white">
</div>

<div>
<label class="text-slate-700 dark:text-slate-300">Warna</label>
<input type="text" name="warna"
class="w-full mt-2 p-3 rounded-xl border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-900 text-slate-800 dark:text-white">
</div>

<div>
<label class="text-slate-700 dark:text-slate-300">Plat Nomor</label>
<input type="text" name="plat_nomor"
class="w-full mt-2 p-3 rounded-xl border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-900 text-slate-800 dark:text-white">
</div>

<div>
<label class="text-slate-700 dark:text-slate-300">Kapasitas</label>
<input type="number" name="kapasitas"
class="w-full mt-2 p-3 rounded-xl border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-900 text-slate-800 dark:text-white">
</div>

<div>
<label class="text-slate-700 dark:text-slate-300">Transmisi</label>

<select name="transmisi"
class="w-full mt-2 p-3 rounded-xl border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-900 text-slate-800 dark:text-white">

<option>Manual</option>
<option>Matic</option>

</select>

</div>

<div>

<label class="text-slate-700 dark:text-slate-300">Bahan Bakar</label>

<select name="bahan_bakar"
class="w-full mt-2 p-3 rounded-xl border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-900 text-slate-800 dark:text-white">

<option>Pertalite</option>
<option>Pertamax</option>
<option>Solar</option>

</select>

</div>

<div>

<label class="text-slate-700 dark:text-slate-300">Kilometer</label>

<input type="number" name="kilometer"
class="w-full mt-2 p-3 rounded-xl border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-900 text-slate-800 dark:text-white">

</div>

<div>

<label class="text-slate-700 dark:text-slate-300">Nomor STNK</label>

<input type="text" name="nomor_stnk"
class="w-full mt-2 p-3 rounded-xl border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-900 text-slate-800 dark:text-white">

</div>

<div>

<label class="text-slate-700 dark:text-slate-300">Masa Berlaku STNK</label>

<input type="date" name="masa_berlaku_stnk"
class="w-full mt-2 p-3 rounded-xl border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-900 text-slate-800 dark:text-white">

</div>

<div class="md:col-span-2">

<label class="text-slate-700 dark:text-slate-300">Foto Mobil</label>

<input type="file"
name="foto"
class="w-full mt-2 p-3 rounded-xl border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-900 text-slate-800 dark:text-white">

</div>

</div>

<div class="mt-8">

<button
class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-xl transition">

Simpan Mobil

</button>

</div>

</form>

</div>

@endsection