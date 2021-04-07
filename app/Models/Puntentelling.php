<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Puntentelling extends Model
{
    protected $table = 'puntentelling';

    public function puntentelling(){
        return $this->belongsTo("\App\Models\Users","userId", "userId");
    }
}
