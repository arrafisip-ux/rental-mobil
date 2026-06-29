@csrf

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">

    <div>
        <label class="block mb-2 font-semibold dark:text-white">
            Kode Pelanggan
        </label>

        <input
            type="text"
            name="kode_pelanggan"
            value="{{ old('kode_pelanggan', $pelanggan->kode_pelanggan ?? '') }}"
            class="w-full rounded-xl border-slate-300 dark:bg-slate-700 dark:border-slate-600 dark:text-white"
            required>
    </div>

    <div>
        <label class="block mb-2 font-semibold dark:text-white">
            Nama
        </label>

        <input
            type="text"
            name="nama"
            value="{{ old('nama', $pelanggan->nama ?? '') }}"
            class="w-full rounded-xl border-slate-300 dark:bg-slate-700 dark:border-slate-600 dark:text-white"
            required>
    </div>

    <div>
        <label class="block mb-2 font-semibold dark:text-white">
            NIK
        </label>

        <input
            type="text"
            name="nik"
            value="{{ old('nik', $pelanggan->nik ?? '') }}"
            class="w-full rounded-xl border-slate-300 dark:bg-slate-700 dark:border-slate-600 dark:text-white"
            required>
    </div>

    <div>
        <label class="block mb-2 font-semibold dark:text-white">
            Telepon
        </label>

        <input
            type="text"
            name="telepon"
            value="{{ old('telepon', $pelanggan->telepon ?? '') }}"
            class="w-full rounded-xl border-slate-300 dark:bg-slate-700 dark:border-slate-600 dark:text-white"
            required>
    </div>

    <div class="md:col-span-2">
        <label class="block mb-2 font-semibold dark:text-white">
            Alamat
        </label>

        <textarea
            name="alamat"
            rows="4"
            class="w-full rounded-xl border-slate-300 dark:bg-slate-700 dark:border-slate-600 dark:text-white"
            required>{{ old('alamat', $pelanggan->alamat ?? '') }}</textarea>
    </div>

    <div>
        <label class="block mb-2 font-semibold dark:text-white">
            Email
        </label>

        <input
            type="email"
            name="email"
            value="{{ old('email', $pelanggan->email ?? '') }}"
            class="w-full rounded-xl border-slate-300 dark:bg-slate-700 dark:border-slate-600 dark:text-white">
    </div>

    <div>
        <label class="block mb-2 font-semibold dark:text-white">
            Nomor SIM
        </label>

        <input
            type="text"
            name="sim"
            value="{{ old('sim', $pelanggan->sim ?? '') }}"
            class="w-full rounded-xl border-slate-300 dark:bg-slate-700 dark:border-slate-600 dark:text-white">
    </div>

</div>

<div class="mt-8 flex gap-3">

    <button
        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl">

        Simpan

    </button>

    <a
        href="{{ route('pelanggan.index') }}"
        class="bg-slate-500 hover:bg-slate-600 text-white px-6 py-3 rounded-xl">

        Batal

    </a>

</div>