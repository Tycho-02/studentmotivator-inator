<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Http\Requests\UpdateBuddyRequest;
use Illuminate\Support\Facades\Http;

class StudiebuddyController extends Controller
{
    public function index(){
        $user_id = 1;
        $studiebuddy = \App\Models\Studiebuddy::find($user_id);
        return view('studiebuddy.index', ['studiebuddy' => $studiebuddy]);
    }


    public function update(UpdateBuddyRequest $request){
        $studiebuddy = \App\Models\Studiebuddy::find(1);
        $studiebuddy->naam = $request->naam;
        $studiebuddy->skin = $request->skin;
        $studiebuddy->long = $request->long;
        $studiebuddy->lat = $request->lat;
        $studiebuddy->ideale_temp = $request->temp;
        $studiebuddy->ideale_luchtvochtigheid = $request->luchtvochtigheid;
        $studiebuddy->save();
        return redirect('/studiebuddy');
    }


   
}
