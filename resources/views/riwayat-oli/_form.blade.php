@csrf

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">

    {{-- Mobil --}}
    <div>
        <label class="block mb-2 font-medium text-slate-700 dark:text-white">
            Mobil
        </label>

        <select
            name="mobil_id"
            class="w-full rounded-xl border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-700 text-slate-800 dark:text-white px-4 py-3 focus:ring-2 focus:ring-blue-500 outline-none"
            required>

            <option value="">-- Pilih Mobil --</option>

            @foreach($mobils as $mobil)

                <option value="{{ $mobil->id }}"
                    {{ old('mobil_id', $riwayatOli->mobil_id ?? '') == $mobil->id ? 'selected' : '' }}>

                    {{ $mobil->kode_mobil }}
                    -
                    {{ $mobil->merk }}
                    {{ $mobil->tipe }}

                </option>

            @endforeach

        </select>

    </div>

    {{-- Tanggal Ganti --}}
    <div>

        <label class="block mb-2 font-medium text-slate-700 dark:text-white">

            Tanggal Ganti Oli

        </label>

        <input
            type="date"
            name="tanggal_ganti"
            value="{{ old('tanggal_ganti', $riwayatOli->tanggal_ganti ?? '') }}"
            class="w-full rounded-xl border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-700 text-slate-800 dark:text-white px-4 py-3 focus:ring-2 focus:ring-blue-500 outline-none"
            required>

    </div>

    {{-- KM Ganti --}}
    <div>

        <label class="block mb-2 font-medium text-slate-700 dark:text-white">

            Kilometer Saat Ganti

        </label>

        <input
            type="number"
            name="km_ganti"
            min="0"
            value="{{ old('km_ganti', $riwayatOli->km_ganti ?? '') }}"
            class="w-full rounded-xl border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-700 text-slate-800 dark:text-white px-4 py-3 focus:ring-2 focus:ring-blue-500 outline-none"
            required>

    </div>


    {{-- Keterangan --}}
    <div class="md:col-span-2">

        <label class="block mb-2 font-medium text-slate-700 dark:text-white">

            Keterangan

        </label>

        <textarea
            name="keterangan"
            rows="4"
            class="w-full rounded-xl border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-700 text-slate-800 dark:text-white px-4 py-3 focus:ring-2 focus:ring-blue-500 outline-none">{{ old('keterangan', $riwayatOli->keterangan ?? '') }}</textarea>

    </div>

</div>

<div class="mt-8 flex gap-3">

    <button
        type="submit"
        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl shadow transition">

        Simpan

    </button>

    <a href="{{ route('riwayat-oli.index') }}"
        class="bg-slate-500 hover:bg-slate-600 text-white px-6 py-3 rounded-xl shadow transition">

        Kembali

    </a>

</div>