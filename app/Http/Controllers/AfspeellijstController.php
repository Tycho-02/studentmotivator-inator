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
            'afspeellijst'=> Afspeellijst::find($afspeellijstId)->naam,
            'afspeellijstId' => $afspeellijstId
        ]);
    }

    public function getnummerInlijst($afspeellijstId , $afspeellijst){
        return view('afspeellijsten.afspeellijstNummers', [
            'afspeellijstnummers' => Afspeellijst::find($afspeellijstId)->nummers()->get(),
            'afspeellijst'=> Afspeellijst::find($afspeellijstId)->naam,
            'afspeellijstId' => $afspeellijstId,
        ]);
    }
}
