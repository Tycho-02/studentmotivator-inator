<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\TijdInstellingen;
use Illuminate\Support\Facades\Validator;

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

        //validatie request

        $validator = Validator::make($request->all(), [
            'tijdInBed' => 'required|min:4',
            'tijdUitBed' => 'required|min:4'
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', 'Tijd in en uit bed moet correct ingevuld zijn!');
        }
      /*  $request->validate([
            'tijdInBed' => 'required|min:4',
            'tijdUitBed' => 'required|min:4'
        ]);
        */
        $updaten = TijdInstellingen::find($request->id);
        $updaten->tijdInBed = $request->tijdInBed;
        $updaten->tijdUitBed = $request->tijdUitBed;
        $updaten->buzzer = $request->buzzer;
        $updaten->meldingen = $request->meldingen;
        $updaten->save();

        return redirect('/tijdinstellingen')->with('success', 'Succesvol gewijzigd!');
        
    }
        //wordt later gecodeerd met Auth::user 
    
    //
}



