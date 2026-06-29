<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PenyewaanController;


Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth'])->group(function () {

    Route::view('/dashboard', 'dashboard.index')
        ->name('dashboard');

    Route::resource('mobil', MobilController::class);

    Route::resource('pelanggan', PelangganController::class);

    Route::resource('penyewaan', PenyewaanController::class);

});

require __DIR__.'/auth.php';