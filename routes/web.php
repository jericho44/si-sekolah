<?php

use App\Http\Controllers\Admin\KecamatanController;
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

Route::get('/', function () {
    return view('admin.app');
});

Route::resource('/kecamatan', '\App\Http\Controllers\Admin\KecamatanController');
Route::resource('/desa', '\App\Http\Controllers\Admin\DesaController');
Route::resource('/sekolah', '\App\Http\Controllers\Admin\SekolahController');
Route::resource('/guru', '\App\Http\Controllers\Admin\GuruController');
Route::resource('/siswa', '\App\Http\Controllers\Admin\SiswaController');
Route::resource('/ruangan', '\App\Http\Controllers\Admin\RuanganController');
Route::resource('/pengumuman', '\App\Http\Controllers\Admin\PengumumanController');
