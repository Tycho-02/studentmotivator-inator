<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timer extends Model
{
    protected $table = 'timer';

    public function timer(){
        return $this->belongsTo("\App\Models\Mobiel","userId", "userId");
    }
}
