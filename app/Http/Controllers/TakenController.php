<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Taak;
use Exception;

class TakenController extends Controller
{
    // Deze functie zorgt ervoor dat alle taken worden getoond
    public function index() {
        return view('taken.index', ['taken' => \App\Models\Taak::all()]);
    }

    // Deze functie zorgt ervoor dat de gebruiker naar de pagina gaat om taken te kunne toevoegen
    public function create() {
        return view('taken.create');
    }

    // Deze functie wordt gebruikt om taken mee op te slaan
    public function store() {
        $taak = new Taak();

        $taak->title = request('title');
        $taak->omschrijving = request('omschrijving');
        $taak->label = request('label');
        $taak->prioriteit = request('prioriteit', 0);
        $taak->deadline = request('deadline');
        $taak->uitvoerdatum = request('uitvoerdatum');

        try {
            // Hier word de taak opgeslagen
            $taak->save();
            // Er word terug genavigeerd naar het taken overzicht met een extra message dat het gelukt is.
            return redirect('/taken')->with('message', 'Taak is toegevoegd!');

        } catch (Exception $err) {
            // Als de taak niet kon worden toegevoegd word er terug genavigeerd naar de toevoegen pagina
            // en word er een message getoond dat het niet is gelukt
            return redirect('/taken/create')->with('message', 'Taak kon niet worden toegevoegd!');
        }
    }

    // Deze functie is om een taak te verwijderen aan de hand van zijn id
    public function destroy($taakId) {
        \App\Models\Taak::destroy($taakId);
        return redirect('/taken');
    }

    // Deze functie navigeerd naar de edit pagina van een taak
    public function edit($taakId) {
        $taak = \App\Models\Taak::find($taakId);
        return view('taken.edit', ['taak' => $taak]);
    }

    // Deze functie updated een bestaande taak
    public function update($taakId) {
        $taak = \App\Models\Taak::find($taakId);

        $taak->title = request('title');
        $taak->omschrijving = request('omschrijving');
        $taak->label = request('label');
        $taak->prioriteit = request('prioriteit', 0);
        $taak->deadline = request('deadline');
        $taak->uitvoerdatum = request('uitvoerdatum');

        try {
            // Hier word de taak opgeslagen
            $taak->save();
            // Er word terug genavigeerd naar het taken overzicht met een extra message dat het gelukt is.
            return redirect('/taken')->with('message', 'Taak is gewijzigd!');

        } catch (Exception $err) {
            // Als de taak niet kon worden toegevoegd word er terug genavigeerd naar de wijzigen pagina
            // en word er een message getoond dat het niet is gelukt
            return redirect("/taken/" . $taakId . "/edit")->with('message', 'Taak kon niet worden gewijzigd!');
        }
    }
}
