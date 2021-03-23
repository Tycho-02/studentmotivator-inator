<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobiel;

class MobielController extends Controller
{
    public function index(){
        // $userId = '1';
        // $mobiel = \App\Models\Mobiel::where('mobielId',$userId)->first();
        $mobiel = Mobiel::all()->first();

        if($mobiel->beschikbaar == 1){
            $mobiel->beschikbaar = 0;
        }else{
            $mobiel->beschikbaar = 1;
        }

        $mobiel->save();
        return view('mobiel.index', [
            'mobiel' => $mobiel
        ]);
    }
}
