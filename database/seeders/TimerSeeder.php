<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB; 
<<<<<<< HEAD
=======

>>>>>>> 49e41e4dcc9c4672238e0a7eede284352a221a30
class TimerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('timer')->insert([
            'mobielId' => '1',
            'buzzer' => 0,
            'tijd' => '00:30',
        ]);
    }
}
