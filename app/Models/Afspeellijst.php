<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Afspeellijst extends Model
{
    use HasFactory;

    protected $table = "afspeellijst";
    protected $fillable = [
        //if id is not autoincrement then add 'id'
        'naam', 
        'aantalNummers', 
        'humeur', 
    ];
    public function nummers() {
        return $this->belongsToMany('Model\Nummer', 'afspeellijstId');
    }
}
