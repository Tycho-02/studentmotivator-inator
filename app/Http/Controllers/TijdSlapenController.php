<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TijdSlapen;
use Redirect,Response;
Use DB;
use Carbon\Carbon;


class TijdSlapenController extends Controller
{

    public function index() {
        $record = TijdSlapen::select(\DB::raw("TIMESTAMPDIFF(MINUTE, tijdInBedGegaan, tijdUitBedGegaan) as urengeslapen"), \DB::raw("DATE(tijdInBedGegaan) as day_name"))
        ->get();
      
         $data = [];
        
         foreach($record as $row) {
            $data['label'][] = $row->day_name;
            $data['data'][] = (float)$row->urengeslapen / 60; //totaal uren geslapen
          
          }
     
        $data['chart_data'] = json_encode($data);
        return view('tijdslapen.index', $data);
    }
    //
}
