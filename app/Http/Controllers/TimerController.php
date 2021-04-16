<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Timer;
use Exception;

class TimerController extends Controller
{
    // het ophalen van de tijd uit de db
    public function index(){
        return view('timer.index', [
            'timer' => \App\Models\Timer::first()
        ]);
    }
     
    public function store(Request $request){
        $timer = \App\Models\Timer::first();
        // het ingevulde tijd word de nieuwe timer tijd
        $timer->tijd = $request->input('tijd');        

        // elke button heeft een vaste waarden.
        if($request->input('30')){
            $timer->tijd = "00:30";
        }
        if($request->input('45')){
            $timer->tijd = "00:45";
        }
        if($request->input('60')){
            $timer->tijd = "01:00";
        }
        if($request->input('75')){
            $timer->tijd = "01:15";
        }
        try {
            // als de invoer goed is dan word deze opgeslagen en komt er een succes message tevoorschijn.
            $timer->save();
            return redirect('/timer')->with('success', 'Timer is succesvol aangepast.');

        } catch (Exception $err) {
            // de gebruiker heeft iets niet goed gedaan en krijgt dit te zien door een error message
            return redirect('/timer')->with('message', 'Vul een tijd in!');
        }
        
    }
}
