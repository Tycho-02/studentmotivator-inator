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
Route::get('/taken/add', [\App\Http\Controllers\TakenController::class, 'add']);
Route::post('/taaktoevoegen', [\App\Http\Controllers\TakenController::class, 'addTaak']);
Route::get('/taakverwijderen/{id}', [\App\Http\Controllers\TakenController::class, 'deleteTaak']);

Route::get("/afspeellijst", "App\Http\Controllers\AfspeellijstController@index");

Route::get("/nummers", "App\Http\Controllers\NummersController@index");

Route::get("/nummerToevoegen", "App\Http\Controllers\NummersController@show");
Route::post("/toevoegen", "App\Http\Controllers\NummersController@upload");


Route::get('/', function(){
    return view('layouts.app');
});
