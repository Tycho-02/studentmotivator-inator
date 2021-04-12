<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class AfspeellijstSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('afspeellijst')->insert([ 
            'userId' => '1',
            'afspeellijstId' => '1',
            'naam' => 'Tijd om te blokken lijst',
            'aantalNummers' => 1,
            'humeur' => "Blokken"
        ]);
        DB::table('afspeellijst')->insert([ 
            'userId' => '1',
            'afspeellijstId' => '2',
            'naam' => 'Anti-Stress lijst',
            'aantalNummers' => 0,
            'humeur' => "Stress"
        ]);
        DB::table('afspeellijst')->insert([ 
            'userId' => '1',
            'afspeellijstId' => '3',
            'naam' => 'Pauze lijst',
            'aantalNummers' => 0 ,
            'humeur' => "Pauze"
        ]);
    }
}
