@csrf

<div class="grid grid-cols-2 gap-6">

    <div>
        <label class="block text-white mb-2">
            Harga Per Hari
        </label>

        <input type="number"
               name="harga_per_hari"
               value="{{ old('harga_per_hari',$tarif->harga_per_hari ?? '') }}"
               class="w-full rounded-xl border-slate-600 bg-slate-700 text-white">
    </div>

    <div>
        <label class="block text-white mb-2">
            Tarif KM Dalam Kota
        </label>

        <input type="number"
               name="tarif_km_dalam_kota"
               value="{{ old('tarif_km_dalam_kota',$tarif->tarif_km_dalam_kota ?? '') }}"
               class="w-full rounded-xl border-slate-600 bg-slate-700 text-white">
    </div>

    <div>
        <label class="block text-white mb-2">
            Tarif KM Luar Kota
        </label>

        <input type="number"
               name="tarif_km_luar_kota"
               value="{{ old('tarif_km_luar_kota',$tarif->tarif_km_luar_kota ?? '') }}"
               class="w-full rounded-xl border-slate-600 bg-slate-700 text-white">
    </div>

    <div>
        <label class="block text-white mb-2">
            Denda Per Hari
        </label>

        <input type="number"
               name="denda_per_hari"
               value="{{ old('denda_per_hari',$tarif->denda_per_hari ?? '') }}"
               class="w-full rounded-xl border-slate-600 bg-slate-700 text-white">
    </div>

    <div>
        <label class="block text-white mb-2">
            Interval Ganti Oli (KM)
        </label>

        <input type="number"
               name="interval_ganti_oli"
               value="{{ old('interval_ganti_oli',$tarif->interval_ganti_oli ?? '') }}"
               class="w-full rounded-xl border-slate-600 bg-slate-700 text-white">
    </div>

    <div>
        <label class="block text-white mb-2">
            Notifikasi Ganti Oli (KM)
        </label>

        <input type="number"
               name="notifikasi_ganti_oli"
               value="{{ old('notifikasi_ganti_oli',$tarif->notifikasi_ganti_oli ?? '') }}"
               class="w-full rounded-xl border-slate-600 bg-slate-700 text-white">
    </div>

</div>

<div class="mt-8 flex gap-3">

    <button
        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl">

        Simpan

    </button>

    <a href="{{ route('tarif.index') }}"
       class="bg-slate-600 hover:bg-slate-700 text-white px-6 py-3 rounded-xl">

        Kembali

    </a>

</div>