<?php

use App\Http\Controllers\PendudukController;
use App\Http\Controllers\RukunTetanggaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [App\Http\Controllers\DashboardController::class, 'dashboard_warga'])->name('dashboard');

Auth::routes();
Route::get('/dashboard_user', [App\Http\Controllers\DashboardUserController::class, 'dashboard_user'])->name('dashboard_user');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/anggaran', [App\Http\Controllers\AnggaranController::class, 'index'])->name('anggaran');
Route::get('/spk', [App\Http\Controllers\SPKController::class, 'index'])->name('spk');

/* <!----- Penduduk ------> */
Route::controller(PendudukController::class)->group(function () {
    Route::get('/penduduk','index')->name('penduduk');
    Route::post('tambah_data_penduduk','tambah_penduduk')->name('tambah_penduduk');
    Route::get('/data_penduduk','data_penduduk')->name('data_penduduk');
    Route::patch('/data_penduduk','data_penduduk');
    Route::post('update_data_penduduk','edit')->name('update_data_penduduk');
    Route::post('/hapus_data_penduduk/{id}','hapus')->name('hapus_data_penduduk');
});
Route::controller(RukunTetanggaController::class)->group(function () {
    Route::get('/rukun_tetangga', 'data_rukun_tetangga')->name('data_rukun_tetangga');
    Route::get('/rt_penduduk', 'data_penduduk')->name('data_penduduk_rt');
    Route::post('edit_rukun_tetangga', 'edit_rukun_tetangga')->name('edit_rukun_tetangga');
});

/* <!----- User ------> */
Route::controller(UserController::class)->group(function () {
    Route::get('/user', 'index')->name('user');
    Route::get('/edit_user', 'edit_user')->name('edit_user');
    Route::post('simpan_user', 'simpan_user')->name('simpan_user');
});