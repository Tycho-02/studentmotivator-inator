<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = "users";
    protected $fillable = ['user_id', 'humeur'];
    protected $primaryKey = 'userId';

    use HasFactory;

    function studiebuddy(){
        return $this->hasOne(Studiebuddy::class);
    }

    function gekochteuiterlijkjes(){
        return $this->hasMany(GekochtUiterlijkje::class, "userId", "userId");
    }

    function tijdInstellingen() {
        return $this->belongsTo(\App\Models\TijdInstellingen::class,"userId", "userId");
    }
    function mobiel() {
        return $this->belongsTo("\App\Models\Mobiel","userId", "userId");
    }

    function afspeellijst(){
        return $this->belongTo('\App\Models\Afspeellijst', 'userId', "userId");
    }
}
