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
            'humeur' => 'Blokken'       
        ]);
        DB::table('humeur')->insert([ 
            'humeur' => 'Stress'       
        ]);
        DB::table('humeur')->insert([ 
            'humeur' => 'Pauze'       
        ]);
}
}
