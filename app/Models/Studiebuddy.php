<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studiebuddy extends Model
{
    use HasFactory;
    protected $table = "studiebuddy";
    protected $primaryKey = 'userId';

    public function myUser(){
        return $this->belongsTo(\App\Models\Users::class, "userId", "userId");
    }
}
