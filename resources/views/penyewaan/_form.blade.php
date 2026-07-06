@csrf

@if ($errors->has('dokumen'))
<div class="mb-6 bg-red-100 border border-red-300 text-red-700 px-5 py-4 rounded-xl">
    {{ $errors->first('dokumen') }}
</div>
@endif

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">

    {{-- Pelanggan --}}
    <div>
        <label class="block mb-2 font-semibold dark:text-white">
            Pelanggan
        </label>

        <select
    name="pelanggan_id"
    class="w-full rounded-xl border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-700 dark:text-white px-4 py-3"
    required>

    <option value="">Pilih Pelanggan</option>

    @foreach($pelanggans as $pelanggan)

        <option
    value="{{ $pelanggan->id }}"
    {{ $pelanggan->penyewaan_aktif ? 'disabled' : '' }}
    {{ old('pelanggan_id') == $pelanggan->id ? 'selected' : '' }}
>
    {{ $pelanggan->nama }}

    @if($pelanggan->penyewaan_aktif)
        (Sedang Menyewa)
    @endif

</option>

    @endforeach

</select>
    </div>

    {{-- Mobil --}}
<div>

    <label class="block mb-2 font-semibold dark:text-white">
        Mobil
    </label>

    <select
        id="mobil"
        name="mobil_id"
        class="w-full rounded-xl border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-700 dark:text-white px-4 py-3"
        required>

        <option value="">Pilih Mobil</option>

        @foreach($mobils as $mobil)

            <option
                value="{{ $mobil->id }}"

                data-km="{{ $mobil->kilometer }}"

                data-6="{{ $mobil->tarif->harga_6_jam ?? 0 }}"

                data-12="{{ $mobil->tarif->harga_12_jam ?? 0 }}"

                data-24="{{ $mobil->tarif->harga_24_jam ?? 0 }}"

                data-overtime="{{ $mobil->tarif->overtime_per_jam ?? 0 }}"

                data-100="{{ $mobil->tarif->tambahan_100km ?? 50000 }}"

                data-200="{{ $mobil->tarif->tambahan_200km ?? 100000 }}"

                data-350="{{ $mobil->tarif->tambahan_350km ?? 150000 }}"

                data-denda="{{ $mobil->tarif->denda_per_hari ?? 300000 }}"

                {{ old('mobil_id',$penyewaan->mobil_id ?? '')==$mobil->id ? 'selected' : '' }}>

                {{ $mobil->merk }}
                {{ $mobil->tipe }}
                -
                {{ $mobil->plat_nomor }}

            </option>

        @endforeach

    </select>

</div>
    {{-- Paket --}}
    <div>

        <label class="block mb-2 font-semibold dark:text-white">

            Paket

        </label>

        <select
            id="paket"
            name="paket"
            class="w-full rounded-xl border-slate-300 dark:bg-slate-700 dark:border-slate-600 dark:text-white">

             <option value="6 Jam">6 Jam</option>

    <option value="12 Jam">12 Jam</option>

    <option value="24 Jam">24 Jam</option>

    <option value="Harian">Harian</option>


        </select>

    </div>

    {{-- Jenis Perjalanan --}}
    <div>

        <label class="block mb-2 font-semibold dark:text-white">

            Jenis Perjalanan

        </label>

        <select
            id="jenis_perjalanan"
            name="jenis_perjalanan"
            class="w-full rounded-xl border-slate-300 dark:bg-slate-700 dark:border-slate-600 dark:text-white">

            <option>Dalam Kota</option>

            <option>Luar Kota</option>

        </select>

    </div>

    {{-- Tujuan --}}
    <div>

        <label class="block mb-2 font-semibold dark:text-white">

            Tujuan

        </label>

        <input
            type="text"
            name="tujuan"
            class="w-full rounded-xl border-slate-300 dark:bg-slate-700 dark:border-slate-600 dark:text-white"
            value="{{ old('tujuan',$penyewaan->tujuan ?? '') }}">

    </div>

    {{-- Estimasi KM --}}
    <div>

        <label class="block mb-2 font-semibold dark:text-white">

            Estimasi KM

        </label>

        <input
            type="number"
            id="estimasi_km"
            name="estimasi_km"
            class="w-full rounded-xl border-slate-300 dark:bg-slate-700 dark:border-slate-600 dark:text-white"
            value="{{ old('estimasi_km',$penyewaan->estimasi_km ?? 0) }}">

    </div>

    {{-- Tanggal Pinjam --}}
    <div>

        <label class="block mb-2 font-semibold dark:text-white">

            Tanggal Pinjam

        </label>

       <input
    type="datetime-local"
    id="tanggal_pinjam"
    name="tanggal_pinjam"
    class="w-full rounded-xl border-slate-300 dark:bg-slate-700 dark:border-slate-600 dark:text-white">

    </div>

    {{-- Tanggal Kembali --}}
    <div>

        <label class="block mb-2 font-semibold dark:text-white">

            Rencana Kembali

        </label>

        <input
    type="datetime-local"
    id="tanggal_kembali"
    name="tanggal_kembali_rencana"
    class="w-full rounded-xl border-slate-300 dark:bg-slate-700 dark:border-slate-600 dark:text-white">

    </div>

