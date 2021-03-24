<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nummer as Nummer;
use Storage;

class NummersController extends Controller
{
    public function index(){
        return view('components.nummers', [
            'nummers' => \App\Models\Nummer::all()
        ]);
    }

    public function show(){
        return view("components.upload");
    }

    public function upload(Request $request){  
        $posts_music = new Nummer;
        $posts_music->naam = $request->naam;
        $posts_music->genre = $request->genre;
        $posts_music->artiest = $request->artiest;
        $posts_music->bestandLocatie = $request->muziek;

        $music = $request->muziek;
        
        if (!is_array($music)) {
            print_r($music);
            Storage::disk('public')->put($music ,base64_decode($music));
            $posts_music->save(); 
        }

        return redirect('/nummers');
 

    
    }

}
