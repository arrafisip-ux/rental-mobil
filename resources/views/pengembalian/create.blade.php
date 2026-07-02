@extends('layouts.app')

@section('title','Pengembalian Kendaraan')

@section('content')

<div class="max-w-7xl mx-auto">

    <div class="flex justify-between items-center mb-8">

        <div>

            <h1 class="text-3xl font-bold text-slate-800 dark:text-white">
                Pengembalian Kendaraan
            </h1>

            <p class="mt-2 text-slate-500 dark:text-slate-400">
                Selesaikan transaksi penyewaan dan hitung biaya otomatis.
            </p>

        </div>

    </div>

    @if ($errors->any())

        <div class="mb-6 rounded-xl bg-red-100 border border-red-300 p-4">

            <ul class="list-disc ml-5 text-red-700">

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif

    <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-lg p-8">

        <form
            action="{{ route('penyewaan.selesai',$penyewaan) }}"
            method="POST">

            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div>

                    <label class="block font-semibold mb-2 dark:text-white">
                        Nomor Transaksi
                    </label>

                    <input
                        value="{{ $penyewaan->no_transaksi }}"
                        readonly
                        class="w-full rounded-xl bg-slate-100 dark:bg-slate-700">

                </div>

                <div>

                    <label class="block font-semibold mb-2 dark:text-white">
                        Pelanggan
                    </label>

                    <input
                        value="{{ $penyewaan->pelanggan->nama }}"
                        readonly
                        class="w-full rounded-xl bg-slate-100 dark:bg-slate-700">

                </div>

                <div>

                    <label class="block font-semibold mb-2 dark:text-white">
                        Mobil
                    </label>

                    <input
                        value="{{ $penyewaan->mobil->merk }} {{ $penyewaan->mobil->tipe }}"
                        readonly
                        class="w-full rounded-xl bg-slate-100 dark:bg-slate-700">

                </div>

                <div>

                    <label class="block font-semibold mb-2 dark:text-white">
                        Plat Nomor
                    </label>

                    <input
                        value="{{ $penyewaan->mobil->plat_nomor }}"
                        readonly
                        class="w-full rounded-xl bg-slate-100 dark:bg-slate-700">

                </div>

                <div>

                    <label class="block font-semibold mb-2 dark:text-white">
                        KM Awal
                    </label>

                    <input
                        id="km_awal"
                        value="{{ $penyewaan->km_awal }}"
                        readonly
                        class="w-full rounded-xl bg-slate-100 dark:bg-slate-700">

                </div>

                <div>

                    <label class="block font-semibold mb-2 dark:text-white">
                        KM Akhir
                    </label>

                    <input
                        type="number"
                        id="km_akhir"
                        name="km_akhir"
                        required
                        class="w-full rounded-xl">

                </div>

                <div>

                    <label class="block font-semibold mb-2 dark:text-white">
                        Tanggal Kembali
                    </label>

                    <input
                        type="datetime-local"
                        name="tanggal_kembali"
                        required
                        class="w-full rounded-xl">

                </div>

                <div>

                    <label class="block font-semibold mb-2 dark:text-white">
                        Kondisi Kendaraan
                    </label>

                    <textarea
                        name="kondisi_kembali"
                        rows="3"
                        class="w-full rounded-xl"></textarea>

                </div>

            </div>

            <hr class="my-8">

<h2 class="text-2xl font-bold mb-6 dark:text-white">
    Perhitungan Pengembalian
</h2>

<div class="grid md:grid-cols-2 gap-6">

    <div class="space-y-4">

        <div>
            <label class="font-semibold dark:text-white">
                Total KM
            </label>

            <input
                id="total_km"
                name="total_km"
                readonly
                class="w-full rounded-xl bg-slate-100 dark:bg-slate-700">
        </div>

        <div>
            <label class="font-semibold dark:text-white">
                Jam Overtime
            </label>

            <input
                type="number"
                id="jam_overtime"
                name="jam_overtime"
                value="0"
                class="w-full rounded-xl">
        </div>

        <div>
            <label class="font-semibold dark:text-white">
                Biaya Overtime
            </label>

            <input
                id="overtime"
                name="overtime"
                readonly
                class="w-full rounded-xl bg-slate-100 dark:bg-slate-700">
        </div>

        <div>
            <label class="font-semibold dark:text-white">
                Denda
            </label>

            <input
                type="number"
                id="denda"
                name="denda"
                value="0"
                class="w-full rounded-xl">
        </div>

    </div>

    <div class="bg-green-50 dark:bg-green-900 rounded-2xl p-8 flex flex-col justify-center">

        <p class="text-center text-lg">
            TOTAL PEMBAYARAN
        </p>

        <h1
            id="grand_total"
            class="text-center text-5xl font-bold text-green-700 mt-4">

            Rp0

        </h1>

        <input
            type="hidden"
            id="total_bayar"
            name="total_bayar"
            value="{{ $penyewaan->total_bayar }}">

    </div>

</div>

<div class="mt-8 flex gap-4">

    <button
        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl">

        Selesaikan Penyewaan

    </button>

    <a
        href="{{ route('penyewaan.index') }}"
        class="bg-slate-500 hover:bg-slate-600 text-white px-6 py-3 rounded-xl">

        Batal

    </a>

</div>

</form>

</div>

</div>

@endsection

@push('scripts')

<script>

const kmAwal=document.getElementById('km_awal');
const kmAkhir=document.getElementById('km_akhir');

const totalKm=document.getElementById('total_km');

const jamOvertime=document.getElementById('jam_overtime');

const overtime=document.getElementById('overtime');

const denda=document.getElementById('denda');

const grand=document.getElementById('grand_total');

const total=document.getElementById('total_bayar');

const biayaAwal={{ $penyewaan->total_bayar }};

const tarifOT={{ $penyewaan->mobil->tarif->overtime_per_jam ?? 0 }};

function hitung(){

    let km=(parseInt(kmAkhir.value||0)-parseInt(kmAwal.value||0));

    if(km<0) km=0;

    totalKm.value=km;

    let ot=(parseInt(jamOvertime.value||0)*tarifOT);

    overtime.value=ot;

    let totalBayar=biayaAwal+ot+parseInt(denda.value||0);

    total.value=totalBayar;

    grand.innerHTML='Rp'+Number(totalBayar).toLocaleString('id-ID');

}

kmAkhir.addEventListener('keyup',hitung);
kmAkhir.addEventListener('change',hitung);

jamOvertime.addEventListener('keyup',hitung);
jamOvertime.addEventListener('change',hitung);

denda.addEventListener('keyup',hitung);
denda.addEventListener('change',hitung);

hitung();

</script>

@endpush