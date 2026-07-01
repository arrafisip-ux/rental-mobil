@csrf

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">

    <div>
        <label class="block mb-2 font-medium text-slate-700 dark:text-white">
            Harga Per Hari
        </label>

        <input
            type="number"
            name="harga_per_hari"
            value="{{ old('harga_per_hari', $tarif->harga_per_hari ?? '') }}"
            class="w-full rounded-xl border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-700 text-slate-800 dark:text-white px-4 py-3 focus:ring-2 focus:ring-blue-500 outline-none"
            required>
    </div>

    <div>
        <label class="block mb-2 font-medium text-slate-700 dark:text-white">
            Tarif KM Dalam Kota
        </label>

        <input
            type="number"
            name="tarif_km_dalam_kota"
            value="{{ old('tarif_km_dalam_kota', $tarif->tarif_km_dalam_kota ?? '') }}"
            class="w-full rounded-xl border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-700 text-slate-800 dark:text-white px-4 py-3 focus:ring-2 focus:ring-blue-500 outline-none"
            required>
    </div>

    <div>
        <label class="block mb-2 font-medium text-slate-700 dark:text-white">
            Tarif KM Luar Kota
        </label>

        <input
            type="number"
            name="tarif_km_luar_kota"
            value="{{ old('tarif_km_luar_kota', $tarif->tarif_km_luar_kota ?? '') }}"
            class="w-full rounded-xl border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-700 text-slate-800 dark:text-white px-4 py-3 focus:ring-2 focus:ring-blue-500 outline-none"
            required>
    </div>

    <div>
        <label class="block mb-2 font-medium text-slate-700 dark:text-white">
            Denda Per Hari
        </label>

        <input
            type="number"
            name="denda_per_hari"
            value="{{ old('denda_per_hari', $tarif->denda_per_hari ?? '') }}"
            class="w-full rounded-xl border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-700 text-slate-800 dark:text-white px-4 py-3 focus:ring-2 focus:ring-blue-500 outline-none"
            required>
    </div>

    <div>
        <label class="block mb-2 font-medium text-slate-700 dark:text-white">
            Interval Ganti Oli (KM)
        </label>

        <input
            type="number"
            name="interval_ganti_oli"
            value="{{ old('interval_ganti_oli', $tarif->interval_ganti_oli ?? '') }}"
            class="w-full rounded-xl border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-700 text-slate-800 dark:text-white px-4 py-3 focus:ring-2 focus:ring-blue-500 outline-none"
            required>
    </div>

    <div>
        <label class="block mb-2 font-medium text-slate-700 dark:text-white">
            Notifikasi Ganti Oli (KM)
        </label>

        <input
            type="number"
            name="notifikasi_ganti_oli"
            value="{{ old('notifikasi_ganti_oli', $tarif->notifikasi_ganti_oli ?? '') }}"
            class="w-full rounded-xl border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-700 text-slate-800 dark:text-white px-4 py-3 focus:ring-2 focus:ring-blue-500 outline-none"
            required>
    </div>

</div>

<div class="mt-8 flex gap-3">

    <button
        type="submit"
        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl shadow transition">

        Simpan

    </button>

    <a href="{{ route('tarif.index') }}"
        class="bg-slate-500 hover:bg-slate-600 text-white px-6 py-3 rounded-xl shadow transition">

        Kembali

    </a>

</div>