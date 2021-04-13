<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GekochtUiterlijkjeController extends Controller
{
    public function shop(){
        $user_id = 1;
        $user = \App\Models\Users::find($user_id);
        return view('studiebuddy.components.iconshop', ['user' => $user]);
    }
    
}
