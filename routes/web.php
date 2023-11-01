<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminKeberangkatancontroller;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\registerController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Keberangkatan\DetailKeberangkatanController;
use App\Http\Controllers\Keberangkatan\KeberangkatanController;
use App\Http\Controllers\Penumpang\FormPesananController;
use App\Http\Controllers\Penumpang\KursiController;
use App\Http\Controllers\Penumpang\ListKeberangkatanController;
use App\Http\Controllers\Penumpang\MyticketController;
use App\Http\Controllers\Penumpang\PembayaranController;
use App\Http\Controllers\Penumpang\ticketController;
use Illuminate\Support\Facades\Route;

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


// Route::get('/test', function () {
//     return view('test');
// });

Route::resource('/register', registerController::class);

Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LoginController::class, 'logout']);

// Route::resource('/login', LoginController::class)->middleware('guest');










Route::resource('/', HomeController::class);

Route::resource('/admin', AdminController::class);
Route::resource('/keberangkatan', KeberangkatanController::class);
Route::resource('/form-keberangkatan', AdminKeberangkatancontroller::class);
Route::resource('/kursi', KursiController::class);
Route::resource('/pembayaran', PembayaranController::class);
Route::resource('/my-ticket', MyticketController::class);
Route::resource('/ticket', ticketController::class);








//penumpang


Route::resource('/list-keberangkatan', ListKeberangkatanController::class);
Route::resource('/form-pesanan', FormPesananController::class);




// Route::middleware(['auth'])->group(function () {
//     Route::post('logout', [App\Http\Controllers\Auth\AuthController::class, 'logout']);
//     // Route::resource('logout', [App\Http\Controllers\Auth\AuthController::class, 'logout']);

// });
