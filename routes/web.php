<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth'])->group(function () {

    Route::view('/dashboard', 'dashboard.index')
        ->name('dashboard');

});

require __DIR__.'/auth.php';