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
        $url = 'https://api.openweathermap.org/data/2.5/onecall?lat=' . $studiebuddy->lat . '&lon=' . $studiebuddy->long . '&units=metric&exclude=current,minutely&appid=7deb7ae20398f8a5f63fb56749812be9';
        $response = Http::get($url);
        $weather;
        $temperatures = [];
        $nietnaarbuiten = ["Thunderstorm", "Drizzle", "Rain"];
        $hours = [];
        $planning = [];
        for($i=1; $i<count($response["hourly"]); $i++){
            if(date('Y-m-d') == date('Y-m-d', $response["hourly"][$i]["dt"])  && date("H", $response["hourly"][$i]["dt"]) > date("H") && date("H", $response["hourly"][$i]["dt"]) <= 22){
                $weather[$i] = $response["hourly"][$i]["weather"][0]["main"];
                $temperatures[$i] = $response["hourly"][$i]["temp"];
                $hours[$i] = date("H:i", $response["hourly"][$i]["dt"]);
            }
        }
        
        
        

        $aantalpauzes = floor(count($hours) / 3);

        for($i=1; $i<=count($hours); $i++){
            if(count($hours) <= 3){
                $planning[$i] = $hours[$i] . " - " . "Studeren";
            }
            else{
                
            }
        }
        

        
        return view('studiebuddy.index')->with(['temps' => $temperatures, 'weerbericht' => $weather, 'hours' => $hours, 'planning' => $planning]);
    }
}