</div>

<hr class="my-8">

<h2 class="text-2xl font-bold text-slate-800 dark:text-white mb-6">
    Verifikasi Dokumen
</h2>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">

    <label class="flex items-center gap-3 bg-slate-100 dark:bg-slate-700 rounded-xl p-4 cursor-pointer">

        <input
            type="checkbox"
            id="cek_ktp"
            name="cek_ktp"
            class="w-5 h-5">

        <span class="dark:text-white font-medium">
            KTP
        </span>

    </label>

    <label class="flex items-center gap-3 bg-slate-100 dark:bg-slate-700 rounded-xl p-4 cursor-pointer">

        <input
            type="checkbox"
            id="cek_sim"
            name="cek_sim"
            class="w-5 h-5">

        <span class="dark:text-white font-medium">
            SIM
        </span>

    </label>

    <label class="flex items-center gap-3 bg-slate-100 dark:bg-slate-700 rounded-xl p-4 cursor-pointer">

        <input
            type="checkbox"
            id="cek_id_karyawan"
            name="cek_id_karyawan"
            class="w-5 h-5">

        <span class="dark:text-white font-medium">
            ID Karyawan
        </span>

    </label>

    <label class="flex items-center gap-3 bg-slate-100 dark:bg-slate-700 rounded-xl p-4 cursor-pointer">

        <input
            type="checkbox"
            id="cek_slip_gaji"
            name="cek_slip_gaji"
            class="w-5 h-5">

        <span class="dark:text-white font-medium">
            Slip Gaji
        </span>

    </label>

    <label class="flex items-center gap-3 bg-slate-100 dark:bg-slate-700 rounded-xl p-4 cursor-pointer">

        <input
            type="checkbox"
            id="cek_tempat_usaha"
            name="cek_tempat_usaha"
            class="w-5 h-5">

        <span class="dark:text-white font-medium">
            Tempat Usaha
        </span>

    </label>

</div>

<div
    id="statusDokumen"
    class="mt-5 rounded-xl bg-yellow-100 dark:bg-yellow-900 text-yellow-800 dark:text-yellow-200 p-4">

    Lengkapi persyaratan:
    <br>

    ✔ KTP
    <br>

    ✔ SIM
    <br>

    ✔ Salah satu:
    ID Karyawan / Slip Gaji / Tempat Usaha

</div>

<hr class="my-10">

<h2 class="text-2xl font-bold text-slate-800 dark:text-white mb-6">

    Rincian Biaya

</h2>

