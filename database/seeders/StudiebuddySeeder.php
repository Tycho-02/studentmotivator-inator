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
            'long' => '4.49',
            'lat' => '52.16',
            'naam' => 'Buddy',
            'skin' => 'Ladybug',
            'ideale_temp' => '23',
            'ideale_luchtvochtigheid' => '50'    
            ]);
        //
    }
}
