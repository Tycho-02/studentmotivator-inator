<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class NummerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nummer')->insert([ 
                'afspeellijstId' => '1',
                'naam' => 'Happy',
                'artiest' => 'Pharrel Williams',
                'genre' => 'pop',
                'bestandLocatie' => 'Pharrell-Williams-Happy.mp3'
        ]);
    }
}
