<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Taak;
use Exception;

class TakenController extends Controller
{
    public function index() {
        return view('taken.index', ['taken' => \App\Models\Taak::all()]);
    }

    public function create() {
        return view('taken.create');
    }

    public function store() {
        $taak = new Taak();

        $taak->title = request('title');
        $taak->omschrijving = request('omschrijving');
        $taak->label = request('label');
        $taak->deadline = request('deadline');
        $taak->uitvoerdatum = request('uitvoerdatum');

        try {

            $taak->save();
            return redirect('/taken')->with('message', 'Taak is toegevoegd!');

        } catch (Exception $err) {
            return redirect('/taken/create')->with('message', 'Taak kon niet worden toegevoegd!');
        }
    }

    public function destroy($taakId) {
        \App\Models\Taak::destroy($taakId);
        return redirect('/taken');
    }
}
