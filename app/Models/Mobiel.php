<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobiel extends Model
{
    protected $table = 'mobiel';
    protected $primaryKey = 'mobielId';
    public $timestamps = false;

    public function alleInfo(){
        return $this->belongsTo('\App\Models\Users', 'userId', 'userId');
    }
}
