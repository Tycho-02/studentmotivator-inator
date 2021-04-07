<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
<<<<<<< HEAD
use DB; 
=======
use DB;
>>>>>>> 4565b5cf15e6096150312ebaf0c775226ec2faa3

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
<<<<<<< HEAD
    
=======
>>>>>>> 4565b5cf15e6096150312ebaf0c775226ec2faa3
}
