<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NotifikasiController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\WaliController;
use Illuminate\Support\Facades\Route;

Route::controller(LoginController::class)->group(function () {
    Route::get('/', 'index');
    Route::post('login', 'fungsiLogin');
    Route::get('daftar', 'halamanDaftar');
    Route::post('register', 'fungsiDaftar');
});
route::post('logout', [LoginController::class, 'fungsiLogout'])->middleware('auth');


Route::get('dashboard', [DashboardController::class, 'index']);
Route::get('home', [WaliController::class, 'index']);
Route::get('absen', [WaliController::class, 'absenView']);
Route::get('notifikasi', [NotifikasiController::class, 'index']);
Route::resource('absensi', AbsensiController::class);
Route::resource('siswa', SiswaController::class);
Route::post('import-excel', [SiswaController::class, 'importExcel'])->name('import.excel');
Route::get('/siswa/{kelas}', 'SiswaController@kelas')->name('siswa.kelas');
