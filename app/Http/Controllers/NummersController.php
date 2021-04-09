<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nummer as Nummer;
use App\Models\Afspeellijst as Afspeellijst;
use App\Models\Users as User;
use Illuminate\Support\Facades\Validator;
use Storage;
use DB;

class NummersController extends Controller
{
    public function index(){
        //get alle nummers op volgorde van wanneer ze gemaakt zijn
        $nummers = Nummer::orderBy('created_at','asc')->get();
        //checkt de humeur van de gebruiker
        $userHumeur = User::first()->pluck('humeur')->first();
        //zoekt de afspeellijst met de nummers die overeenkomt met de humeur van de gebruiker
        $afspeellijst = Afspeellijst::where('humeur', $userHumeur)->first()->nummers;
        //shuffle de lijst met nummers
        $afspeellijstShuffle = $afspeellijst->shuffle();
        //pakt het eerste nummer van de lijst
        $afspeellijstEersteNummer = $afspeellijst->first();
        return view('nummers.nummers', compact("nummers","userHumeur", "afspeellijst","afspeellijstShuffle","afspeellijstEersteNummer"));
    }

    public function show(){
        return view("nummers.upload");
    }

    public function upload(Request $request){  
        //checkt in de input field of er een file is
        
        $validator = Validator::make($request->all(), [
            'muziek' => 'required',
            'naam' => 'required',
            'artiest' => 'required',
            'genre' => 'required',
            'mood' => 'required'
        ]);
        if ($validator->fails()) {
            return back()->with('toast_error', 'Upload nummer is niet goed ingevuld.'
        );
        }else{

            if($file = $request->file('muziek')) {
                //sla de naam van het originelebestand op
                $naam = $file->getClientOriginalName();
                
                // er word gekeken of het bestand de file muziek bevat en word het bestand in het mapje muziek gezet
                if($file->move('muziek', $naam)){
                    $posts_music = new Nummer;
                    $posts_music->naam = $request->naam;
                    $posts_music->genre = $request->genre;
                    $posts_music->artiest = $request->artiest;
                    $posts_music->bestandLocatie = $naam;
                    $posts_music->afspeellijstId = $request->mood;
                    
                    // na het toevoegen van een nummer word het aantalnummer opgehoogt met 1 bij de afspeellijst met dezelfde mood
                    Afspeellijst::where('afspeellijstId', $posts_music->afspeellijstId)->update([
                        'aantalNummers' => DB::raw('aantalNummers+1')
                        ]);
                        
                    };
                    $posts_music->save();  
                    }
                }
                
                return redirect('/nummers')->with('success', 'Nummer is succesvol geupload!');;
            }
            
            public function getNummer($bestandLocatie){
                return view('nummers.nummers', [
                    'nummers' => Nummer::all(),
                    'bestandLocatie' => $bestandLocatie,
                    'nummer' => Nummer::where('bestandLocatie', $bestandLocatie)->get()->first()
                    
                    ]);
                }
                
}
