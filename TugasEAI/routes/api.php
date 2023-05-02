<?php

use App\Http\Controllers\API\KaryawanController;
use App\Http\Controllers\API\BarangController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('barang', [BarangController::class, 'index']);
Route::post('barang/store', [BarangController::class, 'store']);
Route::get('barang/show/{id}', [BarangController::class, 'show']);
Route::post('barang/update/{id}', [BarangController::class, 'update']);

Route::get('karyawan', [KaryawanController::class, 'index']);
Route::post('karyawan/store', [KaryawanController::class, 'store']);
Route::get('karyawan/show/{id}', [KaryawanController::class, 'show']);
Route::post('karyawan/update/{id}', [KaryawanController::class, 'update']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