<div class="grid md:grid-cols-2 gap-6">

    <div class="bg-slate-100 dark:bg-slate-700 rounded-xl p-5">

        <div class="flex justify-between mb-3">

            <span class="dark:text-white">
                Harga Paket
            </span>

            <span
                id="txtHargaSewa"
                class="font-bold text-blue-600">

                Rp0

            </span>

        </div>

        <div class="flex justify-between mb-3">

            <span class="dark:text-white">
                Tambahan Luar Kota
            </span>

            <span
                id="txtLuarKota"
                class="font-bold text-orange-500">

                Rp0

            </span>

        </div>

        <div class="flex justify-between mb-3">

            <span class="dark:text-white">
                Overtime
            </span>

            <span
                id="txtOvertime"
                class="font-bold text-indigo-500">

                Rp0

            </span>

        </div>

        <div class="flex justify-between">

            <span class="dark:text-white">
                Denda
            </span>

            <span
                id="txtDenda"
                class="font-bold text-red-500">

                Rp0

            </span>

        </div>

    </div>

    <div class="bg-green-100 dark:bg-green-900 rounded-xl p-6 flex flex-col justify-center">

        <div class="text-center">

            <div class="text-slate-700 dark:text-slate-200">

                TOTAL PEMBAYARAN

            </div>

            <div
                id="txtTotal"
                class="text-4xl font-bold text-green-700 dark:text-green-300 mt-3">

                Rp0

            </div>

        </div>

    </div>

</div>

<input
    type="hidden"
    id="harga_sewa"
    name="harga_sewa">

<input
    type="hidden"
    id="biaya_luar_kota"
    name="biaya_luar_kota">

<input
    type="hidden"
    id="overtime"
    name="overtime"
    value="0">

<input
    type="hidden"
    id="denda"
    name="denda"
    value="0">

<input
    type="hidden"
    id="total_bayar"
    name="total_bayar">

<input
    type="hidden"
    id="km_awal"
    name="km_awal">

<input
    type="hidden"
    id="lama_sewa"
    name="lama_sewa"
    value="1">

<input
    type="hidden"
    name="status_pembayaran"
    value="Belum Lunas">

<div class="mt-10 flex gap-3">

    <button
        type="submit"
        id="btnSimpan"
        disabled
        class="bg-blue-600 disabled:bg-slate-400 hover:bg-blue-700 text-white px-6 py-3 rounded-xl transition">

        Simpan Transaksi

    </button>

    <a
        href="{{ route('penyewaan.index') }}"
        class="bg-slate-500 hover:bg-slate-600 text-white px-6 py-3 rounded-xl">

        Batal

    </a>

