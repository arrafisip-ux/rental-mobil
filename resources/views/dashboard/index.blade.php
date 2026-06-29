@extends('layouts.app')

@section('content')

<div class="mb-8">

    <h1 class="text-3xl font-bold text-slate-800 dark:text-white">
        Dashboard
    </h1>

    <p class="mt-2 text-slate-500 dark:text-slate-400">
        Selamat datang di Sistem Informasi Rental Mobil.
    </p>

</div>

<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

    <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-lg p-6 transition">

        <p class="text-slate-500 dark:text-slate-400">
            🚗 Total Mobil
        </p>

        <h2 class="text-4xl font-bold mt-3 text-slate-800 dark:text-white">
            0
        </h2>

    </div>

    <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-lg p-6 transition">

        <p class="text-slate-500 dark:text-slate-400">
            👤 Pelanggan
        </p>

        <h2 class="text-4xl font-bold mt-3 text-slate-800 dark:text-white">
            0
        </h2>

    </div>

    <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-lg p-6 transition">

        <p class="text-slate-500 dark:text-slate-400">
            📋 Penyewaan Aktif
        </p>

        <h2 class="text-4xl font-bold mt-3 text-slate-800 dark:text-white">
            0
        </h2>

    </div>

    <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-lg p-6 transition">

        <p class="text-slate-500 dark:text-slate-400">
            💰 Pendapatan
        </p>

        <h2 class="text-4xl font-bold mt-3 text-slate-800 dark:text-white">
            Rp0
        </h2>

    </div>

</div>

@endsection