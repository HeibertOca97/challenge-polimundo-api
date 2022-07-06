<?php

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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    //return $request->user();
//});

Route::get('/passengers', [\App\Http\Controllers\PassengerController::class, 'index']);
Route::get('/passengers/{id}', [\App\Http\Controllers\PassengerController::class, 'show']);

Route::get('/tickets', [\App\Http\Controllers\TicketController::class, 'index']);
Route::get('/tickets/{id}', [\App\Http\Controllers\TicketController::class, 'show']);
