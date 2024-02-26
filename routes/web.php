<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RumahController;
use App\Http\Controllers\KreditController;
use App\Http\Controllers\PembeliController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\PembelianController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [PembeliController::class, 'dashboard']);
Route::resource('/pembeli', PembeliController::class);
Route::resource('/rumah', RumahController::class);
Route::resource('/pemesanan', PesananController::class);
Route::resource('/kredit', KreditController::class);
Route::resource('/transaksi', PembelianController::class);
