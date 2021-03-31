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

Route::get('/taken', [\App\Http\Controllers\TakenController::class, 'index']); // Het taken overzicht
Route::get('/taken/create', [\App\Http\Controllers\TakenController::class, 'create']); // Een taak toevoegen
Route::post('/taken', [\App\Http\Controllers\TakenController::class, 'store']); // Een taak opslaan in de DB
Route::get('/taken/{id}/destroy', [\App\Http\Controllers\TakenController::class, 'destroy']); // Een taak verwijderen
Route::get('/taken/{id}/edit', [\App\Http\Controllers\TakenController::class, 'edit']); // update pagina
Route::put('/taken/{id}', [\App\Http\Controllers\TakenController::class, 'update']); // Een taak updaten

Route::get("/afspeellijst", "App\Http\Controllers\AfspeellijstController@index");
Route::get("/afspeellijst/{afspeellijstId}", "App\Http\Controllers\AfspeellijstController@nummersInlijst");
Route::get("/afspeellijst/{afspeellijstId}/{nummer}", [
    'uses' => "App\Http\Controllers\AfspeellijstController@getnummerInlijst",
    'as' => 'afspeellijstNummer'
]);


Route::get("/nummers", "App\Http\Controllers\NummersController@index");
Route::get("/nummers/{bestandLocatie}", [
    'uses' => 'App\Http\Controllers\NummersController@getNummer',
    'as' => 'krijg-nummer',
]);

Route::get("/nummerToevoegen", "App\Http\Controllers\NummersController@show");
Route::post("/toevoegen", "App\Http\Controllers\NummersController@upload");

// Route::get('/mobiel', [\App\Http\Controllers\MobielController::class, 'index']);
Route::get('/timer', [\App\Http\Controllers\TimerController::class, 'index']);
Route::post('/timer', [\App\Http\Controllers\TimerController::class, 'toevoegenTijd']);

Route::get('/', function(){
    $agent = new \Jenssegers\Agent\Agent;
    $result = $agent->isMobile();
    if($result == true){
        return view('layouts.mobiel');
    }else{
        return view('layouts.app');
    }
});