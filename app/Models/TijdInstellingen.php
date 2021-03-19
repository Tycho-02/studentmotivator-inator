<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TijdInstellingen extends Model
{

    use HasFactory;
    protected $table = 'tijd_instellingen';
    
    public function idUser() {
        return $this->belongsTo(\App\Models\Users::class, "userId", "userId");
    }

}
