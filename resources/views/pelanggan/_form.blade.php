<div class="grid grid-cols-2 gap-6">

    <div>
        <label class="block mb-2 font-medium dark:text-white">Kode Pelanggan</label>
        <input type="text"
               name="kode_pelanggan"
               value="{{ old('kode_pelanggan', $pelanggan->kode_pelanggan ?? '') }}"
               class="w-full rounded-xl border-slate-300 dark:bg-slate-700 dark:text-white">
    </div>

    <div>
        <label class="block mb-2 font-medium dark:text-white">Nama</label>
        <input type="text"
               name="nama"
               value="{{ old('nama', $pelanggan->nama ?? '') }}"
               class="w-full rounded-xl border-slate-300 dark:bg-slate-700 dark:text-white">
    </div>

    <div>
        <label class="block mb-2 font-medium dark:text-white">NIK</label>
        <input type="text"
               name="nik"
               value="{{ old('nik', $pelanggan->nik ?? '') }}"
               class="w-full rounded-xl border-slate-300 dark:bg-slate-700 dark:text-white">
    </div>

    <div>
        <label class="block mb-2 font-medium dark:text-white">Telepon</label>
        <input type="text"
               name="telepon"
               value="{{ old('telepon', $pelanggan->telepon ?? '') }}"
               class="w-full rounded-xl border-slate-300 dark:bg-slate-700 dark:text-white">
    </div>

    <div class="col-span-2">
        <label class="block mb-2 font-medium dark:text-white">Alamat</label>
        <textarea name="alamat"
                  rows="3"
                  class="w-full rounded-xl border-slate-300 dark:bg-slate-700 dark:text-white">{{ old('alamat', $pelanggan->alamat ?? '') }}</textarea>
    </div>

    <div>
        <label class="block mb-2 font-medium dark:text-white">Email</label>
        <input type="email"
               name="email"
               value="{{ old('email', $pelanggan->email ?? '') }}"
               class="w-full rounded-xl border-slate-300 dark:bg-slate-700 dark:text-white">
    </div>

    <div>
        <label class="block mb-2 font-medium dark:text-white">Nomor SIM</label>
        <input type="text"
               name="sim"
               value="{{ old('sim', $pelanggan->sim ?? '') }}"
               class="w-full rounded-xl border-slate-300 dark:bg-slate-700 dark:text-white">
    </div>

</div>

<div class="mt-6">
    <button class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl">
        Simpan
    </button>
</div>