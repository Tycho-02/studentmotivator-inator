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
        $weather = ["Clouds", "Clouds", "Clouds", "Clouds"];
        $temperatures = [];
        $nietnaarbuiten = ["Thunderstorm", "Drizzle", "Rain"];
        $hours = [];
        $planning;
        for($i=0; $i<count($response["hourly"]); $i++){
            if(date('Y-m-d') == date('Y-m-d', $response["hourly"][$i]["dt"])  && date("H", $response["hourly"][$i]["dt"]) >= 8 && date("H", $response["hourly"][$i]["dt"]) <= 23){
                // $weather[$i] = $response["hourly"][$i]["weather"][0]["main"];
                $temperatures[$i] = $response["hourly"][$i]["temp"];
                $hours[$i] = date("H:i", $response["hourly"][$i]["dt"]);
            }
        }
        
        
        
        $highestTemp = 0;
        $highestTempIndex = 0;

        

        for($i=0; $i<count($hours); $i++){
            $planning[$i] = $hours[$i] . " - " . "Studeren";
            if(count($hours) <= 3){
                $planning[$i] = $hours[$i] . " - " . "Studeren";
            }
            else if(count($hours)>3 && count($hours)<=6){
                if($temperatures[$i] > $highestTemp){
                    $highestTemp = $temperatures[$i];
                    $highestTempIndex = $i;
                }

                for($y=0; $y<count($hours); $y++){
                    
                    if($y == $highestTempIndex && !in_array($weather[$y], $nietnaarbuiten)){
                        $planning[$y] = $hours[$y] . " - " . "Pauze, het is nu het warmst buiten!";
                    }
                    else if($y == $highestTempIndex && in_array($weather[$y], $nietnaarbuiten)){
                        $droogcounter = 0;
                        $droogIndex;
                        for($x=0; $x<count($hours); $x++){
                            if(!in_array($weather[$x], $nietnaarbuiten)){
                                $droogcounter++;
                                $droogIndex = $x;
                            }
                        }
                        if($droogcounter == 0){
                            $planning[$highestTempIndex] = $hours[$highestTempIndex] . " - " . "Studeren";
                            $pauzeIndex = floor(count($hours) / 2);
                            $planning[$pauzeIndex] = $hours[$pauzeIndex] . " - " . "Pauze, het regent buiten.";
                        }
                        else{
                            $pauzeIndex = $droogIndex;
                            $planning[$pauzeIndex] = $hours[$pauzeIndex] . " - " . "Pauze, het is nu droog.";
                        }
                    }
                    
                }
            }

            
        }
        $sortplanning = sort($planning);

        
        return view('studiebuddy.index')->with(['temps' => $temperatures, 'weerbericht' => $weather, 'hours' => $hours, 'planning' => $planning]);
    }
}
