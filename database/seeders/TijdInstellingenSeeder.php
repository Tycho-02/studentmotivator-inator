<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class TijdInstellingenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tijd_instellingen')->insert([ 
            'userId' => '1',
            'tijdInBed' => '22:00',
            'tijdUitBed' => '05:30',
            'buzzer' => 'aan',
            'meldingen' => 'aan'
            ]);
        //
    }
}
