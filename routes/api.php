<?php

use App\Http\Controllers\Api\ProdukController;
use App\Http\Controllers\Api\NamaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('', [ProdukController::class, 'index']); 
Route::resources([
    'produk' => ProdukController::class,
    'namapelanggan' => NamaController::class,
]);
