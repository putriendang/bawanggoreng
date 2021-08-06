<?php

use App\Http\Controllers\Api\BiosController;
use App\Http\Controllers\Api\HistorysController;
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

Route::get('', [BioController::class, 'index']); 
Route::get('', [HistoryController::class, 'index']); 
Route::resources([
    'bios' => BiosController::class,
    'history' =>HistorysController::class,
]);