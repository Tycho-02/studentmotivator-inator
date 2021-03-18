<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = "users";

    use HasFactory;

    function tijdInstellingen() {
        return $this->belongsTo(\App\Models\TijdInstellingen::class,"userId", "userId");

    }
}