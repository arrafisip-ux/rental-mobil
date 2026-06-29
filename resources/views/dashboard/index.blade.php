@extends('layouts.app')

@section('content')

<div class="mb-8">

    <h1 class="text-3xl font-bold text-slate-800">
        Dashboard
    </h1>

    <p class="text-slate-500 mt-2">
        Selamat datang di Sistem Informasi Rental Mobil.
    </p>

</div>

<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

    <div class="bg-white rounded-2xl shadow p-6">
        <p class="text-slate-500">🚗 Total Mobil</p>
        <h2 class="text-4xl font-bold mt-3">0</h2>
    </div>

    <div class="bg-white rounded-2xl shadow p-6">
        <p class="text-slate-500">👤 Pelanggan</p>
        <h2 class="text-4xl font-bold mt-3">0</h2>
    </div>

    <div class="bg-white rounded-2xl shadow p-6">
        <p class="text-slate-500">📋 Penyewaan Aktif</p>
        <h2 class="text-4xl font-bold mt-3">0</h2>
    </div>

    <div class="bg-white rounded-2xl shadow p-6">
        <p class="text-slate-500">💰 Pendapatan</p>
        <h2 class="text-4xl font-bold mt-3">
            Rp0
        </h2>
    </div>

</div>

@endsection