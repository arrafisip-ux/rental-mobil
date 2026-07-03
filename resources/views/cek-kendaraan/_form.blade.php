@csrf

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">

    <div>

        <label class="block mb-2 font-semibold dark:text-white">

            Mobil

        </label>

        <select
            name="mobil_id"
            required
            class="w-full rounded-xl border-slate-300 dark:bg-slate-700 dark:border-slate-600 dark:text-white">

            <option value="">Pilih Mobil</option>

            @foreach($mobils as $mobil)

                <option
                    value="{{ $mobil->id }}"
                    {{ old('mobil_id', $cekKendaraan->mobil_id ?? '') == $mobil->id ? 'selected' : '' }}>

                    {{ $mobil->merk }}
                    {{ $mobil->tipe }}
                    -
                    {{ $mobil->plat_nomor }}

                </option>

            @endforeach

        </select>

    </div>

    <div>

        <label class="block mb-2 font-semibold dark:text-white">

            Tanggal

        </label>

        <input
            type="date"
            name="tanggal"
            value="{{ old('tanggal', isset($cekKendaraan) ? \Carbon\Carbon::parse($cekKendaraan->tanggal)->format('Y-m-d') : now()->format('Y-m-d')) }}"
            required
            class="w-full rounded-xl border-slate-300 dark:bg-slate-700 dark:border-slate-600 dark:text-white">

    </div>

    <div class="md:col-span-2">

        <label class="block mb-2 font-semibold dark:text-white">

            Jenis Pemeriksaan

        </label>

        <select
            name="jenis_cek"
            required
            class="w-full rounded-xl border-slate-300 dark:bg-slate-700 dark:border-slate-600 dark:text-white">

            <option value="Sebelum Digunakan"
                {{ old('jenis_cek', $cekKendaraan->jenis_cek ?? '') == 'Sebelum Digunakan' ? 'selected' : '' }}>

                Sebelum Digunakan

            </option>

            <option value="Sesudah Digunakan"
                {{ old('jenis_cek', $cekKendaraan->jenis_cek ?? '') == 'Sesudah Digunakan' ? 'selected' : '' }}>

                Sesudah Digunakan

            </option>

        </select>

    </div>

</div>

<hr class="my-8">

<h3 class="text-xl font-bold mb-5 dark:text-white">

    Checklist Kendaraan

</h3>

<div class="grid md:grid-cols-2 gap-4">

    <label><input type="checkbox" name="cek_body"
        {{ old('cek_body', $cekKendaraan->cek_body ?? true) ? 'checked' : '' }}> Body</label>

    <label><input type="checkbox" name="cek_ban"
        {{ old('cek_ban', $cekKendaraan->cek_ban ?? true) ? 'checked' : '' }}> Ban</label>

    <label><input type="checkbox" name="cek_lampu"
        {{ old('cek_lampu', $cekKendaraan->cek_lampu ?? true) ? 'checked' : '' }}> Lampu</label>

    <label><input type="checkbox" name="cek_rem"
        {{ old('cek_rem', $cekKendaraan->cek_rem ?? true) ? 'checked' : '' }}> Rem</label>

    <label><input type="checkbox" name="cek_oli"
        {{ old('cek_oli', $cekKendaraan->cek_oli ?? true) ? 'checked' : '' }}> Oli</label>

    <label><input type="checkbox" name="cek_air_radiator"
        {{ old('cek_air_radiator', $cekKendaraan->cek_air_radiator ?? true) ? 'checked' : '' }}> Air Radiator</label>

    <label><input type="checkbox" name="cek_bensin"
        {{ old('cek_bensin', $cekKendaraan->cek_bensin ?? true) ? 'checked' : '' }}> Bensin</label>

    <label><input type="checkbox" name="cek_interior"
        {{ old('cek_interior', $cekKendaraan->cek_interior ?? true) ? 'checked' : '' }}> Interior</label>

</div>

<div class="mt-6">

    <label class="block mb-2 font-semibold dark:text-white">

        Catatan

    </label>

    <textarea
        name="catatan"
        rows="4"
        class="w-full rounded-xl border-slate-300 dark:bg-slate-700 dark:border-slate-600 dark:text-white">{{ old('catatan', $cekKendaraan->catatan ?? '') }}</textarea>

</div>

<div class="mt-8 flex gap-3">

    <button
        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl">

        Simpan

    </button>

    <a
        href="{{ route('cek-kendaraan.index') }}"
        class="bg-slate-500 hover:bg-slate-600 text-white px-6 py-3 rounded-xl">

        Batal

    </a>

</div>