@csrf

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">

    {{-- Mobil --}}
    <div>

        <label class="block mb-2 font-semibold dark:text-white">
            Mobil
        </label>

        <select
            name="mobil_id"
            id="mobil_id"
            required
            class="w-full rounded-xl border-slate-300 dark:bg-slate-700 dark:border-slate-600 dark:text-white">

            <option value="">Pilih Mobil</option>

            @foreach($mobils as $mobil)

                <option
                    value="{{ $mobil->id }}"
                    {{ old('mobil_id',$perawatan->mobil_id ?? '')==$mobil->id ? 'selected' : '' }}>

                    {{ $mobil->merk }}
                    {{ $mobil->tipe }}
                    -
                    {{ $mobil->plat_nomor }}

                </option>

            @endforeach

        </select>

    </div>

    {{-- Tanggal --}}
    <div>

        <label class="block mb-2 font-semibold dark:text-white">
            Tanggal Perawatan
        </label>

        <input
            type="date"
            name="tanggal_perawatan"
            required
            value="{{ old('tanggal_perawatan',$perawatan->tanggal_perawatan ?? date('Y-m-d')) }}"
            class="w-full rounded-xl border-slate-300 dark:bg-slate-700 dark:border-slate-600 dark:text-white">

    </div>

    {{-- Jenis --}}
    <div>

        <label class="block mb-2 font-semibold dark:text-white">
            Jenis Perawatan
        </label>

        <select
            name="jenis_perawatan"
            required
            class="w-full rounded-xl border-slate-300 dark:bg-slate-700 dark:border-slate-600 dark:text-white">

            <option value="">Pilih Jenis</option>

            <option value="Ganti Oli">Ganti Oli</option>
            <option value="Servis Berkala">Servis Berkala</option>
            <option value="Tune Up">Tune Up</option>
            <option value="Ganti Ban">Ganti Ban</option>
            <option value="Rem">Servis Rem</option>
            <option value="AC">Servis AC</option>
            <option value="Mesin">Servis Mesin</option>
            <option value="Lainnya">Lainnya</option>

        </select>

    </div>

    {{-- Sparepart --}}
    <div>

        <label class="block mb-2 font-semibold dark:text-white">
            Nama Oli / Sparepart
        </label>

        <input
            type="text"
            name="nama_sparepart"
            value="{{ old('nama_sparepart',$perawatan->nama_sparepart ?? '') }}"
            class="w-full rounded-xl border-slate-300 dark:bg-slate-700 dark:border-slate-600 dark:text-white">

    </div>

    {{-- KM Saat Servis --}}
    <div>

        <label class="block mb-2 font-semibold dark:text-white">
            KM Saat Servis
        </label>

        <input
            type="number"
            id="km_servis"
            name="km_servis"
            readonly
            required
            value="{{ old('km_servis',$perawatan->km_servis ?? '') }}"
            class="w-full bg-slate-100 rounded-xl border-slate-300 dark:bg-slate-700 dark:border-slate-600 dark:text-white">

    </div>

    {{-- KM Berikutnya --}}
    <div>

        <label class="block mb-2 font-semibold dark:text-white">
            KM Servis Berikutnya
        </label>

        <input
            type="number"
            id="km_servis_berikutnya"
            name="km_servis_berikutnya"
            readonly
            required
            value="{{ old('km_servis_berikutnya',$perawatan->km_servis_berikutnya ?? '') }}"
            class="w-full bg-slate-100 rounded-xl border-slate-300 dark:bg-slate-700 dark:border-slate-600 dark:text-white">

    </div>

    {{-- Biaya --}}
    <div>

        <label class="block mb-2 font-semibold dark:text-white">
            Biaya
        </label>

        <input
            type="number"
            name="biaya"
            required
            value="{{ old('biaya',$perawatan->biaya ?? 0) }}"
            class="w-full rounded-xl border-slate-300 dark:bg-slate-700 dark:border-slate-600 dark:text-white">

    </div>

    {{-- Bengkel --}}
    <div>

        <label class="block mb-2 font-semibold dark:text-white">
            Bengkel
        </label>

        <input
            type="text"
            name="bengkel"
            value="{{ old('bengkel',$perawatan->bengkel ?? '') }}"
            class="w-full rounded-xl border-slate-300 dark:bg-slate-700 dark:border-slate-600 dark:text-white">

    </div>

</div>

<div class="mt-6">

    <label class="block mb-2 font-semibold dark:text-white">
        Keterangan
    </label>

    <textarea
        name="keterangan"
        rows="4"
        class="w-full rounded-xl border-slate-300 dark:bg-slate-700 dark:border-slate-600 dark:text-white">{{ old('keterangan',$perawatan->keterangan ?? '') }}</textarea>

</div>

<div class="mt-8 flex gap-3">

    <button
        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl">

        Simpan Perawatan

    </button>

    <a
        href="{{ route('perawatan.index') }}"
        class="bg-slate-500 hover:bg-slate-600 text-white px-6 py-3 rounded-xl">

        Batal

    </a>

</div>

<script>

document.addEventListener('DOMContentLoaded', function () {

    const mobil = document.getElementById('mobil_id');

    function loadServisData() {

        if (!mobil.value) return;

        fetch('/mobil/' + mobil.value + '/servis-data')
            .then(response => response.json())
            .then(data => {

                document.getElementById('km_servis').value = data.kilometer;
                document.getElementById('km_servis_berikutnya').value = data.km_berikutnya;

            });

    }

    mobil.addEventListener('change', loadServisData);

    loadServisData();

});

</script>