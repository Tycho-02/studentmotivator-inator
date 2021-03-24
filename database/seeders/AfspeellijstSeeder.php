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
            'naam' => 'Chill lijst',
            'aantalNummers' => '1',
            'humeur' => "Blij"
        ]);
    }
}
