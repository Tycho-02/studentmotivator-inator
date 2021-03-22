<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\TijdInstellingen;

class TijdInstellingenController extends Controller
{
    public function index() {
        $userId = 1;
        $tijdInTimestamp = now();
        $unix_tijdInUren = $tijdInTimestamp->format('H:m:s');
        return view('tijdinstellingen.index', [
            'tijd' => TijdInstellingen::where('userId',$userId)->first(),
            'timeStamp' => $unix_tijdInUren
        ]);
    }

    public function show($id) {

    }

    public function edit() {
        $userId = 1;
        $data = TijdInstellingen::where('userId',$userId)->first();
        return view('tijdinstellingen.edit', ['data'=>$data]);
    }

    public function update(Request $request) {
        /*$request->validate([
            'tijdInBed' => 'required',
            'tijdUitBed' => 'required'
        ]);*/
        $updaten = TijdInstellingen::find($request->id);
        $updaten->tijdInBed = $request->tijdInBed;
        $updaten->tijdUitBed = $request->tijdUitBed;
        $updaten->save();

        return redirect('/tijdinstellingen');
        
    }
        //wordt later gecodeerd met Auth::user 
    
    //
}



