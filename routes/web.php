<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PenyewaanController;


Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth'])->group(function () {

    Route::view('/dashboard','dashboard.index')
        ->name('dashboard');

    Route::resource('mobil', MobilController::class);

    Route::resource('pelanggan', PelangganController::class);

    Route::resource('penyewaan', PenyewaanController::class);

    Route::view('/tarif','tarif.index')
        ->name('tarif.index');

    Route::view('/riwayat-oli','riwayat-oli.index')
        ->name('riwayat-oli.index');

    Route::view('/laporan','laporan.index')
        ->name('laporan.index');

});
require __DIR__.'/auth.php';