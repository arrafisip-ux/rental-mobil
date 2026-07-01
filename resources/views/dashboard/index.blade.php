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

<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-5 gap-6">

    <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-lg p-6">

        <p class="text-slate-500 dark:text-slate-400">

            🚗 Total Mobil

        </p>

        <h2 class="text-4xl font-bold mt-3 text-slate-800 dark:text-white">

            {{ $totalMobil }}

        </h2>

    </div>

    <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-lg p-6">

        <p class="text-slate-500 dark:text-slate-400">

            👤 Total Pelanggan

        </p>

        <h2 class="text-4xl font-bold mt-3 text-slate-800 dark:text-white">

            {{ $totalPelanggan }}

        </h2>

    </div>

    <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-lg p-6">

        <p class="text-slate-500 dark:text-slate-400">

            📋 Penyewaan Aktif

        </p>

        <h2 class="text-4xl font-bold mt-3 text-slate-800 dark:text-white">

            {{ $penyewaanAktif }}

        </h2>

    </div>

    <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-lg p-6">

        <p class="text-slate-500 dark:text-slate-400">

            💰 Pendapatan

        </p>

        <h2 class="text-2xl font-bold mt-3 text-green-600">

            Rp {{ number_format($pendapatan,0,',','.') }}

        </h2>

    </div>

    <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-lg p-6">

        <p class="text-slate-500 dark:text-slate-400">

            🛢 Mobil Perlu Ganti Oli

        </p>

        <h2 class="text-4xl font-bold mt-3 text-red-600">

            {{ $mobilPerluOli }}

        </h2>

    </div>

</div>

<div class="mt-8 bg-white dark:bg-slate-800 rounded-2xl shadow-lg p-8">

    <h3 class="text-xl font-semibold text-slate-800 dark:text-white mb-4">

        Ringkasan Sistem

    </h3>

    <div class="grid md:grid-cols-2 gap-6">

        <div>

            <ul class="space-y-3 text-slate-700 dark:text-slate-300">

                <li>✅ Data Mobil</li>

                <li>✅ Data Pelanggan</li>

                <li>✅ Penyewaan Mobil</li>

                <li>✅ Tarif Rental</li>

                <li>✅ Riwayat Ganti Oli</li>

            </ul>

        </div>

        <div>

            <div class="bg-blue-50 dark:bg-slate-700 rounded-xl p-6">

                <h4 class="font-semibold text-blue-700 dark:text-blue-300">

                    Informasi

                </h4>

                <p class="mt-3 text-slate-600 dark:text-slate-300">

                    Dashboard ini menampilkan statistik utama Sistem Informasi Rental Mobil secara realtime berdasarkan data yang tersimpan pada database.

                </p>

            </div>

        </div>

    </div>

</div>

@endsection