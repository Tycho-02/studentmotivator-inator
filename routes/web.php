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

Route::get('/taken', [\App\Http\Controllers\TakenController::class, 'index']);
Route::get('/taken/add', [\App\Http\Controllers\TakenController::class, 'add']);
Route::post('/taaktoevoegen', [\App\Http\Controllers\TakenController::class, 'addTaak']);
Route::get('/taakverwijderen/{id}', [\App\Http\Controllers\TakenController::class, 'deleteTaak']);

Route::get('/', function () {
    return view('welcome');
});
