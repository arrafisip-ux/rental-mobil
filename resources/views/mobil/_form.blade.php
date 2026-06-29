@if ($errors->any())
<div class="mb-6 rounded-xl bg-red-100 border border-red-300 text-red-700 p-4">
    <strong>Terjadi kesalahan :</strong>

    <ul class="list-disc ml-5 mt-2">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="grid md:grid-cols-2 gap-6">

<div>
<label class="font-medium">Kode Mobil</label>
<input type="text"
name="kode_mobil"
value="{{ old('kode_mobil',$mobil->kode_mobil ?? '') }}"
class="w-full mt-2 rounded-xl border dark:bg-slate-700 dark:border-slate-600 dark:text-white p-3">
</div>

<div>
<label class="font-medium">Merk</label>
<input type="text"
name="merk"
value="{{ old('merk',$mobil->merk ?? '') }}"
class="w-full mt-2 rounded-xl border dark:bg-slate-700 dark:border-slate-600 dark:text-white p-3">
</div>

<div>
<label class="font-medium">Tipe</label>
<input type="text"
name="tipe"
value="{{ old('tipe',$mobil->tipe ?? '') }}"
class="w-full mt-2 rounded-xl border dark:bg-slate-700 dark:border-slate-600 dark:text-white p-3">
</div>

<div>
<label class="font-medium">Tahun</label>
<input type="number"
name="tahun"
value="{{ old('tahun',$mobil->tahun ?? '') }}"
class="w-full mt-2 rounded-xl border dark:bg-slate-700 dark:border-slate-600 dark:text-white p-3">
</div>

<div>
<label class="font-medium">Warna</label>
<input type="text"
name="warna"
value="{{ old('warna',$mobil->warna ?? '') }}"
class="w-full mt-2 rounded-xl border dark:bg-slate-700 dark:border-slate-600 dark:text-white p-3">
</div>

<div>
<label class="font-medium">Plat Nomor</label>
<input type="text"
name="plat_nomor"
value="{{ old('plat_nomor',$mobil->plat_nomor ?? '') }}"
class="w-full mt-2 rounded-xl border dark:bg-slate-700 dark:border-slate-600 dark:text-white p-3">
</div>

<div>
<label class="font-medium">Kapasitas</label>
<input type="number"
name="kapasitas"
value="{{ old('kapasitas',$mobil->kapasitas ?? '') }}"
class="w-full mt-2 rounded-xl border dark:bg-slate-700 dark:border-slate-600 dark:text-white p-3">
</div>

<div>
<label class="font-medium">Transmisi</label>

<select
name="transmisi"
class="w-full mt-2 rounded-xl border dark:bg-slate-700 dark:border-slate-600 dark:text-white p-3">

<option value="Manual">Manual</option>
<option value="Matic">Matic</option>

</select>

</div>

<div>
<label class="font-medium">Bahan Bakar</label>

<select
name="bahan_bakar"
class="w-full mt-2 rounded-xl border dark:bg-slate-700 dark:border-slate-600 dark:text-white p-3">

<option>Pertalite</option>
<option>Pertamax</option>
<option>Solar</option>

</select>

</div>

<div>
<label class="font-medium">Kilometer</label>

<input
type="number"
name="kilometer"
value="{{ old('kilometer',$mobil->kilometer ?? '') }}"
class="w-full mt-2 rounded-xl border dark:bg-slate-700 dark:border-slate-600 dark:text-white p-3">

</div>

<div>
<label class="font-medium">Nomor STNK</label>

<input
type="text"
name="nomor_stnk"
value="{{ old('nomor_stnk',$mobil->nomor_stnk ?? '') }}"
class="w-full mt-2 rounded-xl border dark:bg-slate-700 dark:border-slate-600 dark:text-white p-3">

</div>

<div>
<label class="font-medium">Masa Berlaku STNK</label>

<input
type="date"
name="masa_berlaku_stnk"
value="{{ old('masa_berlaku_stnk',$mobil->masa_berlaku_stnk ?? '') }}"
class="w-full mt-2 rounded-xl border dark:bg-slate-700 dark:border-slate-600 dark:text-white p-3">

</div>

<div class="md:col-span-2">

<label class="font-medium">Foto Mobil</label>

<input
type="file"
name="foto"
class="w-full mt-2 rounded-xl border dark:bg-slate-700 dark:border-slate-600 dark:text-white p-3">

</div>

</div>