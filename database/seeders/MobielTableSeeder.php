<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB; 

class MobielTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mobiel')->insert([
            'beschikbaar' => true,
            'berichtsturen' => false,
            'smiley' => false
        ]);
    }
    
}
