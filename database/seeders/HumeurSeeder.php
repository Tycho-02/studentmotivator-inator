<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
    }
}
