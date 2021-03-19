<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobiel extends Model
{
    protected $table = 'mobiel';

    public function alleInfo(){
        return $this->belongsTo('\App\Models\Users', 'userId', 'userId');
    }
}
