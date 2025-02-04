<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PajakHiburanController;
use App\Http\Controllers\PajakHotelController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PajakRestoranController;

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
    Route::put('/restoran/{id}', [PajakRestoranController::class, 'update'])->name('restoran.update');
    Route::delete('/restoran/{id}', [PajakRestoranController::class, 'destroy'])->name('restoran.destroy');

    // Hotel
    Route::get('/hotel', [PajakHotelController::class, 'index'])->name('hotel.index');
    Route::get('/hotel/create', [PajakHotelController::class, 'create'])->name('hotel.create');
    Route::post('/hotel/store', [PajakHotelController::class, 'store'])->name('hotel.store');
    Route::get('/hotel/{id}/edit', [PajakHotelController::class, 'edit'])->name('hotel.edit');
    Route::put('/hotel/{id}', [PajakHotelController::class, 'update'])->name('hotel.update');
    Route::delete('/hotel/{id}', [PajakHotelController::class, 'destroy'])->name('hotel.destroy');

    // Hiburan
    Route::get('/hiburan', [PajakHiburanController::class, 'index'])->name('hiburan.index');
    Route::get('/hiburan/create', [PajakHiburanController::class, 'create'])->name('hiburan.create');
    Route::post('/hiburan/store', [PajakHiburanController::class, 'store'])->name('hiburan.store');
    Route::get('/hiburan/{id}/edit', [PajakHiburanController::class, 'edit'])->name('hiburan.edit');
    Route::put('/hiburan/{id}', [PajakHiburanController::class, 'update'])->name('hiburan.update');
    Route::delete('/hiburan/{id}', [PajakHiburanController::class, 'destroy'])->name('hiburan.destroy');
});

require __DIR__.'/auth.php';
