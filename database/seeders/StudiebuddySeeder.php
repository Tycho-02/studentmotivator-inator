<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class StudiebuddySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('studiebuddy')->insert([ 
            'userId' => '1',
            'long' => '4.658150',
            'lat' => '52.485771',
            'naam' => 'Piet',
            'skin' => 'Lion',
            'ideale_temp' => '23',
            'ideale_luchtvochtigheid' => '50',
            'ideale_licht' => '69'        
            ]);
        //
    }
}
