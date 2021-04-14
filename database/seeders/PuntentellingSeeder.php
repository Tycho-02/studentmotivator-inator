<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class PuntentellingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('puntentelling')->insert([ 
            'userId' => '1',
            'punten' => '500',
        ]);
    }
}
