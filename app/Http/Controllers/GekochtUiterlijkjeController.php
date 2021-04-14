<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GekochtUiterlijkjeController extends Controller
{
    
    
    public function koop(Request $request){
        $aankoop = new \App\Models\GekochtUiterlijkje;
        $aankoop->userId = $request->userId;
        $user = \App\Models\Users::find($request->userId);
        if($request->skin == "Snorlax"){
            $user->myPuntentelling->punten = $user->myPuntentelling->punten - 350;
            $user->save();
        }
        else{
            $user->myPuntentelling->punten = $user->myPuntentelling->punten - 500;
            $user->save();
        }
        $aankoop->skin = $request->skin;
        $aankoop->save();
        return redirect('/studiebuddy');
    }
}
