<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Timer;
use Exception;

class TimerController extends Controller
{
    public function index(){
        return view('timer.index', [
            'timer' => \App\Models\Timer::first()
        ]);
    }

    public function store(Request $request){
        $timer = \App\Models\Timer::first();
        $timer->tijd = $request->input('tijd');

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
            $timer->save();
            return redirect('/timer');

        } catch (Exception $err) {

            return redirect('/timer')->with('message', 'Vul een tijd in!');
        }
        
    }
}
