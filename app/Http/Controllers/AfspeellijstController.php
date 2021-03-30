<?php

namespace App\Http\Controllers;
use App\Models\Afspeellijst as Afspeellijst;
use Illuminate\Http\Request;

class AfspeellijstController extends Controller
{
    public function index(){
        return view('afspeellijsten.afspeellijsten',[
            'Afspeellijsten' => Afspeellijst::all(),
        ]);
    }
}
