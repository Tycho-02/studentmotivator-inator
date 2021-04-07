<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Timer;

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
        $timer->save();

        // if($request->submit == "30"){
        //     $timer->tijd = "00:30";
        //     $timer->save();
        // }
        return redirect('/timer');
    }
}
