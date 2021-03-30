<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nummer extends Model
{
    use HasFactory;

    protected $table = "nummer";
    protected $fillable = [
        //if id is not autoincrement then add 'id'
        'naam', 
        'artiest', 
        'genre', 
        'bestandLocatie',
        'afspeellijstId',
    ];
    public function afspeellijst() {
        return $this->belongsToMany('Model\Afspeellijst', 'afspeellijstId');
    }
}
