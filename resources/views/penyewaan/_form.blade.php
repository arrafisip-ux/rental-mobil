@csrf

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">

    {{-- Pelanggan --}}
    <div>
        <label class="block mb-2 font-semibold text-slate-700 dark:text-white">
            Pelanggan
        </label>

        <select
            name="pelanggan_id"
            required
            class="w-full rounded-xl border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-700 dark:text-white px-4 py-3">

            <option value="">-- Pilih Pelanggan --</option>

            @foreach($pelanggans as $pelanggan)

                <option
                    value="{{ $pelanggan->id }}"
                    {{ old('pelanggan_id',$penyewaan->pelanggan_id ?? '')==$pelanggan->id ? 'selected':'' }}>

                    {{ $pelanggan->nama }}

                </option>

            @endforeach

        </select>

    </div>

    {{-- Mobil --}}
    <div>

        <label class="block mb-2 font-semibold text-slate-700 dark:text-white">

            Mobil

        </label>

        <select
            id="mobil"
            name="mobil_id"
            required
            class="w-full rounded-xl border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-700 dark:text-white px-4 py-3">

            <option value="">-- Pilih Mobil --</option>

            @foreach($mobils as $mobil)

                <option
                    value="{{ $mobil->id }}"
                    data-merk="{{ $mobil->merk }}"
                    data-tipe="{{ $mobil->tipe }}"
                    {{ old('mobil_id',$penyewaan->mobil_id ?? '')==$mobil->id ? 'selected':'' }}>

                    {{ $mobil->merk }} {{ $mobil->tipe }}

                </option>

            @endforeach

        </select>

    </div>

    {{-- Tanggal Pinjam --}}
    <div>

        <label class="block mb-2 font-semibold text-slate-700 dark:text-white">

            Tanggal Pinjam

        </label>

        <input
            type="datetime-local"
            name="tanggal_pinjam"
            value="{{ old('tanggal_pinjam',$penyewaan->tanggal_pinjam ?? '') }}"
            class="w-full rounded-xl border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-700 dark:text-white px-4 py-3">

    </div>

    {{-- Tanggal Kembali --}}
    <div>

        <label class="block mb-2 font-semibold text-slate-700 dark:text-white">

            Tanggal Kembali

        </label>

        <input
            type="datetime-local"
            name="tanggal_kembali_rencana"
            value="{{ old('tanggal_kembali_rencana',$penyewaan->tanggal_kembali_rencana ?? '') }}"
            class="w-full rounded-xl border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-700 dark:text-white px-4 py-3">

    </div>

    {{-- Paket --}}
    <div>

        <label class="block mb-2 font-semibold text-slate-700 dark:text-white">

            Paket

        </label>

        <select
            id="paket"
            name="paket"
            class="w-full rounded-xl border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-700 dark:text-white px-4 py-3">

            <option value="6 Jam">6 Jam</option>
            <option value="12 Jam">12 Jam</option>
            <option value="24 Jam">24 Jam</option>

        </select>

    </div>

    {{-- Jenis Perjalanan --}}
    <div>

        <label class="block mb-2 font-semibold text-slate-700 dark:text-white">

            Jenis Perjalanan

        </label>

        <select
            id="jenis"
            name="jenis_perjalanan"
            class="w-full rounded-xl border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-700 dark:text-white px-4 py-3">

            <option value="Dalam Kota">
                Dalam Kota
            </option>

            <option value="Luar Kota">
                Luar Kota
            </option>

        </select>

    </div>

    {{-- Estimasi KM --}}
    <div>

        <label class="block mb-2 font-semibold text-slate-700 dark:text-white">

            Estimasi KM

        </label>

        <input
            id="estimasi"
            type="number"
            name="estimasi_km"
            value="0"
            class="w-full rounded-xl border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-700 dark:text-white px-4 py-3">

    </div>

</div>

<hr class="my-8 dark:border-slate-700">

<h3 class="text-xl font-bold mb-4 dark:text-white">
Checklist Dokumen
</h3>

<div class="grid grid-cols-2 md:grid-cols-5 gap-4">

<label><input type="checkbox" name="cek_ktp"> KTP</label>

<label><input type="checkbox" name="cek_sim"> SIM</label>

<label><input type="checkbox" name="cek_id_karyawan"> ID Karyawan</label>

<label><input type="checkbox" name="cek_slip_gaji"> Slip Gaji</label>

<label><input type="checkbox" name="cek_tempat_usaha"> Tempat Usaha</label>

</div>

<hr class="my-8 dark:border-slate-700">

<h3 class="text-xl font-bold mb-4 dark:text-white">
Rincian Biaya
</h3>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">

<div>

<label class="block mb-2 dark:text-white">
Harga Sewa
</label>

<input
id="harga"
name="harga_sewa"
readonly
value="0"
class="w-full rounded-xl bg-slate-100 dark:bg-slate-700 dark:text-white">

</div>

<div>

<label class="block mb-2 dark:text-white">
Biaya Luar Kota
</label>

<input
id="luar"
name="biaya_luar_kota"
readonly
value="0"
class="w-full rounded-xl bg-slate-100 dark:bg-slate-700 dark:text-white">

</div>

<div>

<label class="block mb-2 dark:text-white">
Total Bayar
</label>

<input
id="total"
name="total_bayar"
readonly
value="0"
class="w-full rounded-xl bg-green-100 dark:bg-green-900 font-bold">

</div>

</div>

<div class="mt-8">

<label class="block mb-2 dark:text-white">

Catatan

</label>

<textarea
name="catatan"
rows="3"
class="w-full rounded-xl border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-700 dark:text-white"></textarea>

</div>

<div class="mt-8 flex gap-3">

<button
type="submit"
class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl">

Simpan Transaksi

</button>

<a
href="{{ route('penyewaan.index') }}"
class="bg-slate-500 hover:bg-slate-600 text-white px-6 py-3 rounded-xl">

Batal

</a>

</div>