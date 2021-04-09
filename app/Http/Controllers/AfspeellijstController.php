<?php

namespace App\Http\Controllers;
use App\Models\Afspeellijst as Afspeellijst;

use Illuminate\Http\Request;

class AfspeellijstController extends Controller
{
    public function index(){
        return view('afspeellijsten.afspeellijsten',[
            'afspeellijsten' => Afspeellijst::all(),
        ]);
    }

    public function nummersInlijst($afspeellijstId){
        $nummers = Afspeellijst::find($afspeellijstId)->nummers()->get();
        return view('afspeellijsten.afspeellijstNummers')->with([
            'afspeellijstnummers'=> $nummers, 
            'afspeellijstId' => $afspeellijstId,
            'afspeellijst'=> Afspeellijst::find($afspeellijstId)->naam
        ]);
    }

    public function getnummerInlijst($afspeellijstId , $nummer){
        $nummers = Afspeellijst::find($afspeellijstId)->nummers()->get();
        $nummer = Afspeellijst::find($afspeellijstId)->nummers()->where('bestandLocatie',$nummer)->get()->first();
        return view('afspeellijsten.afspeellijstNummers', [
            'afspeellijstnummers' => $nummers,
            'afspeellijstId' => $afspeellijstId,
            'afspeellijst'=> Afspeellijst::find($afspeellijstId)->naam,
            'nummer' => $nummer,

        ]);
    }

  
}
