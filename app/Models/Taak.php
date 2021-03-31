<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taak extends Model
{
    protected $table = 'taken';
    public $timestamps = false; //Zonder dit verwacht de tabel 2 extra kolommen die niet nodig zijn
}
