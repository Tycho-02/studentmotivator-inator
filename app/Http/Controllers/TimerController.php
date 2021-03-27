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

    public function toevoegenTijd(Request $request){
        $timer = \App\Models\Timer::first();
        $timer->tijd = $request->input('tijd');
        $timer->save();
        return redirect('/timer');
    }
}
