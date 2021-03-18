<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TijdInstellingenController extends Controller
{
    public function index() {
        $tijdInTimestamp = now();
        $unix_tijdInUren = $tijdInTimestamp->format('H:m:s');
        return view('tijdinstellingen.index', [
            'tijd' => \App\Models\TijdInstellingen::all(),
            'timeStamp' => $unix_tijdInUren
        ]);
    }
        //wordt later gecodeerd met Auth::user 
    
    //
}



