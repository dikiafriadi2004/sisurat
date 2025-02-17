<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanPajakHiburanController;
use App\Http\Controllers\LaporanPajakHotelController;
use App\Http\Controllers\LaporanPajakRestoranController;
use App\Http\Controllers\PajakHiburanController;
use App\Http\Controllers\PajakHotelController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PajakRestoranController;
use App\Models\LaporanPajakRestoran;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/', [DashboardController::class, 'index'])->name('admin.index');

    // Restoran
    Route::get('/restoran', [PajakRestoranController::class, 'index'])->name('restoran.index');
    Route::get('/restoran/create', [PajakRestoranController::class, 'create'])->name('restoran.create');
    Route::post('/restoran/store', [PajakRestoranController::class, 'store'])->name('restoran.store');
    Route::get('/restoran/{id}/edit', [PajakRestoranController::class, 'edit'])->name('restoran.edit');
    Route::get('/restoran/{id}', [PajakRestoranController::class, 'show'])->name('restoran.detail');
    Route::put('/restoran/{id}', [PajakRestoranController::class, 'update'])->name('restoran.update');
    Route::delete('/restoran/{id}', [PajakRestoranController::class, 'destroy'])->name('restoran.destroy');

    // Hotel
    Route::get('/hotel', [PajakHotelController::class, 'index'])->name('hotel.index');
    Route::get('/hotel/create', [PajakHotelController::class, 'create'])->name('hotel.create');
    Route::post('/hotel/store', [PajakHotelController::class, 'store'])->name('hotel.store');
    Route::get('/hotel/{id}/edit', [PajakHotelController::class, 'edit'])->name('hotel.edit');
    Route::get('/hotel/{id}', [PajakHotelController::class, 'show'])->name('hotel.detail');
    Route::put('/hotel/{id}', [PajakHotelController::class, 'update'])->name('hotel.update');
    Route::delete('/hotel/{id}', [PajakHotelController::class, 'destroy'])->name('hotel.destroy');

    // Hiburan
    Route::get('/hiburan', [PajakHiburanController::class, 'index'])->name('hiburan.index');
    Route::get('/hiburan/create', [PajakHiburanController::class, 'create'])->name('hiburan.create');
    Route::post('/hiburan/store', [PajakHiburanController::class, 'store'])->name('hiburan.store');
    Route::get('/hiburan/{id}/edit', [PajakHiburanController::class, 'edit'])->name('hiburan.edit');
    Route::get('/hiburan/{id}', [PajakHiburanController::class, 'show'])->name('hiburan.detail');
    Route::put('/hiburan/{id}', [PajakHiburanController::class, 'update'])->name('hiburan.update');
    Route::delete('/hiburan/{id}', [PajakHiburanController::class, 'destroy'])->name('hiburan.destroy');

    // Laporan Restoran
    Route::get('/add/laporan/restoran/{pajakrestoran:slug}', [LaporanPajakRestoranController::class, 'create'])->name('laporanpajakrestoran.create');
    Route::post('/add/laporan/restoran/{pajakrestoran:slug}/store', [LaporanPajakRestoranController::class, 'store'])->name('laporanpajakrestoran.store');

    // Surat Pemberitahuan Restoran
    Route::get('/surat/laporan/restoran/{pajakrestoran:slug}/pemberitahuan/{laporanpajakrestoran}', [LaporanPajakRestoranController::class, 'getsuratpemberitahuan'])->name('laporanpajakrestoran.getsuratpemberitahuan');

    Route::put('/surat/laporan/pemberitahuan/{laporanpajakrestoran}/suratpemberitahuan', [LaporanPajakRestoranController::class, 'suratpemberitahuan'])->name('laporanpajakrestoran.suratpemberitahuan');

    // Surat Teguran Restoran
    Route::get('/surat/laporan/restoran/{pajakrestoran:slug}/teguran/{laporanpajakrestoran}', [LaporanPajakRestoranController::class, 'getsuratteguran'])->name('laporanpajakrestoran.getsuratteguran');

    Route::put('/surat/laporan/teguran/{laporanpajakrestoran}/suratteguran', [LaporanPajakRestoranController::class, 'suratteguran'])->name('laporanpajakrestoran.suratteguran');

    // Download Surat Pemberitahuan dan Teguran Restoran
    Route::post('restoran/surat/pemberitahuan/download/{id}', [LaporanPajakRestoranController::class, 'downloadsuratpemberitahuan'])->name('restoran.downloadsuratpemberitahuan');

    Route::post('restoran/surat/teguran/download/{id}', [LaporanPajakRestoranController::class, 'downloadsuratteguran'])->name('restoran.downloadsuratteguran');



    // Laporan Hotel
    Route::get('/add/laporan/hotel/{pajakhotel:slug}', [LaporanPajakHotelController::class, 'create'])->name('laporanpajakhotel.create');
    Route::post('/add/laporan/hotel/{pajakhotel:slug}/store', [LaporanPajakHotelController::class, 'store'])->name('laporanpajakhotel.store');

    // Laporan Hiburan
    Route::get('/add/laporan/hiburan/{pajakhiburan:slug}', [LaporanPajakHiburanController::class, 'create'])->name('laporanpajakhiburan.create');
    Route::post('/add/laporan/hiburan/{pajakhiburan:slug}/store', [LaporanPajakHiburanController::class, 'store'])->name('laporanpajakhiburan.store');

});

require __DIR__ . '/auth.php';
