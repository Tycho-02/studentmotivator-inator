<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nummer as Nummer;
use Storage;

class NummersController extends Controller
{
    public function index(){
        return view('nummers.nummers', [
            'nummers' => \App\Models\Nummer::all()
        ]);
    }

    public function show(){
        return view("nummers.upload");
    }

    public function upload(Request $request){  
        //checkt in de input field of er een file is
        
        $request->validate([
            'naam' => 'required',
            'artiest' => 'required',
            'genre' => 'required',
            
        ]);
        if($file = $request->file('muziek')) {
            //sla de naam van het originelebestand op
            $naam = $file->getClientOriginalName();
            
            //er word gekeken of het bestand de file muziek bevat en word het bestand in het mapje muziek gezet
            if($file->move('muziek', $naam)){
                $posts_music = new Nummer;
                $posts_music->naam = $request->naam;
                $posts_music->genre = $request->genre;
                $posts_music->artiest = $request->artiest;
                $posts_music->bestandLocatie = $request->artiest;
            };

            // Storage::disk('public')->put($music ,base64_decode($music));
            $posts_music->save();  
        }

        return redirect('/nummers');
 

    
    }

}