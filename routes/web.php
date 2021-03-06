<?php

use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;

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
Route::get("/tijdinstellingen", "App\Http\Controllers\TijdInstellingenController@index"); //bedtijd pagina
Route::get("/tijdinstellingen/edit/{id}", "App\Http\Controllers\TijdInstellingenController@edit"); //wijzigen bedtijd
Route::put('/tijdinstellingen/{id}', 'App\Http\Controllers\TijdInstellingenController@update'); //updaten bedtijd / buzzer instellingen / meldingen aan/uit
Route::get('/slapen/grafiek', [\App\Http\Controllers\TijdSlapenController::class, 'index']); //grafiek van de slaaptijd als overzicht


Route::get('/taken', [\App\Http\Controllers\TakenController::class, 'index']); // Het taken overzicht
Route::get('/taken/create', [\App\Http\Controllers\TakenController::class, 'create']); // Een taak toevoegen
Route::post('/taken', [\App\Http\Controllers\TakenController::class, 'store']); // Een taak opslaan in de DB
Route::get('/taken/{id}/voltooi', [\App\Http\Controllers\TakenController::class, 'voltooi']); // Een taak verwijderen
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
Route::post('/timer', [\App\Http\Controllers\TimerController::class, 'store']);
Route::get('/studiebuddy', [App\Http\Controllers\StudiebuddyController::class, 'index']);
Route::post('/updatestudiebuddy', [App\Http\Controllers\StudiebuddyController::class, 'update']);
Route::post('/gekochteuiterlijkjes/koop', [App\Http\Controllers\GekochtUiterlijkjeController::class, 'koop']);

Route::get('/', function(){
        return view('layouts.mobiel');
});
