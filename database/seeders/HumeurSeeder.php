<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class HumeurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('humeur')->insert([ 
            'humeur' => 'blij'       
        ]);
        DB::table('humeur')->insert([ 
            'humeur' => 'meh'       
        ]);
        DB::table('humeur')->insert([ 
            'humeur' => 'verdrietig'       
        ]);
}
}
