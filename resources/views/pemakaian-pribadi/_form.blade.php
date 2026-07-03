@csrf

@if ($errors->any())

<div class="mb-6 rounded-xl bg-red-100 border border-red-300 p-4">

    <ul class="list-disc ml-5 text-red-700">

        @foreach ($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach

    </ul>

</div>

@endif

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">

    {{-- Mobil --}}
    <div>

        <label class="block mb-2 font-semibold dark:text-white">
            Mobil
        </label>

        <select
            name="mobil_id"
            class="w-full rounded-xl border-slate-300 dark:bg-slate-700 dark:text-white"
            required>

            <option value="">Pilih Mobil</option>

            @foreach($mobils as $mobil)

                <option
                    value="{{ $mobil->id }}"
                    {{ old('mobil_id',$pemakaianPribadi->mobil_id ?? '') == $mobil->id ? 'selected' : '' }}>

                    {{ $mobil->merk }}
                    {{ $mobil->tipe }}
                    -
                    {{ $mobil->plat_nomor }}

                </option>

            @endforeach

        </select>

    </div>

    {{-- Pengguna --}}
    <div>

        <label class="block mb-2 font-semibold dark:text-white">
            Pengguna
        </label>

        <select
            name="pengguna"
            class="w-full rounded-xl border-slate-300 dark:bg-slate-700 dark:text-white"
            required>

            <option value="Owner"
                {{ old('pengguna',$pemakaianPribadi->pengguna ?? '')=='Owner' ? 'selected' : '' }}>
                Owner
            </option>

            <option value="Karyawan"
                {{ old('pengguna',$pemakaianPribadi->pengguna ?? '')=='Karyawan' ? 'selected' : '' }}>
                Karyawan
            </option>

        </select>

    </div>

    {{-- Tanggal Keluar --}}
    <div>

        <label class="block mb-2 font-semibold dark:text-white">
            Tanggal Keluar
        </label>

        <input
            type="datetime-local"
            name="tanggal_keluar"
            value="{{ old('tanggal_keluar', isset($pemakaianPribadi) ? \Carbon\Carbon::parse($pemakaianPribadi->tanggal_keluar)->format('Y-m-d\TH:i') : '') }}"
            class="w-full rounded-xl"
            required>

    </div>

    {{-- Tanggal Kembali --}}
    <div>

        <label class="block mb-2 font-semibold dark:text-white">
            Tanggal Kembali
        </label>

        <input
            type="datetime-local"
            name="tanggal_kembali"
            value="{{ old('tanggal_kembali', isset($pemakaianPribadi) && $pemakaianPribadi->tanggal_kembali ? \Carbon\Carbon::parse($pemakaianPribadi->tanggal_kembali)->format('Y-m-d\TH:i') : '') }}"
            class="w-full rounded-xl"
            required>

    </div>

    {{-- KM Awal --}}
    <div>

        <label class="block mb-2 font-semibold dark:text-white">
            KM Awal
        </label>

        <input
            type="number"
            name="km_awal"
            value="{{ old('km_awal',$pemakaianPribadi->km_awal ?? '') }}"
            class="w-full rounded-xl"
            required>

    </div>

    {{-- KM Akhir --}}
    <div>

        <label class="block mb-2 font-semibold dark:text-white">
            KM Akhir
        </label>

        <input
            type="number"
            name="km_akhir"
            value="{{ old('km_akhir',$pemakaianPribadi->km_akhir ?? '') }}"
            class="w-full rounded-xl">

    </div>

</div>

<div class="mt-6">

    <label class="block mb-2 font-semibold dark:text-white">
        Keperluan
    </label>

    <input
        type="text"
        name="keperluan"
        value="{{ old('keperluan',$pemakaianPribadi->keperluan ?? '') }}"
        class="w-full rounded-xl"
        required>

</div>

<div class="mt-6">

    <label class="block mb-2 font-semibold dark:text-white">
        Catatan
    </label>

    <textarea
        name="catatan"
        rows="4"
        class="w-full rounded-xl">{{ old('catatan',$pemakaianPribadi->catatan ?? '') }}</textarea>

</div>

<div class="mt-8 flex gap-3">

    <button
        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl">

        Simpan

    </button>

    <a
        href="{{ route('pemakaian-pribadi.index') }}"
        class="bg-slate-500 hover:bg-slate-600 text-white px-6 py-3 rounded-xl">

        Batal

    </a>

</div>