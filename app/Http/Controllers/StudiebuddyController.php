<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class StudiebuddyController extends Controller
{
    public function index(){
        
        
    }

    public function weerbericht(){
        $user_id = 1;
        $studiebuddy = \App\Models\Studiebuddy::find($user_id);
        $response = Http::get('https://api.openweathermap.org/data/2.5/onecall?lat=' . $studiebuddy->lat . '&lon=' . $studiebuddy->long . '&appid=7deb7ae20398f8a5f63fb56749812be9');
        return view('studiebuddy.index', ['weerbericht' => $response]);
    }
}
