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
            'userId' => '1',
            'mobielId' => '1',
            // 'beschikbaar' => true,
            // 'berichtsturen' => false,
            // 'smiley' => false
        ]);
    }
    
}
