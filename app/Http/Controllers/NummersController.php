<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NummersController extends Controller
{
    public function index(){
        return view('app', [
            'nummers' => \App\Models\Nummer::all()
        ]);
    }
}
