<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NotifikasiController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\WaliController;
use Illuminate\Support\Facades\Route;

Route::middleware('role:Wali Murid')->group(function () {
    Route::get('home', [WaliController::class, 'index']);
    Route::get('absen', [WaliController::class, 'absenView']);
    Route::get('notifikasi', [NotifikasiController::class, 'index'])->name('notifikasi.index');
});

Route::middleware('role:Guru')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index']);
    Route::resource('absensi', AbsensiController::class);
    Route::resource('siswa', SiswaController::class);
    Route::post('import-excel', [SiswaController::class, 'importExcel'])->name('import.excel');
    Route::get('/siswa/{kelas}', [SiswaController::class, 'kelas'])->name('siswa.kelas');
});

Route::controller(LoginController::class)->group(function () {
    Route::get('/', 'index')->name('halamanLogin')->middleware('guest');
    Route::post('login', 'fungsiLogin')->middleware('guest');
    Route::get('daftar', 'halamanDaftar')->middleware('guest');
    Route::post('register', 'fungsiDaftar')->middleware('guest');
    Route::post('logout', 'fungsiLogout')->middleware('auth');
});

Route::delete('/notifikasi/delete', [NotifikasiController::class, 'postDelete'])->name('notifikasi.delete');
