<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Puntentelling extends Model
{
    protected $table = 'puntentelling';
    protected $primaryKey = 'userId';

    public function puntentelling(){
        return $this->belongsTo("\App\Models\Users","userId", "userId");
    }

    public function aftrek($userId, $amount){
        $puntentelling = Puntentelling::find($userId);
        $puntentelling->punten = $puntentelling->punten - $amount;
        $puntentelling->save();
    }

    public function optellen($userId, $amount){
        $puntentelling->punten = $puntentelling->punten + $amount;
        $puntentelling->save();
    }
}
