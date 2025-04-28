<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PeriksaController;
use App\Http\Controllers\Pasien\RiwayatController;
use App\Http\Controllers\Pasien\DashboardController;
use App\Http\Controllers\Pasien\DashboardController as PasienDashboardController;
use App\Http\Controllers\Pasien\PeriksaController as PasienPeriksaController;
use App\Http\Controllers\Pasien\RiwayatController as PasienRiwayatController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// DOKTER
Route::middleware(['auth', 'role:dokter'])->prefix('dokter')->name('dokter.')->group(function () {
    Route::resource('obat', ObatController::class);
    Route::resource('periksa', PeriksaController::class);
    Route::get('/periksa/{id}', [PeriksaController::class, 'show'])->name('periksa.show');
    Route::post('/periksa/{id}', [PeriksaController::class, 'store'])->name('periksa.store');
    Route::put('/periksa/{id}', [PeriksaController::class, 'update'])->name('periksa.update');
});

// PASIEN
Route::middleware(['auth', 'role:pasien'])->group(function () {
    Route::get('/pasien', [PasienDashboardController::class, 'index'])->name('pasien.dashboard');
    Route::get('/pasien/periksa', [PasienPeriksaController::class, 'index'])->name('pasien.periksa.index');
    Route::post('/pasien/periksa', [PasienPeriksaController::class, 'store'])->name('pasien.periksa.store');
    Route::get('/pasien/riwayat', [PasienRiwayatController::class, 'index'])->name('pasien.riwayat.index');
});