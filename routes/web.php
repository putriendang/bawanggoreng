<?php

use App\Http\Controllers\BioController;
use App\Http\Controllers\HistoryController;
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

Route::get('', [BioController::class, 'index']);
Route::resources([
    'bio' => BioController::class,
    'history' => HistoryController::class,

]);
