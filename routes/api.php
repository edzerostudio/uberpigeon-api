<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\PigeonController;

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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/deliveries', [DeliveryController::class, 'index']);
Route::post('/deliveries', [DeliveryController::class, 'store']);

Route::get('/pigeons', [PigeonController::class, 'index']);
Route::post('/pigeons', [PigeonController::class, 'store']);