</div>
<script>
document.addEventListener('DOMContentLoaded', function () {

    const mobil = document.getElementById('mobil');
    const paket = document.getElementById('paket');
    const perjalanan = document.getElementById('jenis_perjalanan');
    const km = document.getElementById('estimasi_km');

    const tanggalPinjam = document.getElementById('tanggal_pinjam');
    const tanggalKembali = document.getElementById('tanggal_kembali');

    const hargaInput = document.getElementById('harga_sewa');
    const luarInput = document.getElementById('biaya_luar_kota');
    const totalInput = document.getElementById('total_bayar');
    const kmAwal = document.getElementById('km_awal');
    const lamaSewa = document.getElementById('lama_sewa');

    const txtHarga = document.getElementById('txtHargaSewa');
    const txtLuar = document.getElementById('txtLuarKota');
    const txtTotal = document.getElementById('txtTotal');

    const cekKtp = document.getElementById('cek_ktp');
    const cekSim = document.getElementById('cek_sim');
    const cekId = document.getElementById('cek_id_karyawan');
    const cekSlip = document.getElementById('cek_slip_gaji');
    const cekUsaha = document.getElementById('cek_tempat_usaha');

    const status = document.getElementById('statusDokumen');
    const btn = document.getElementById('btnSimpan');

    function rupiah(angka){
        return "Rp" + Number(angka).toLocaleString('id-ID');
    }

    function hitungTanggal(){

    if(!tanggalPinjam.value) return;

    const mulai = new Date(tanggalPinjam.value);
    let kembali = new Date(mulai);

    switch(paket.value){

        case "6 Jam":

            kembali.setHours(kembali.getHours()+6);
            tanggalKembali.disabled = true;
            lamaSewa.value = 1;
            break;

        case "12 Jam":

            kembali.setHours(kembali.getHours()+12);
            tanggalKembali.disabled = true;
            lamaSewa.value = 1;
            break;

        case "24 Jam":

            kembali.setDate(kembali.getDate()+1);
            tanggalKembali.disabled = true;
            lamaSewa.value = 1;
            break;

        case "Harian":

    tanggalKembali.disabled = false;

    if(tanggalKembali.value==""){

        tanggalKembali.value=tanggalPinjam.value;

    }

    break;

    }

    const yyyy = kembali.getFullYear();
    const mm = String(kembali.getMonth()+1).padStart(2,'0');
    const dd = String(kembali.getDate()).padStart(2,'0');
    const hh = String(kembali.getHours()).padStart(2,'0');
    const ii = String(kembali.getMinutes()).padStart(2,'0');

    tanggalKembali.value =
        `${yyyy}-${mm}-${dd}T${hh}:${ii}`;

}

    function hitung(){

        if(mobil.selectedIndex<=0){
            return;
        }

        const opt = mobil.options[mobil.selectedIndex];

        kmAwal.value = opt.dataset.km;

        let harga = 0;

        switch(paket.value){

            case "6 Jam":
                harga = Number(opt.dataset[6]);
                break;

            case "12 Jam":
                harga = Number(opt.dataset[12]);
                break;

            case "24 Jam":
                harga = Number(opt.dataset[24]);
                break;

           default:

    let hari = 1;

    if(tanggalPinjam.value && tanggalKembali.value){

        const awal = new Date(tanggalPinjam.value);
        const akhir = new Date(tanggalKembali.value);

        hari = Math.ceil(
            (akhir-awal)/(1000*60*60*24)
        );

        if(hari < 1){
            hari = 1;
        }

    }

    lamaSewa.value = hari;

    harga = Number(opt.dataset[24]) * hari;
        }

        let luar = 0;

        if(perjalanan.value=="Luar Kota"){

            if(Number(km.value)>350){

                luar = Number(opt.dataset[350]);

            }else if(Number(km.value)>200){

                luar = Number(opt.dataset[200]);

            }else if(Number(km.value)>100){

                luar = Number(opt.dataset[100]);

            }

        }

        const total = Number(harga) + Number(luar);

        hargaInput.value = harga;
        luarInput.value = luar;
        totalInput.value = total;

        txtHarga.innerHTML = rupiah(harga);
        txtLuar.innerHTML = rupiah(luar);
        txtTotal.innerHTML = rupiah(total);

    }

    function validasi(){

        const lengkap =

            cekKtp.checked &&
            cekSim.checked &&
            (
                cekId.checked ||
                cekSlip.checked ||
                cekUsaha.checked
            );

        if(lengkap){

            btn.disabled = false;

            status.className="mt-5 rounded-xl bg-green-100 text-green-700 p-4";

            status.innerHTML="✔ Persyaratan dokumen sudah lengkap.";

        }else{

            btn.disabled = true;

            status.className="mt-5 rounded-xl bg-yellow-100 text-yellow-700 p-4";

            status.innerHTML="Lengkapi KTP + SIM + salah satu ID Karyawan / Slip Gaji / Tempat Usaha.";

        }

    }

    mobil.addEventListener('change',function(){

        hitungTanggal();
        hitung();

    });

    paket.addEventListener('change',function(){

        hitungTanggal();
        hitung();

    });

    perjalanan.addEventListener('change',hitung);

    km.addEventListener('input',hitung);

    tanggalPinjam.addEventListener('change',function(){

        hitungTanggal();
        hitung();

    });

    tanggalKembali.addEventListener('change',function(){

    hitungTanggal();

    hitung();

});

    cekKtp.addEventListener('change',validasi);
    cekSim.addEventListener('change',validasi);
    cekId.addEventListener('change',validasi);
    cekSlip.addEventListener('change',validasi);
    cekUsaha.addEventListener('change',validasi);

    hitungTanggal();
    hitung();
    validasi();

});
</script>