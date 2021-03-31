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
Route::get("/tijdinstellingen/edit", "App\Http\Controllers\TijdInstellingenController@edit"); 
//Route::put("/tijdinstellingen/update", "App\Http\Controllers\TijdInstellingenController@update"); 
Route::post('/update', [
    'uses' => 'App\Http\Controllers\TijdInstellingenController@update',
    'as' => 'tijdinstellingen.update',
]);

Route::get('/taken', [\App\Http\Controllers\TakenController::class, 'index']);
Route::get('/taken/create', [\App\Http\Controllers\TakenController::class, 'create']);
Route::post('/taken', [\App\Http\Controllers\TakenController::class, 'store']);
Route::get('/taakverwijderen/{id}', [\App\Http\Controllers\TakenController::class, 'destroy']);

Route::get("/afspeellijst", "App\Http\Controllers\AfspeellijstController@index");

Route::get("/nummers", "App\Http\Controllers\NummersController@index");

Route::get("/nummerToevoegen", "App\Http\Controllers\NummersController@show");
Route::post("/toevoegen", "App\Http\Controllers\NummersController@upload");

// Route::get('/mobiel', [\App\Http\Controllers\MobielController::class, 'index']);
Route::get('/timer', [\App\Http\Controllers\TimerController::class, 'index']);
Route::post('/timer', [\App\Http\Controllers\TimerController::class, 'toevoegenTijd']);

Route::get('/', function(){
    return view('layouts.app');
});


