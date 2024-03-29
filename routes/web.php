<?php

use App\Exports\SppExport;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Login;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Siswa;
use App\Http\Controllers\Spp;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/tpembayaran', [Spp::class, 'index']);
Route::post('/tpembayaran/save', [Spp::class, 'save']);
Route::get('/login', [Login::class, 'index'])->name('login');
Route::post('/login/proses', [Login::class, 'proses']);
Route::get('/logout', [Login::class, 'logout']);
Route::delete('/tpembayaran/delete/{id}', [Spp::class, 'delete'])->name('tpembayaran.delete');
Route::get('/tpembayaran/edit/{id}', [Spp::class, 'edit'])->name('tpembayaran.edit');
Route::put('/tpembayaran/delete/{id}', [Spp::class, 'update'])->name('tpembayaran.update');
Route::get('/siswa', [Siswa::class, 'index']);
Route::get('excel-export', [Spp::class, 'exportExcel']);
Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['cekUserLogin:admin']], function () {
        Route::resource('admin', Admin::class);
    });
    Route::group(['middleware' => ['cekUserLogin:siswa']], function () {
        Route::resource('siswa', Siswa::class);
    });
});
