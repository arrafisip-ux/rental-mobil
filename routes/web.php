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
use App\Http\Controllers\PemakaianPribadiController;
use App\Http\Controllers\CekKendaraanController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Dashboard
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | Master Data
    |--------------------------------------------------------------------------
    */

    Route::resource('mobil', MobilController::class);

    Route::resource('pelanggan', PelangganController::class);

    Route::resource('tarif', TarifController::class);

    /*
    |--------------------------------------------------------------------------
    | Transaksi Penyewaan
    |--------------------------------------------------------------------------
    */

    Route::resource('penyewaan', PenyewaanController::class);

    Route::get(
        'penyewaan/{penyewaan}/pengembalian',
        [PenyewaanController::class, 'pengembalian']
    )->name('penyewaan.pengembalian');

    Route::put(
        'penyewaan/{penyewaan}/pengembalian',
        [PenyewaanController::class, 'selesai']
    )->name('penyewaan.selesai');

    /*
    |--------------------------------------------------------------------------
    | Operasional
    |--------------------------------------------------------------------------
    */

    Route::resource('perawatan', PerawatanController::class);

    Route::resource(
        'pemakaian-pribadi',
        PemakaianPribadiController::class
    );

    Route::resource(
        'cek-kendaraan',
        CekKendaraanController::class
    );

    Route::resource('riwayat-oli', RiwayatOliController::class);

    /*
|--------------------------------------------------------------------------
| Laporan
|--------------------------------------------------------------------------
*/

Route::get(
    'laporan/print',
    [LaporanController::class, 'print']
)->name('laporan.print');

Route::get(
    'laporan/pdf',
    [LaporanController::class, 'pdf']
)->name('laporan.pdf');

Route::resource('laporan', LaporanController::class);

});

require __DIR__.'/auth.php';