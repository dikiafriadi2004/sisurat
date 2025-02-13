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

    // Laporan Hotel
    Route::get('/add/laporan/hotel/{pajakhotel:slug}', [LaporanPajakHotelController::class, 'create'])->name('laporanpajakhotel.create');
    Route::post('/add/laporan/hotel/{pajakhotel:slug}/store', [LaporanPajakHotelController::class, 'store'])->name('laporanpajakhotel.store');

    // Laporan Hiburan
    Route::get('/add/laporan/hiburan/{pajakhiburan:slug}', [LaporanPajakHiburanController::class, 'create'])->name('laporanpajakhiburan.create');
    Route::post('/add/laporan/hiburan/{pajakhiburan:slug}/store', [LaporanPajakHiburanController::class, 'store'])->name('laporanpajakhiburan.store');

    // Surat Pemberitahuan
    Route::get('restoran/surat/{id}', [PajakRestoranController::class, 'getbuatsuratpemberitahuan'])->name('restoran.getbuatsuratpemberitahuan');
    Route::put('restoran/surat/{id}', [PajakRestoranController::class, 'buatsuratpemberitahuan'])->name('restoran.buatsuratpemberitahuan');

    // Route::get('restoran/surat/download/{id}', [PajakRestoranController::class, 'getdownloadsuratpemberitahuan'])->name('restoran.getdownloadsuratpemberitahuan');

    Route::post('restoran/surat/download/{id}', [PajakRestoranController::class, 'suratpemberitahuan'])->name('restoran.suratpemberitahuan');
});

require __DIR__ . '/auth.php';
