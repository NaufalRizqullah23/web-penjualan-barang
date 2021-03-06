<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\barangController;
use App\Http\Controllers\PenjualanController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[barangController::class,'index'])->name('index');
Route::get('/create',[barangController::class,'create']);
Route::post('/store',[barangController::class,'store']);
Route::get('/show/{id}',[barangController::class,'show']);
Route::get('/beli/{id}',[PenjualanController::class,'beli'])->name('beli');
Route::post('/aksiBeli',[PenjualanController::class,'aksiBeli']);
Route::get('/dataPenjualan',[PenjualanController::class,'getDataPenjualan'])->name('dataPenjualan');
