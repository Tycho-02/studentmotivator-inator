<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timer extends Model
{
    protected $table = 'timer';
    public $timestamps = false;
    protected $primaryKey = 'mobielId'; //anders weet het niet welke kolom de primarykey is

    public function timer(){
        return $this->belongsTo("\App\Models\Mobiel","mobielId", "mobielId");
    }
}
