<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PeriksaController;
use App\Http\Controllers\Pasien\DashboardController as PasienDashboardController;
use App\Http\Controllers\Pasien\PeriksaController as PasienPeriksaController;
use App\Http\Controllers\Pasien\RiwayatController as PasienRiwayatController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dokter', [HomeController::class, 'dokter'])-> name('dokter');


Route::prefix('dokter')->group (function(){
    Route::resource('obat', ObatController::class);
    Route::resource('periksa', PeriksaController::class);
});

Route::prefix('dokter')->name('dokter.')->group(function () {
    Route::post('/obat/store', [ObatController::class, 'store'])->name('obat.store');
});


// DOKTER
Route::get('/dokter', fn() => view('dokter.index'))->name('dokter.dashboard');
Route::get('/dokter/periksa', fn() => view('dokter.periksa.index'))->name('dokter.periksa');
Route::get('/dokter/obat', fn() => view('dokter.obat.index'))->name('dokter.obat');

// PASIEN
Route::get('/pasien', [PasienDashboardController::class, 'index'])->name('pasien.dashboard');
Route::get('/pasien/periksa', [PasienPeriksaController::class, 'index'])->name('pasien.periksa.index');
Route::post('/pasien/periksa', [PasienPeriksaController::class, 'store'])->name('pasien.periksa.store');
Route::get('/pasien/riwayat', [PasienRiwayatController::class, 'index'])->name('pasien.riwayat.index');



