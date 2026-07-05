@csrf

@if ($errors->any())
<div class="mb-6 rounded-xl border border-red-300 bg-red-100 px-5 py-4 text-red-700">
    <div class="font-semibold mb-2">
        Terjadi kesalahan:
    </div>

    <ul class="list-disc list-inside space-y-1">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">

    {{-- Kode Pelanggan --}}
    <div>
        <label class="block mb-2 font-semibold text-slate-700 dark:text-white">
            Kode Pelanggan
        </label>

        <input
            type="text"
            name="kode_pelanggan"
            value="{{ old('kode_pelanggan', $pelanggan->kode_pelanggan ?? '') }}"
            class="w-full rounded-xl border @error('kode_pelanggan') border-red-500 @else border-slate-300 dark:border-slate-600 @enderror bg-white dark:bg-slate-700 text-slate-800 dark:text-white focus:ring-2 focus:ring-blue-500 px-4 py-3"
            required>

        @error('kode_pelanggan')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- NIK --}}
    <div>
        <label class="block mb-2 font-semibold text-slate-700 dark:text-white">
            NIK
        </label>

        <input
            type="text"
            maxlength="16"
            name="nik"
            value="{{ old('nik', $pelanggan->nik ?? '') }}"
            class="w-full rounded-xl border @error('nik') border-red-500 @else border-slate-300 dark:border-slate-600 @enderror bg-white dark:bg-slate-700 text-slate-800 dark:text-white focus:ring-2 focus:ring-blue-500 px-4 py-3"
            required>

        @error('nik')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Nama --}}
    <div>
        <label class="block mb-2 font-semibold text-slate-700 dark:text-white">
            Nama Lengkap
        </label>

        <input
            type="text"
            name="nama"
            value="{{ old('nama', $pelanggan->nama ?? '') }}"
            class="w-full rounded-xl border @error('nama') border-red-500 @else border-slate-300 dark:border-slate-600 @enderror bg-white dark:bg-slate-700 text-slate-800 dark:text-white focus:ring-2 focus:ring-blue-500 px-4 py-3"
            required>

        @error('nama')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Nomor HP --}}
    <div>
        <label class="block mb-2 font-semibold text-slate-700 dark:text-white">
            Nomor HP
        </label>

        <input
            type="text"
            name="telepon"
            value="{{ old('telepon', $pelanggan->telepon ?? '') }}"
            class="w-full rounded-xl border @error('telepon') border-red-500 @else border-slate-300 dark:border-slate-600 @enderror bg-white dark:bg-slate-700 text-slate-800 dark:text-white focus:ring-2 focus:ring-blue-500 px-4 py-3"
            required>

        @error('telepon')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Nomor HP Darurat --}}
    <div>
        <label class="block mb-2 font-semibold text-slate-700 dark:text-white">
            Nomor HP Darurat
        </label>

        <input
            type="text"
            name="telepon_darurat"
            value="{{ old('telepon_darurat', $pelanggan->telepon_darurat ?? '') }}"
            class="w-full rounded-xl border @error('telepon_darurat') border-red-500 @else border-slate-300 dark:border-slate-600 @enderror bg-white dark:bg-slate-700 text-slate-800 dark:text-white focus:ring-2 focus:ring-blue-500 px-4 py-3"
            required>

        @error('telepon_darurat')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Nomor SIM --}}
    <div>
        <label class="block mb-2 font-semibold text-slate-700 dark:text-white">
            Nomor SIM
        </label>

        <input
            type="text"
            name="nomor_sim"
            value="{{ old('nomor_sim', $pelanggan->nomor_sim ?? '') }}"
            class="w-full rounded-xl border @error('nomor_sim') border-red-500 @else border-slate-300 dark:border-slate-600 @enderror bg-white dark:bg-slate-700 text-slate-800 dark:text-white focus:ring-2 focus:ring-blue-500 px-4 py-3"
            required>

        @error('nomor_sim')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Masa Berlaku SIM --}}
    <div>
        <label class="block mb-2 font-semibold text-slate-700 dark:text-white">
            Masa Berlaku SIM
        </label>

        <input
            type="date"
            name="masa_berlaku_sim"
            value="{{ old('masa_berlaku_sim', $pelanggan->masa_berlaku_sim ?? '') }}"
            class="w-full rounded-xl border @error('masa_berlaku_sim') border-red-500 @else border-slate-300 dark:border-slate-600 @enderror bg-white dark:bg-slate-700 text-slate-800 dark:text-white focus:ring-2 focus:ring-blue-500 px-4 py-3"
            required>

        @error('masa_berlaku_sim')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Alamat --}}
    <div class="md:col-span-2">
        <label class="block mb-2 font-semibold text-slate-700 dark:text-white">
            Alamat
        </label>

        <textarea
            name="alamat"
            rows="4"
            class="w-full rounded-xl border @error('alamat') border-red-500 @else border-slate-300 dark:border-slate-600 @enderror bg-white dark:bg-slate-700 text-slate-800 dark:text-white focus:ring-2 focus:ring-blue-500 px-4 py-3"
            required>{{ old('alamat', $pelanggan->alamat ?? '') }}</textarea>

        @error('alamat')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

</div>

<div class="mt-8 flex gap-3">

    <button
        type="submit"
        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl shadow">
        Simpan
    </button>

    <a
        href="{{ route('pelanggan.index') }}"
        class="bg-slate-500 hover:bg-slate-600 text-white px-6 py-3 rounded-xl shadow">
        Kembali
    </a>

</div>