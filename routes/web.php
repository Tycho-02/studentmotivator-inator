<?php

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
Route::get("/tijdinstellingen", "App\Http\Controllers\TijdInstellingenController@index");

Route::get('/mobiel', [\App\Http\Controllers\MobielController::class, 'index']);
Route::get('/timer', [\App\Http\Controllers\TimerController::class, 'index']);
Route::post('/timer', [\App\Http\Controllers\TimerController::class, 'toevoegenTijd']);

