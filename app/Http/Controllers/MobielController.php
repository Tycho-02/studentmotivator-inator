<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MobielController extends Controller
{
    public function index(){
        return view('mobiel.index', [
            'mobiel' => \App\Models\Mobiel::all()
        ]);
    }
}
