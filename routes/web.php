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

Route::get("/afspeellijst", "App\Http\Controllers\AfspeellijstController@index");
Route::get("/nummers", "App\Http\Controllers\NummersController@index");

Route::get("/nummers/create", [
    'uses' => 'App\Http\Controllers\NummersController@create'
]);
Route::post("/nummers", [
    'uses' => 'App\Http\Controllers\NummersController@store'
]);



Route::get('/', function () {
    return view('default');
});



