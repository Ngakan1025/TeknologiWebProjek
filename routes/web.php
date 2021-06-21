<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PinjamController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\User;

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
    return view('welcome');
});

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard')->middleware(['auth:sanctum', 'verified']);

Route::group(['middleware' => 'admin'], function() {
    Route::resource('buku', BukuController::class);
    Route::resource('kategori', KategoriController::class);
    Route::get('/cari', [BukuController::class, 'cari']);
    Route::resource('pinjam', PinjamController::class);
    Route::resource('daftar', DaftarController::class);
    Route::get('/cari', [DaftarController::class, 'cari']);
    Route::resource('user', UserController::class);
});
Route::group(['middleware' => 'user'], function() {
    Route::resource('daftar', DaftarController::class);
    Route::get('/cari', [DaftarController::class, 'cari']);
});