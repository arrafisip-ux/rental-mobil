@csrf

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">

    {{-- Mobil --}}
    <div class="md:col-span-2">
        <label class="block mb-2 font-semibold text-slate-700 dark:text-white">
            Mobil
        </label>

        <select
            name="mobil_id"
            class="w-full rounded-xl border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-700 text-slate-800 dark:text-white px-4 py-3 focus:ring-2 focus:ring-blue-500 outline-none"
            required>

            <option value="">-- Pilih Mobil --</option>

            @foreach($mobils as $mobil)

                <option value="{{ $mobil->id }}"
                    {{ old('mobil_id', $tarif->mobil_id ?? '') == $mobil->id ? 'selected' : '' }}>

                    {{ $mobil->kode_mobil }}
                    -
                    {{ $mobil->merk }}
                    {{ $mobil->tipe }}

                </option>

            @endforeach

        </select>
    </div>

    {{-- Harga 6 Jam --}}
    <div>
        <label class="block mb-2 font-semibold text-slate-700 dark:text-white">
            Harga 6 Jam
        </label>

        <input
            type="number"
            name="harga_6_jam"
            value="{{ old('harga_6_jam', $tarif->harga_6_jam ?? '') }}"
            class="w-full rounded-xl border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-700 text-slate-800 dark:text-white px-4 py-3"
            required>
    </div>

    {{-- Harga 12 Jam --}}
    <div>
        <label class="block mb-2 font-semibold text-slate-700 dark:text-white">
            Harga 12 Jam
        </label>

        <input
            type="number"
            name="harga_12_jam"
            value="{{ old('harga_12_jam', $tarif->harga_12_jam ?? '') }}"
            class="w-full rounded-xl border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-700 text-slate-800 dark:text-white px-4 py-3"
            required>
    </div>

    {{-- Harga 24 Jam --}}
    <div>
        <label class="block mb-2 font-semibold text-slate-700 dark:text-white">
            Harga 24 Jam
        </label>

        <input
            type="number"
            name="harga_24_jam"
            value="{{ old('harga_24_jam', $tarif->harga_24_jam ?? '') }}"
            class="w-full rounded-xl border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-700 text-slate-800 dark:text-white px-4 py-3"
            required>
    </div>

    {{-- Overtime --}}
    <div>
        <label class="block mb-2 font-semibold text-slate-700 dark:text-white">
            Overtime / Jam
        </label>

        <input
            type="number"
            name="overtime_per_jam"
            value="{{ old('overtime_per_jam', $tarif->overtime_per_jam ?? '') }}"
            class="w-full rounded-xl border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-700 text-slate-800 dark:text-white px-4 py-3"
            required>
    </div>

    {{-- Tambahan 100 KM --}}
    <div>
        <label class="block mb-2 font-semibold text-slate-700 dark:text-white">
            Tambahan >100 KM
        </label>

        <input
            type="number"
            name="tambahan_100km"
            value="{{ old('tambahan_100km', $tarif->tambahan_100km ?? 50000) }}"
            class="w-full rounded-xl border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-700 text-slate-800 dark:text-white px-4 py-3"
            required>
    </div>

    {{-- Tambahan 200 KM --}}
    <div>
        <label class="block mb-2 font-semibold text-slate-700 dark:text-white">
            Tambahan >200 KM
        </label>

        <input
            type="number"
            name="tambahan_200km"
            value="{{ old('tambahan_200km', $tarif->tambahan_200km ?? 100000) }}"
            class="w-full rounded-xl border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-700 text-slate-800 dark:text-white px-4 py-3"
            required>
    </div>

    {{-- Tambahan 350 KM --}}
    <div>
        <label class="block mb-2 font-semibold text-slate-700 dark:text-white">
            Tambahan >350 KM
        </label>

        <input
            type="number"
            name="tambahan_350km"
            value="{{ old('tambahan_350km', $tarif->tambahan_350km ?? 150000) }}"
            class="w-full rounded-xl border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-700 text-slate-800 dark:text-white px-4 py-3"
            required>
    </div>

    {{-- Denda --}}
    <div>
        <label class="block mb-2 font-semibold text-slate-700 dark:text-white">
            Denda / Hari
        </label>

        <input
            type="number"
            name="denda_per_hari"
            value="{{ old('denda_per_hari', $tarif->denda_per_hari ?? 300000) }}"
            class="w-full rounded-xl border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-700 text-slate-800 dark:text-white px-4 py-3"
            required>
    </div>

    {{-- Interval Oli --}}
    <div>
        <label class="block mb-2 font-semibold text-slate-700 dark:text-white">
            Interval Ganti Oli
        </label>

        <input
            type="number"
            name="interval_ganti_oli"
            value="{{ old('interval_ganti_oli', $tarif->interval_ganti_oli ?? 10000) }}"
            class="w-full rounded-xl border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-700 text-slate-800 dark:text-white px-4 py-3"
            required>
    </div>

    {{-- Notifikasi --}}
    <div>
        <label class="block mb-2 font-semibold text-slate-700 dark:text-white">
            Notifikasi Ganti Oli
        </label>

        <input
            type="number"
            name="notifikasi_ganti_oli"
            value="{{ old('notifikasi_ganti_oli', $tarif->notifikasi_ganti_oli ?? 500) }}"
            class="w-full rounded-xl border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-700 text-slate-800 dark:text-white px-4 py-3"
            required>
    </div>

</div>

<div class="mt-8 flex gap-3">

    <button
        type="submit"
        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl shadow transition">

        Simpan

    </button>

    <a
        href="{{ route('tarif.index') }}"
        class="bg-slate-500 hover:bg-slate-600 text-white px-6 py-3 rounded-xl shadow transition">

        Kembali

    </a>

</div>