<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon as Carbon;
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
                'bestandLocatie' => 'Pharrell-Williams-Happy.mp3',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
