<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Taak;

class TakenController extends Controller
{
    public function index() {
        return view('taken.index', ['taken' => \App\Models\Taak::all()]);
    }

    public function add() {
        return view('taken.add');
    }

    public function addTaak() {
        $taak = new Taak();

        $taak->title = request('title');
        $taak->omschrijving = request('omschrijving');
        $taak->label = request('label');
        $taak->deadline = request('deadline');
        $taak->uitvoerdatum = request('uitvoerdatum');

        $taak->save();

        return redirect('/taken');
    }

    public function deleteTaak($taakId) {
        \App\Models\Taak::destroy($taakId);
        // $taak->delete();
        return redirect('/taken');
        // return $taak;
    }
}
