@extends('layouts.app')

@section('title','Dashboard')

@section('content')

<div class="mb-8">

    <h1 class="text-3xl font-bold text-slate-800 dark:text-white">
        Dashboard
    </h1>

    <p class="mt-2 text-slate-500 dark:text-slate-400">
        Selamat datang di Sistem Informasi Rental Mobil.
    </p>

</div>

{{-- Statistik --}}
<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-5 gap-6">

    <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-lg p-6">
        <p class="text-slate-500">🚗 Total Mobil</p>
        <h2 class="text-4xl font-bold mt-2 dark:text-white">
            {{ $totalMobil }}
        </h2>
    </div>

    <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-lg p-6">
        <p class="text-slate-500">🟢 Mobil Ready</p>
        <h2 class="text-4xl font-bold mt-2 text-green-600">
            {{ $mobilReady }}
        </h2>
    </div>

    <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-lg p-6">
        <p class="text-slate-500">🔵 Mobil Dipakai</p>
        <h2 class="text-4xl font-bold mt-2 text-blue-600">
            {{ $mobilDipakai }}
        </h2>
    </div>

    <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-lg p-6">
        <p class="text-slate-500">🟠 Pengecekan</p>
        <h2 class="text-4xl font-bold mt-2 text-orange-500">
            {{ $mobilPengecekan }}
        </h2>
    </div>

    <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-lg p-6">
        <p class="text-slate-500">👤 Pelanggan</p>
        <h2 class="text-4xl font-bold mt-2 dark:text-white">
            {{ $totalPelanggan }}
        </h2>
    </div>

    <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-lg p-6">
        <p class="text-slate-500">📋 Penyewaan Aktif</p>
        <h2 class="text-4xl font-bold mt-2 dark:text-white">
            {{ $penyewaanAktif }}
        </h2>
    </div>

    <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-lg p-6">
        <p class="text-slate-500">💰 Pendapatan</p>
        <h2 class="text-2xl font-bold mt-2 text-green-600">
            Rp {{ number_format($pendapatan,0,',','.') }}
        </h2>
    </div>

    <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-lg p-6">
        <p class="text-slate-500">⚠️ Total Denda</p>
        <h2 class="text-2xl font-bold mt-2 text-red-600">
            Rp {{ number_format($totalDenda,0,',','.') }}
        </h2>
    </div>

    <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-lg p-6">
        <p class="text-slate-500">🛠️ Perlu Servis</p>
        <h2 class="text-4xl font-bold mt-2 text-yellow-600">
            {{ $mobilPerluServis->count() }}
        </h2>
    </div>

    <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-lg p-6">
        <p class="text-slate-500">🔴 Terlambat Servis</p>
        <h2 class="text-4xl font-bold mt-2 text-red-600">
            {{ $mobilServisTerlambat }}
        </h2>
    </div>

</div>

{{-- Operasional --}}
<div class="grid lg:grid-cols-2 gap-6 mt-8">

    <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-lg p-6">

        <h3 class="text-xl font-bold mb-5 dark:text-white">
            🔧 Mobil Harus Servis
        </h3>

        @forelse($mobilPerluServis as $mobil)

            <div class="border-b border-slate-200 dark:border-slate-700 py-3">

                <div class="font-semibold dark:text-white">
                    {{ $mobil->merk }} {{ $mobil->tipe }}
                </div>

                <div class="text-sm text-slate-500">
                    {{ $mobil->plat_nomor }}
                </div>

                <div class="text-red-600 font-semibold mt-1">
                    KM {{ number_format($mobil->kilometer) }}
                </div>

            </div>

        @empty

            <p class="text-green-600">
                Tidak ada kendaraan yang harus servis.
            </p>

        @endforelse

    </div>

    <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-lg p-6">

        <h3 class="text-xl font-bold mb-5 dark:text-white">
            🟡 Hampir Servis
        </h3>

        @forelse($mobilHampirServis as $mobil)

            <div class="border-b border-slate-200 dark:border-slate-700 py-3">

                <div class="font-semibold dark:text-white">
                    {{ $mobil->merk }} {{ $mobil->tipe }}
                </div>

                <div class="text-sm text-slate-500">
                    {{ $mobil->plat_nomor }}
                </div>

                <div class="text-yellow-600 font-semibold mt-1">
                    Sisa {{ number_format($mobil->km_servis_berikutnya - $mobil->kilometer) }} KM
                </div>

            </div>

        @empty

            <p class="text-green-600">
                Tidak ada kendaraan yang mendekati servis.
            </p>

        @endforelse

    </div>

</div>

{{-- STNK --}}
<div class="mt-8 bg-white dark:bg-slate-800 rounded-2xl shadow-lg p-6">

    <h3 class="text-xl font-bold mb-5 dark:text-white">
        📄 STNK Hampir Habis
    </h3>

    @forelse($stnkHampirHabis as $mobil)

        <div class="border-b border-slate-200 dark:border-slate-700 py-3">

            <div class="font-semibold dark:text-white">
                {{ $mobil->merk }} {{ $mobil->tipe }}
            </div>

            <div class="text-sm text-slate-500">
                {{ $mobil->plat_nomor }}
            </div>

            <div class="text-red-600 font-semibold mt-1">
                Berlaku sampai
                {{ \Carbon\Carbon::parse($mobil->masa_berlaku_stnk)->format('d-m-Y') }}
            </div>

        </div>

    @empty

        <p class="text-green-600">
            Tidak ada STNK yang akan habis.
        </p>

    @endforelse

</div>

@endsection