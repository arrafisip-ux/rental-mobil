<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PenyewaanController;
use App\Http\Controllers\TarifController;
use App\Http\Controllers\RiwayatOliController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PerawatanController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::resource('mobil', MobilController::class);

    Route::resource('pelanggan', PelangganController::class);

    Route::resource('penyewaan', PenyewaanController::class);
    Route::get(
    'penyewaan/{penyewaan}/pengembalian',
    [PenyewaanController::class,'pengembalian']
)->name('penyewaan.pengembalian');

Route::put(
    'penyewaan/{penyewaan}/pengembalian',
    [PenyewaanController::class,'selesai']
)->name('penyewaan.selesai');

    Route::resource('tarif', TarifController::class);

    Route::resource('riwayat-oli', RiwayatOliController::class);

    Route::resource('laporan', LaporanController::class);
    Route::resource('perawatan', PerawatanController::class);

});

require __DIR__.'/auth.php';