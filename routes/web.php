<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PeriksaController;
use App\Http\Controllers\RiwayatPasienController;
use App\Http\Controllers\Pasien\RiwayatController;
use App\Http\Controllers\Pasien\DashboardController;
use App\Http\Controllers\Pasien\DashboardController as PasienDashboardController;
use App\Http\Controllers\Pasien\PeriksaController as PasienPeriksaController;
use App\Http\Controllers\Pasien\RiwayatController as PasienRiwayatController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\PoliController;
use App\Http\Controllers\Admin\DokterController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Redirect ke dashboard masing-masing
Route::middleware(['auth', 'role:admin'])->get('/admin', function () {
    return redirect()->route('admin.dashboard');
});

Route::middleware(['auth', 'role:dokter'])->get('/dokter', function () {
    return redirect()->route('dokter.periksa.index'); // atau rute dashboard jika ada
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/get-dokter-by-poli/{id}', function ($id) {
    return \App\Models\User::where('role', 'dokter')->where('id_poli', $id)->get();
});


// DOKTER
Route::middleware(['auth', 'role:dokter'])->prefix('dokter')->name('dokter.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\DokterDashboardController::class, 'index'])->name('dashboard');
    Route::resource('obat', ObatController::class);
    Route::resource('periksa', PeriksaController::class);
    Route::get('/periksa/{id}', [PeriksaController::class, 'show'])->name('periksa.show');
    Route::post('/periksa/{id}', [PeriksaController::class, 'store'])->name('periksa.store');
    Route::put('/periksa/{id}', [PeriksaController::class, 'update'])->name('periksa.update');
    Route::get('/riwayat', [RiwayatPasienController::class, 'index'])->name('riwayat.index');
    Route::get('/riwayat/{id}', [RiwayatPasienController::class, 'detail'])->name('riwayat.detail');

    Route::get('/jadwal', [PeriksaController::class, 'jadwal'])->name('jadwal');
    Route::post('/jadwal', [PeriksaController::class, 'simpanJadwal'])->name('jadwal.store');
    Route::put('/jadwal/status/{id}', [PeriksaController::class, 'ubahStatusJadwal'])->name('jadwal.status');

    Route::get('/periksa', [PeriksaController::class, 'index'])->name('periksa.index');
    Route::get('/periksa/{id}/form', [PeriksaController::class, 'form'])->name('periksa.form');
    Route::post('/periksa/{id}/form', [PeriksaController::class, 'simpanPeriksa'])->name('periksa.simpan');
    Route::get('/periksa/{id}/edit', [PeriksaController::class, 'edit'])->name('periksa.edit');
    Route::put('/periksa/{id}/edit', [PeriksaController::class, 'update'])->name('periksa.update');

    Route::get('/profil', [PeriksaController::class, 'profil'])->name('profil');
    Route::put('/profil', [PeriksaController::class, 'updateProfil'])->name('profil.update');
});

// PASIEN
Route::middleware(['auth', 'role:pasien'])->prefix('pasien')->name('pasien.')->group(function () {
    Route::get('/', [PasienDashboardController::class, 'index'])->name('pasien.dashboard');
    Route::get('/periksa', [PasienPeriksaController::class, 'index'])->name('periksa.index');
    Route::post('/periksa', [PasienPeriksaController::class, 'store'])->name('periksa.store');
    Route::get('/riwayat', [PasienRiwayatController::class, 'index'])->name('riwayat.index');
    Route::get('/periksa/{id}', [PasienPeriksaController::class, 'show'])->name('periksa.show');
});

use App\Models\JadwalPeriksa;
use App\Models\User;

Route::get('/get-jadwal-by-poli/{id}', function ($id) {
    $jadwals = JadwalPeriksa::whereHas('dokter', function ($query) use ($id) {
        $query->where('id_poli', $id);
    })->where('status', 1)->with('dokter')->get();

    return response()->json($jadwals->map(function ($jadwal) {
        return [
            'id' => $jadwal->id,
            'hari' => $jadwal->hari,
            'jam_mulai' => $jadwal->jam_mulai,
            'jam_selesai' => $jadwal->jam_selesai,
            'dokter' => $jadwal->dokter->name ?? '-',
        ];
    }));
});

//ADMIN
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('poli', PoliController::class);
    Route::resource('dokter', DokterController::class);
    Route::resource('pasien', App\Http\Controllers\Admin\PasienController::class);
    Route::resource('obat', App\Http\Controllers\Admin\ObatController::class);
});