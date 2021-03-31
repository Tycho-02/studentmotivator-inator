<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
<<<<<<< HEAD
use DB; 
=======
use DB;
>>>>>>> 49e41e4dcc9c4672238e0a7eede284352a221a30

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
            'beschikbaar' => true,
            'berichtsturen' => false,
            'smiley' => false
        ]);
    }
    
}
