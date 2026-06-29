<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MobilController;


Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth'])->group(function () {

    Route::view('/dashboard', 'dashboard.index')
        ->name('dashboard');

    Route::resource('mobil', MobilController::class);
    Route::resource('pelanggan', App\Http\Controllers\PelangganController::class);

});

require __DIR__.'/auth.php';