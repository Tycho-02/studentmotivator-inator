<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Humeur extends Model
{
    use HasFactory;

    protected $table = 'humeur';
    protected $fillable = ["humeur"];
    public $timestamps = false;

    public function userHumeur(){
        return $this->belongsTo('\App\Models\Users', 'userId', 'userId');
    }
}
