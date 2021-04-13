<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class GekochteUiterlijkjesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gekochte_uiterlijkjes')->insert([ 
            'userId' => '1',
            'skin' => 'Snorlax',
            ]);
    }
}
